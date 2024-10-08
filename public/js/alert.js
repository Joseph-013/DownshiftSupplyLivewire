// let alertActive = false;

document.addEventListener("livewire:init", () => {
    let timeoutId = null;

    Livewire.on("alertNotif", (event) => {
        const message = event[0].message;
        const type = event[0].type;
        // console.log(message)

        const alertMessageDiv = document.getElementById("alertMessageDiv");
        const alertDiv = document.getElementById("alertDiv");

        clearTimeout(timeoutId); // Clear any existing timeout
        alertMessageDiv.textContent = message;
        alertDiv.style.display = "block";

        switch (type) {
            case 'warning': {
                alertDiv.style.backgroundColor = 'rgb(255 103 103)';
                alertDiv.style.color = 'white';
                break;
            }
            case 'neutral': {
                alertDiv.style.backgroundColor = 'rgb(26 131 244)';
                alertDiv.style.color = 'white';
                break;
            }
            case 'positive': {
                alertDiv.style.backgroundColor = 'rgb(34 197 94)';
                alertDiv.style.color = 'white';
                break;
            }
            //case default:
            default: {
                alertDiv.style.backgroundColor = 'rgb(249 115 22)';
                alertDiv.style.color = 'white';
            }
        }

        timeoutId = setTimeout(() => {
            alertDiv.style.display = "none";
        }, 1800);
    });

    // function revealAlert(message) {

    // }
});

