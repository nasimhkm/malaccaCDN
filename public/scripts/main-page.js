document.addEventListener("DOMContentLoaded", function () {
  // Select all the product description paragraphs
  const descriptions = document.querySelectorAll(".product-description");

  descriptions.forEach(description => {
    // Find the 'Read More' button that is a sibling to the paragraph
    const readMoreBtn = description.nextElementSibling;

    // Check if the text is overflowing (clamped)
    // scrollHeight is the total height, clientHeight is the visible height
    if (description.scrollHeight > description.clientHeight) {
      // If it overflows, make sure the button is visible
      readMoreBtn.style.display = 'block';
    } else {
      // If it doesn't overflow, hide the button
      readMoreBtn.style.display = 'none';
    }

    // Add a click listener to the button
    if (readMoreBtn) {
      readMoreBtn.addEventListener('click', function() {
        // Toggle the line-clamp class
        description.classList.toggle('line-clamp-3');

        // Change the button text
        if (description.classList.contains('line-clamp-3')) {
          this.textContent = 'Read More';
        } else {
          this.textContent = 'Read Less';
        }
      });
    }
  });
});