const btnAbrirR = document.querySelector("#btn-registro")
const btnCerrarR = document.querySelector("#btn-cerrar-modalR")

btnAbrirR.addEventListener("click", () => {
    modalR.showModal();
  });
  
  btnCerrarR.addEventListener("click", () => {
    modalR.close();
  });