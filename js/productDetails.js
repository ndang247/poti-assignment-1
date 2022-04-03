function quantityValidation() {
    var quantity = document.getElementById("txtQuantity").value;
    // console.log(quantity);
    // Check for decimal, string input and negative numbers
    // NOTE: an alternative is to change input attribute to type number instead of text
    quantity = parseFloat(quantity);
    // console.log(quantity);
    if (isNaN(quantity) || quantity <= 0 || quantity % 1 !== 0) { 
        alert("Please enter a valid quantity");
        return false;
    }
    return true;
}