function mo(obj) {
    hideImages();
    var img;
    switch (obj.title) {
        case "Frozen Food":
            img = document.getElementById("frozenFoodImg");
            break;
        case "Fresh Food":
            img = document.getElementById("freshFoodImg");
            break;
        case "Beverages":
            img = document.getElementById("beveragesImg");
            break;
        case "Home Health":
            img = document.getElementById("homeHealthImg");
            break;
        case "Pet Food":
            img = document.getElementById("petFood");
            break;
        default:
            break;
    }
    img.style.display = "block";
}

function hideImages() {
    var subImages = document.querySelectorAll(".hidden");
    subImages.forEach(element => {
        element.style.display = "none";
    });
}