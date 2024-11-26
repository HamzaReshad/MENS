const signUpForm = document.getElementById('signUpForm');
const usernameField = document.getElementById('username');
const usernameExistsModal = document.getElementById('usernameExistsModal');

document.getElementById('showSignUp').addEventListener('click', function() {
    signUpForm.style.display = 'flex';
});

usernameField.addEventListener('input', function() {
    const username = usernameField.value.trim();

    if (username.length > 0) {
        fetch('check_username.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `username=${encodeURIComponent(username)}`
        })
        .then(response => response.text())
        .then(data => {
            if (data === 'exists') {
                showModal();
            }
        })
        .catch(error => {
            console.error('Error checking username:', error);
        });
    }
});

function showModal() {
    usernameExistsModal.classList.remove('hide');
    usernameExistsModal.classList.add('show');
}

function closeModal() {
    usernameExistsModal.classList.remove('show');
    usernameExistsModal.classList.add('hide');
}
