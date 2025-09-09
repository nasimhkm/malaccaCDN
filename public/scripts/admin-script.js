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

// Variabel global untuk menyimpan instance chart
let chartInstances = {};

document.addEventListener("DOMContentLoaded", function () {
    // Cek jika kita berada di section dashboard saat pertama kali load
    if (window.location.hash === "#dashboard" || window.location.hash === "") {
        fetchAnalyticsData();
    }

    // Listener untuk link sidebar
    document.querySelectorAll(".sidebar-link").forEach((link) => {
        link.addEventListener("click", function (e) {
            if (this.getAttribute("href") === "#dashboard") {
                // Hanya fetch jika chart belum ter-render
                if (!chartInstances['sessions-chart']) {
                    fetchAnalyticsData();
                }
            }
        });
    });
});

function fetchAnalyticsData() {
    console.log("Fetching Google Analytics data...");
    
    fetch("/api/analytics-dashboard")
        .then(response => {
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
            return response.json();
        })
        .then(result => {
            if (result.success) {
                const data = result.data;
                updateUI(data);
            } else {
                console.error("API Error:", result.message);
                displayErrorOnUI(result.message);
            }
        })
        .catch(error => {
            console.error("Fetch Error:", error);
            displayErrorOnUI("Failed to connect to the server.");
        });
}

function updateUI(data) {
    // 1. Update KPI Cards
    document.getElementById('kpi-sessions').innerText = data.summary.sessions.toLocaleString('id-ID');
    document.getElementById('kpi-bounce-rate').innerText = `${data.summary.bounceRate}%`;
    document.getElementById('kpi-page-views').innerText = data.summary.pageViews.toLocaleString('id-ID');
    document.getElementById('kpi-avg-duration').innerText = data.summary.averageSessionDuration;

    // 2. Update Tabel Halaman Terpopuler
    const pagesTableBody = document.querySelector("#popular-pages-tbody");
    pagesTableBody.innerHTML = ""; // Kosongkan
    if (data.most_visited_pages && data.most_visited_pages.length > 0) {
        data.most_visited_pages.forEach(page => {
            const row = `
                <tr class="border-b border-gray-700/50">
                    <td class="py-2 pr-2 truncate" title="${page.path}">${page.path}</td>
                    <td class="py-2 text-right font-medium">${page.pageViews.toLocaleString('id-ID')}</td>
                </tr>
            `;
            pagesTableBody.innerHTML += row;
        });
    } else {
        pagesTableBody.innerHTML = `<tr><td colspan="2" class="py-4 text-center">No data available.</td></tr>`;
    }

    // 3. Render semua grafik
    const dailyLabels = data.daily_stats.map(item => new Date(item.date).toLocaleDateString("id-ID", { day: "numeric", month: "short" }));
    
    renderLineChart('sessions-chart', dailyLabels, data.daily_stats.map(item => item.sessions), 'Sessions');
    renderLineChart('users-chart', dailyLabels, data.daily_stats.map(item => item.users), 'Total Users');
    
    renderBarChart('sessions-by-channel-chart', data.sessions_by_channel.map(item => item.channel), data.sessions_by_channel.map(item => item.sessions), 'Sessions');
    renderBarChart('users-by-channel-chart', data.users_by_channel.map(item => item.channel), data.users_by_channel.map(item => item.users), 'Users');
}

function renderLineChart(canvasId, labels, data, label) {
    const ctx = document.getElementById(canvasId)?.getContext("2d");
    if (!ctx) return;

    if (chartInstances[canvasId]) chartInstances[canvasId].destroy();

    chartInstances[canvasId] = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: label,
                data: data,
                borderColor: "rgba(239, 68, 68, 1)", // Tailwind red-500
                backgroundColor: "rgba(239, 68, 68, 0.2)",
                tension: 0.3,
                fill: true,
            }]
        },
        options: getChartOptions()
    });
}

function renderBarChart(canvasId, labels, data, label) {
    const ctx = document.getElementById(canvasId)?.getContext("2d");
    if (!ctx) return;
    
    if (chartInstances[canvasId]) chartInstances[canvasId].destroy();
    
    chartInstances[canvasId] = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: label,
                data: data,
                backgroundColor: "rgba(239, 68, 68, 0.6)",
                borderColor: "rgba(239, 68, 68, 1)",
                borderWidth: 1
            }]
        },
        options: getChartOptions(true) // isBarChart = true
    });
}

function getChartOptions(isBarChart = false) {
    return {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                ticks: { color: "rgba(255, 255, 255, 0.7)" },
            },
            x: {
                ticks: { color: "rgba(255, 255, 255, 0.7)" },
            }
        },
        plugins: {
            legend: {
                display: isBarChart, // Sembunyikan legenda untuk grafik garis agar lebih bersih
                labels: { color: "rgba(255, 255, 255, 0.9)" },
            }
        }
    };
}

function displayErrorOnUI(message) {
    document.getElementById('kpi-sessions').innerText = 'Error';
    // ... isi elemen lain dengan pesan error
    document.querySelector("#popular-pages-tbody").innerHTML = `<tr><td colspan="2" class="py-4 text-center text-red-500">${message}</td></tr>`;
}