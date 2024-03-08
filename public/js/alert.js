// let alertActive = false;

document.addEventListener("livewire:init", () => {
    Livewire.on("alertNotif", (message) => {
        revealAlert(message);
    });
});

function revealAlert(message) {
    const alertMessageDiv = document.getElementById("alertMessageDiv");
    const alertDiv = document.getElementById("alertDiv");

    alertMessageDiv.textContent = message;
    alertDiv.style.display = "block";
    setTimeout(() => {
        alertDiv.style.display = "none";
    }, 1750);
}
