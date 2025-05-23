// filepath: testsite/src/js/script.js
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const usernameInput = document.querySelector('input[name="username"]');
    const passwordInput = document.querySelector('input[name="password"]');

    form.addEventListener('submit', function(event) {
        let valid = true;

        if (usernameInput.value.trim() === '') {
            valid = false;
            alert('Please enter your username.');
        }

        if (passwordInput.value.trim() === '') {
            valid = false;
            alert('Please enter your password.');
        }

        if (!valid) {
            event.preventDefault();
        }
    });
});