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
          const isDrawerHidden = drawer.classList.contains("-translate-x-full");
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