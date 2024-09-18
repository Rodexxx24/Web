const button = document.querySelector(".tombol");
const opsi = document.querySelector(".opsi");

button.addEventListener("click", () => {
  opsi.classList.toggle("tampil");
});
