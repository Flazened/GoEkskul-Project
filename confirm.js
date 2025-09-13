
document.querySelector('form').addEventListener('submit', function(e) {
    var password = document.getElementById('password2').value;
    var confirm = document.getElementById('confirmPassword').value;
    var errorSpan = document.getElementById('passwordError');
    if (password !== confirm) {
        errorSpan.textContent = 'Password dan Konfirmasi Password harus sama!';
        e.preventDefault();
    } else {
        errorSpan.textContent = '';
    }
});