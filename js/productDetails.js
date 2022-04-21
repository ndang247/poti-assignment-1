var stock = document.getElementById("stock")?.value;
function quantityValidation() {
    var quantity = document.getElementById("txtQuantity").value;
    // console.log(quantity);
    // Check for decimal, string input and negative numbers
    // NOTE: an alternative is to change input attribute to type number instead of text
    quantity = parseFloat(quantity);
    stock = parseFloat(stock);
    // console.log(quantity);
    if (isNaN(quantity) || quantity <= 0 || quantity % 1 !== 0 || quantity > stock) { 
        alert("Please enter a valid quantity");
        return false;
    }
    stock = stock - quantity;
    // console.log(stock);
    return true;
}