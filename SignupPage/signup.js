document.addEventListener("DOMContentLoaded", function () {
    const signupForm = document.getElementById("signup-form");

    signupForm.addEventListener("submit", function (e) {
        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirm-password").value;

        if (!name || !email || !password || !confirmPassword) {
            e.preventDefault();
            alert("Please fill in all fields.");
            return;
        }

        if (password !== confirmPassword) {
            e.preventDefault();
            alert("Passwords do not match. Please try again.");
            return;
        }
    });
});
