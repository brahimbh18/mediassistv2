function showError(message) {
    let errorDiv = document.getElementById('errorMessage');
    
    if (!errorDiv) {
        errorDiv = document.createElement('div');
        errorDiv.id = 'errorMessage';
        errorDiv.classList.add('error-message');
        document.querySelector('.container').prepend(errorDiv);
    }

    errorDiv.textContent = message;
}

function validatePassword(password, confirmPassword) {
    if (password !== confirmPassword) {
        showError('Passwords do not match!');
        return false;
    }

    if (password.length < 0) {
        showError('Password must be at least 8 characters long!');
        return false;
    }

    return true;
} 

document.getElementById("registerForm").addEventListener("submit", function (e) {
    const pwd = document.getElementById("password").value;
    const confirm = document.getElementById("confirmPassword").value;

    if (!validatePassword(pwd, confirm)) {
        e.preventDefault();
    }
});
