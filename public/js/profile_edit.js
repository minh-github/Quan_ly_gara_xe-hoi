function displayPreviewAvt(event) {
    let path = window.URL.createObjectURL(event.target.files[0])
    document.getElementById('avatar_img').setAttribute('src', path)
}
function checkPass() {
    let pass = document.getElementById('password-field').value
    let confirm = document.getElementById('password-confirm')

    if (confirm.value != pass) {
        confirm.style.borderColor = 'red'
        confirm.value = ''
        confirm.setAttribute('placeholder', 'mật khẩu không khớp')
    }
    else {
        confirm.style.borderColor = 'green'
    }
}