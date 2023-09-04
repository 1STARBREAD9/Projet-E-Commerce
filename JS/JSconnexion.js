var a;
function pass() {
  if (a == 1) {
    document.getElementById('showpassword').type = 'password';
    document.getElementById('pass-icon').src = '/ProjetWeb PORSCHE/images/HidePassword.png';
    a = 0;
  }
  else {
    document.getElementById('showpassword').type = 'text';
    document.getElementById('pass-icon').src = '/ProjetWeb PORSCHE/images/ShowPassword.png';
    a = 1;
  }
}
