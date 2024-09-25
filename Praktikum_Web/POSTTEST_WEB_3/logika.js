const button = document.querySelector(".tombol");
const opsi = document.querySelector(".opsi");
const mode = document.querySelector(".mode");
const opsigambar = document.querySelector(".tombol img");
const modegambar = document.querySelector(".mode img");

let isDark = false;
let statusGambar = false;

button.addEventListener("click", () => {
  opsi.classList.toggle("tampil");
  statusGambar = !statusGambar;
  if (statusGambar) {
    opsigambar.src = "carbon--close-filled.svg";
  } else {
    opsigambar.src = "charm--menu-hamburger.svg";
  }
});

mode.addEventListener("click", () => {
  document.body.classList.toggle("darkmode");
  isDark = !isDark;
  if (isDark) {
    modegambar.src = "fluent-emoji-flat--sun.svg";
  } else {
    modegambar.src = "twemoji--full-moon.svg";
  }
});

window.onload = function() {
  alert("Selamat datang di RoboTech!");
};
