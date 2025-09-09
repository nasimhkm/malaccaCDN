document.addEventListener("DOMContentLoaded", function () {
    // --- Drawer and Logo Visibility Logic ---
    const logoDrawerButton = document.getElementById("show-drawer-btn");
    const drawer = document.getElementById("drawer-navigation");

    // Check if the elements exist before adding listeners
    if (logoDrawerButton && drawer) {
        logoDrawerButton.addEventListener("click", function () {
            this.style.visibility = "hidden";
        });

        const drawerObserver = new MutationObserver(function (mutations) {
            mutations.forEach(function (mutation) {
                if (mutation.attributeName === "class") {
                    const isDrawerHidden =
                        drawer.classList.contains("-translate-x-full");
                    if (isDrawerHidden) {
                        logoDrawerButton.style.visibility = "visible";
                    }
                }
            });
        });

        drawerObserver.observe(drawer, {
            attributes: true,
        });
    }

    // --- Content Section Switching Logic ---
    const links = document.querySelectorAll(".sidebar-link");
    const sections = document.querySelectorAll(".content-section");

    // Check if the elements exist before proceeding
    if (links.length > 0 && sections.length > 0) {
        function showSection(hash) {
            const targetId = hash ? hash.substring(1) : "dashboard";
            let sectionToShow = document.getElementById(targetId);

            sections.forEach((section) => {
                section.style.display = "none";
            });

            if (sectionToShow) {
                sectionToShow.style.display = "block";
            } else {
                // Fallback to dashboard if the target doesn't exist
                document.getElementById("dashboard").style.display = "block";
            }
        }

        links.forEach((link) => {
            link.addEventListener("click", function (e) {
                e.preventDefault();
                const hash = this.getAttribute("href");
                history.pushState(null, null, hash);
                showSection(hash);
            });
        });

        // Show the correct section on initial page load
        showSection(window.location.hash);
    }
});

// --- PENAMBAHAN: Script untuk mengirim status ke modal ---
document.addEventListener("DOMContentLoaded", function () {
    const addTaskButtons = document.querySelectorAll(".add-task-btn");
    const taskStatusInput = document.getElementById("task-status-input");

    addTaskButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const status = this.getAttribute("data-status");
            if (taskStatusInput) {
                taskStatusInput.value = status;
            }
        });
    });
});

// --- Tambahkan script untuk create dan edit modal ---

document.addEventListener("DOMContentLoaded", function () {
    // --- Script untuk Create Modal ---
    const addTaskButtons = document.querySelectorAll(".add-task-btn");
    const taskStatusInput = document.getElementById("task-status-input");

    addTaskButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const status = this.getAttribute("data-status");
            if (taskStatusInput) {
                taskStatusInput.value = status;
            }
        });
    });

    // --- Script untuk Edit Modal ---
    const editTaskButtons = document.querySelectorAll(".edit-task-btn");
    const editTaskForm = document.getElementById("edit-task-form");
    const editTaskTitle = document.getElementById("edit-task-title");
    const editTaskDescription = document.getElementById(
        "edit-task-description",
    );
    const editTaskStatus = document.getElementById("edit-task-status");

    editTaskButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const taskUrl = this.getAttribute("data-task-url");
            const taskId = this.getAttribute("data-task-id");

            // Fetch data task dari server
            fetch(taskUrl)
                .then((response) => response.json())
                .then((data) => {
                    // Isi form dengan data yang didapat
                    if (editTaskForm) {
                        editTaskForm.action = `/admin/tasks/${taskId}`;
                    }
                    if (editTaskTitle) {
                        editTaskTitle.value = data.title;
                    }
                    if (editTaskDescription) {
                        editTaskDescription.value = data.description;
                    }
                    if (editTaskStatus) {
                        editTaskStatus.value = data.status;
                    }
                });
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Cek jika kita berada di section dashboard saat pertama kali load
    if (window.location.hash === "#dashboard" || window.location.hash === "") {
        fetchAnalyticsData();
    }

    // Tambahkan listener untuk link sidebar agar data dimuat saat section diubah
    document.querySelectorAll(".sidebar-link").forEach((link) => {
        link.addEventListener("click", function (e) {
            const targetId = this.getAttribute("href");
            if (targetId === "#dashboard") {
                // Cek agar tidak fetch berulang kali jika data sudah ada
                if (
                    document.getElementById("total-users").innerText ===
                    "Loading..."
                ) {
                    fetchAnalyticsData();
                }
            }
        });
    });
});

// Buat variabel global untuk chart agar bisa di-destroy sebelum render ulang
let visitorsChartInstance = null;

function fetchAnalyticsData() {
    // Tampilkan loading state sebelum fetch
    document.getElementById("total-users").innerText = "...";
    document.getElementById("total-sessions").innerText = "...";
    document.querySelector("#popular-pages-tbody").innerHTML =
        `<tr><td colspan="2" class="py-4 text-center">Loading...</td></tr>`;

    fetch("/api/analytics-dashboard")
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then((result) => {
            if (result.success) {
                const data = result.data;

                // 1. Isi data ringkasan
                document.getElementById("total-users").innerText =
                    data.summary[0]?.totalUsers || "0";
                document.getElementById("total-sessions").innerText =
                    data.summary[0]?.sessions || "0";

                // 2. Isi tabel halaman terpopuler
                const pagesTableBody = document.querySelector(
                    "#popular-pages-tbody",
                );
                pagesTableBody.innerHTML = ""; // Kosongkan loading
                if (
                    data.most_visited_pages &&
                    data.most_visited_pages.length > 0
                ) {
                    data.most_visited_pages.forEach((page) => {
                        const row = `
                                        <tr class="border-b border-gray-700/50">
                                            <td class="py-2 pr-2 truncate" title="${page.url}">${page.url}</td>
                                            <td class="py-2 text-right font-medium">${page.pageViews}</td>
                                        </tr>
                                    `;
                        pagesTableBody.innerHTML += row;
                    });
                } else {
                    pagesTableBody.innerHTML = `<tr><td colspan="2" class="py-4 text-center">No data available.</td></tr>`;
                }

                // 3. Render Grafik
                renderVisitorsChart(data.daily_stats);
            } else {
                console.error("API Error:", result.message);
                displayErrorOnUI("Failed to load data from API.");
            }
        })
        .catch((error) => {
            console.error("Fetch Error:", error);
            displayErrorOnUI("Failed to connect to the server.");
        });
}

function renderVisitorsChart(dailyData) {
    const ctx = document.getElementById("visitors-chart").getContext("2d");

    // Hancurkan instance chart yang lama jika ada
    if (visitorsChartInstance) {
        visitorsChartInstance.destroy();
    }

    // Format data untuk Chart.js
    const labels = dailyData.map((item) =>
        new Date(item.date).toLocaleDateString("id-ID", {
            day: "numeric",
            month: "short",
        }),
    );
    const visitors = dailyData.map((item) => item.visitors);

    visitorsChartInstance = new Chart(ctx, {
        type: "line",
        data: {
            labels: labels,
            datasets: [
                {
                    label: "Pengunjung",
                    data: visitors,
                    borderColor: "rgba(108, 12, 13, 1)", // Warna #6c0c0d
                    backgroundColor: "rgba(108, 12, 13, 0.2)",
                    tension: 0.2,
                    fill: true,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { color: "rgba(255, 255, 255, 0.7)" },
                    grid: { color: "rgba(255, 255, 255, 0.1)" },
                },
                x: {
                    ticks: { color: "rgba(255, 255, 255, 0.7)" },
                    grid: { color: "rgba(255, 255, 255, 0.1)" },
                },
            },
            plugins: {
                legend: {
                    labels: {
                        color: "rgba(255, 255, 255, 0.9)",
                    },
                },
            },
        },
    });
}

function displayErrorOnUI(message) {
    document.getElementById("total-users").innerText = "Error";
    document.getElementById("total-sessions").innerText = "Error";
    document.querySelector("#popular-pages-tbody").innerHTML =
        `<tr><td colspan="2" class="py-4 text-center text-red-500">${message}</td></tr>`;
}
