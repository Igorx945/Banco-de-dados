const formulario = document.querySelector('#loginForm')
document.getElementById('togglePassword').addEventListener('click', function () {
    var passwordInput = document.getElementById('password');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }
});
function showCard() {
    document.getElementById('card').style.display = 'flex';
}

function hideCard() {
    document.getElementById('card').style.display = 'none';
}