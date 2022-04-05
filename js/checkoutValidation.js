function isValidate(event) {
    'use strict';
    var checkoutForm = document.getElementById("checkoutForm");
    var purchaseBtn = document.getElementById("purchaseBtn");
    var loadingBtn = document.getElementById("loadingBtn");

    // Checkout if checkoutForm exist
    console.log(checkoutForm);
    if (checkoutForm) {
        // If the form is not validated, prevent the form from being submitted
        console.log(checkoutForm.checkValidity());
        checkoutForm.classList.add('was-validated');
        if (!checkoutForm.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
            return false;
        }
        else {
            purchaseBtn.setAttribute("hidden", "");
            loadingBtn.removeAttribute("hidden");
            // checkoutForm.classList.add('was-validated');
            return true;
        }
    }
}