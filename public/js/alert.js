// let alertActive = false;

document.addEventListener('livewire:init', () => {
    Livewire.on('alertCartAdd', (event) => {
        revealAlert("Added to Cart");
    });
    Livewire.on('alertCartExists', (event) => {
        revealAlert("Product already exists in your cart");
    });
});

function revealAlert(message) {
    const alertMessageDiv = document.getElementById("alertMessageDiv");
    const alertDiv = document.getElementById("alertDiv");

    alertMessageDiv.textContent = message;
    alertDiv.style.display = "block";
    setTimeout(() => {
        alertDiv.style.display = "none";
    }, 1500);
}
