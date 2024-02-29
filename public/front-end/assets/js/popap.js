// Sing Up JS Popap Code

function SingModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "flex";
}

function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}

// Close the modal if clicked outside of it
window.addEventListener("click", function (event) {
    var modal = document.getElementById("myModal");
    if (event.target === modal) {
        modal.style.display = "none";
    }
});

// Login JS Popap Code

function LoginModal() {
    var modal = document.getElementById("LoginModal");
    modal.style.display = "flex";
}

function closeModals() {
    var modal = document.getElementById("LoginModal");
    modal.style.display = "none";
}

// Close the modal if clicked outside of it
window.addEventListener("click", function (event) {
    var modal = document.getElementById("LoginModal");
    if (event.target === modal) {
        modal.style.display = "none";
    }
});
