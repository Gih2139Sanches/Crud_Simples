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
const campoNome = document.getElementById("campoNome");
const titulo = document.getElementById("titulo");

signinBtn.onclick = function () {
  campoNome.style.maxHeight = "0";
  titulo.innerHTML = "Login";
  signupBtn.classList.add("disabilitado");
  signinBtn.classList.remove("disabilitado");
};
signupBtn.onclick = function () {
  campoNome.style.maxHeight = "60px";
  titulo.innerHTML = "Cadastra-se";
  signupBtn.classList.remove("disabilitado");
  signinBtn.classList.add("disabilitado");
};
