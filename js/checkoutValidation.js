function isValidate(event) {
    'use strict';
    var checkoutForm = document.getElementById("checkoutForm");
    // Checkout if checkoutForm exist
    console.log(checkoutForm);
    if (checkoutForm) {
        // If the form is not validated, prevent the form from being submitted
        console.log(checkoutForm.checkValidity());
        if (!checkoutForm.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        checkoutForm.classList.add('was-validated');
    }
    // Reference for getting all the classes of a DOM element
    // https://melvingeorge.me/blog/get-all-classnames-of-element-dom-javascript
    // Get all the class of the form and check if the class contains was-validated
    checkoutForm.classList.forEach(element => {
        if (element.includes('was-validated')) return false;
        else return true;
    });
}