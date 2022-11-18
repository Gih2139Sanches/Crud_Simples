/* HomePage */
const navLinks = document.getElementById("navLinks");

function mostraMenu() {
  navLinks.style.right = "0";
}
function escondeMenu() {
  navLinks.style.right = "-200px";
}

/* Tela de Login */
const signupBtn = document.getElementById("signupBtn");
const signinBtn = document.getElementById("signinBtn");
const campoEmail = document.getElementById("campoEmail");
const titulo = document.getElementById("titulo");

signinBtn.onclick = function () {
  campoEmail.style.maxHeight = "0";
  titulo.innerHTML = "Login";
  signupBtn.classList.add("disabilitado");
  signinBtn.classList.remove("disabilitado");
};
signupBtn.onclick = function () {
  campoEmail.style.maxHeight = "60px";
  titulo.innerHTML = "Cadastra-se";
  signupBtn.classList.remove("disabilitado");
  signinBtn.classList.add("disabilitado");
};
