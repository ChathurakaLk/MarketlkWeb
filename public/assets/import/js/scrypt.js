

//Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}


//back button create

$(document).ready(function() {
  $('#backButton').on('click', function() {
      history.back();
  });

  // Automatically fade out messages
  setTimeout(function() {
      $(".msg-danger-text, .msg-success-text").fadeOut("slow");
  }, 2000);
});
  // Automatically fade out alert

  setTimeout(function() {
    $(".alert-danger, .alert-success").fadeOut("slow");
}, 2000);




//validate input for quantity ========

function validateQuantity(input) {
    // Get the entered value
    var value = parseInt(input.value);

    // Check if the entered value is not a number or less than or equal to zero
    if (isNaN(value) || value <= 0) {
        // If the value is not valid, set it to 1
        input.value = 1;
    }
};

// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  })();

  function updateQuantityCount() {
    $('.info').each(function() {
        var totalQuantity = parseInt($(this).find('.input-number').val());
        // Find the corresponding quantity count element for this item
        var quantityCountElement = $(this).find('.quantity-count');

        // Check if quantity is within the range of 1 to 5
        if (totalQuantity >= 1 && totalQuantity <= 5) {
            // Update the quantity count for this item
            quantityCountElement.text(totalQuantity);
            // Store the quantity count for this item in its data attribute
            quantityCountElement.data('quantity', totalQuantity);
        } else {
            // Print an error message if quantity is not within the range
            console.error("Error: Quantity must be between 1 and 5 for each item.");
        }
    });
}

















