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
    }
  });
});