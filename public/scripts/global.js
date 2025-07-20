document.addEventListener("DOMContentLoaded", function () {
  const burgerButton = document.querySelector(
    '[data-collapse-toggle="navbar-hamburger"]'
  );
  const navbarMenu = document.getElementById("navbar-hamburger");

  // Only run the script if both the button and menu exist on the page
  if (burgerButton && navbarMenu) {
    burgerButton.addEventListener("click", function () {
      const isExpanded = burgerButton.getAttribute("aria-expanded") === "true";
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
