   function swapStyleSheet(sheet) {
  document.getElementById("pagestyle").setAttribute("href", sheet);
}

// Listen for form submissions
document.addEventListener(
  "submit",
  function(event) {
    // Only run our code on .rating forms
    if (!event.target.matches(".rating")) return;
    // Prevent form from submitting
    event.preventDefault();
    // Get the selected star
    let selected = document.activeElement;
    if (!selected) return;
    let selectedIndex = parseInt(selected.getAttribute("data-star"), 10);
    // Get all stars in this form (only search in the form, not the whole document)
    // Convert them from a node list to an array
    // https://gomakethings.com/converting-a-nodelist-to-an-array-with-vanilla-javascript/
    let stars = Array.from(event.target.querySelectorAll(".star"));
    // Loop through each star, and add or remove the `.selected` class to toggle highlighting
    stars.forEach(function(star, index) {
      if (index < selectedIndex) {
        // Selected star or before it
        // Add highlighting
        star.classList.add("selected");
      } else {
        // After selected star
        // Remove highlight
        star.classList.remove("selected");
      }
    });
    // Remove aria-pressed from any previously selected star
    let previousRating = event.target.querySelector(
      '.star[aria-pressed="true"]'
    );
    if (previousRating) {
      previousRating.removeAttribute("aria-pressed");
    }
    // Add aria-pressed role to the selected button
    selected.setAttribute("aria-pressed", true);
  },
  false
);
// Highlight the hovered or focused star
let highlight = (event) => {
  // Only run our code on .rating forms
  let star = event.target.closest(".star");
  let form = event.target.closest(".rating");
  if (!star || !form) return;
  // Get the selected star
  let selectedIndex = parseInt(star.getAttribute("data-star"), 10);
  // Get all stars in this form (only search in the form, not the whole document)
  // Convert them from a node list to an array
  // https://gomakethings.com/converting-a-nodelist-to-an-array-with-vanilla-javascript/
  let stars = Array.from(form.querySelectorAll(".star"));
  // Loop through each star, and add or remove the `.selected` class to toggle highlighting
  stars.forEach(function(star, index) {
    if (index < selectedIndex) {
      // Selected star or before it
      // Add highlighting
      star.classList.add("selected");
    } else {
      // After selected star
      // Remove highlight
      star.classList.remove("selected");
    }
  });
};
// Listen for hover and focus events on stars
document.addEventListener("mouseover", highlight, false);
document.addEventListener("focus", highlight, true);
// Reset highlighting after hover or focus
let resetSelected = (event) => {
  // Only run our code on .rating forms
  if (!event.target.closest) return;
  let form = event.target.closest(".rating");
  if (!form) return;
  // Get all stars in this form (only search in the form, not the whole document)
  // Convert them from a node list to an array
  // https://gomakethings.com/converting-a-nodelist-to-an-array-with-vanilla-javascript/
  let stars = Array.from(form.querySelectorAll(".star"));
  // Get an existing rating if there is one
  let selected = form.querySelector('.star[aria-pressed="true"]');
  let selectedIndex = selected
    ? parseInt(selected.getAttribute("data-star"), 10)
    : 0;
  // Loop through each star, and add or remove the `.selected` class to toggle highlighting
  stars.forEach(function(star, index) {
    if (index < selectedIndex) {
      // Selected star or before it
      // Add highlighting
      star.classList.add("selected");
    } else {
      // After selected star
      // Remove highlight
      star.classList.remove("selected");
    }
  });
};
// Reset selected on mouse off and blur
document.addEventListener("mouseleave", resetSelected, true);
document.addEventListener("blur", resetSelected, true);

//heart button
   $(document).foundation();

   $(function() {
       $('.button-like')
           .bind('click', function(event) {
               $(".button-like").toggleClass("liked");
           })
   });

