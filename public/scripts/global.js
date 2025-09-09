document.addEventListener("DOMContentLoaded", function () {
    const burgerButton = document.querySelector(
        '[data-collapse-toggle="navbar-hamburger"]',
    );
    const navbarMenu = document.getElementById("navbar-hamburger");

    // Only run the script if both the button and menu exist on the page
    if (burgerButton && navbarMenu) {
        burgerButton.addEventListener("click", function () {
            const isExpanded =
                burgerButton.getAttribute("aria-expanded") === "true";
            burgerButton.setAttribute("aria-expanded", !isExpanded);
            navbarMenu.classList.toggle("hidden");
        });

        // Close menu when clicking outside
        document.addEventListener("click", function (event) {
            const isMenuOpen = !navbarMenu.classList.contains("hidden");
            const isClickOutside =
                !burgerButton.contains(event.target) &&
                !navbarMenu.contains(event.target);

            if (isMenuOpen && isClickOutside) {
                navbarMenu.classList.add("hidden");
                burgerButton.setAttribute("aria-expanded", "false");
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    // Definisi variabel tetap sama
    const container = document.getElementById('lang-switcher-container');
    const initialBtn = document.getElementById('lang-switcher-initial');
    const expandedView = document.getElementById('lang-switcher-expanded');
    const toggleBtn = document.getElementById('lang-switcher-toggle');
    const langOptions = document.getElementById('lang-options');
    const arrowIcon = document.getElementById('arrow-icon');
    let isMenuOpen = false;

    // Event Handler 1: (Tidak ada perubahan)
    initialBtn.addEventListener('click', (event) => {
        event.stopPropagation();
        initialBtn.classList.add('opacity-0', '-translate-x-full', 'pointer-events-none');
        expandedView.classList.remove('opacity-0', 'pointer-events-none');
    });

    // --- Event Handler 2: (INI YANG DIUBAH) ---
    // Mengubah class opacity dan transform untuk animasi
    toggleBtn.addEventListener('click', (event) => {
        event.stopPropagation();
        isMenuOpen = !isMenuOpen;
        
        if (isMenuOpen) {
            // MENAMPILKAN menu dengan animasi
            langOptions.classList.remove('opacity-0', 'pointer-events-none', '-translate-y-2');
            langOptions.classList.add('opacity-100', 'translate-y-0');
            arrowIcon.style.transform = 'rotate(180deg)';
        } else {
            // MENYEMBUNYIKAN menu dengan animasi
            langOptions.classList.add('opacity-0', 'pointer-events-none', '-translate-y-2');
            langOptions.classList.remove('opacity-100', 'translate-y-0');
            arrowIcon.style.transform = 'rotate(0deg)';
        }
    });

    // --- Event Handler 3: (INI YANG DIUBAH) ---
    // Menutup dropdown saat klik di luar
    document.addEventListener('click', function() {
        if (isMenuOpen) {
            langOptions.classList.add('opacity-0', 'pointer-events-none', '-translate-y-2');
            langOptions.classList.remove('opacity-100', 'translate-y-0');
            arrowIcon.style.transform = 'rotate(0deg)';
            isMenuOpen = false;
        }
    });
});