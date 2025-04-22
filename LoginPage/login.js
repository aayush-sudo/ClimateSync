document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('login-form');
    const email = document.getElementById('email');
    const password = document.getElementById('password');

    form.addEventListener('submit', function(event) {
        if (!email.value || !password.value) {
            event.preventDefault();
            alert('Please fill in both fields before submitting.');
        }
    });
});
