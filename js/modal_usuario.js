//Modal añadir sedes
const btnAbrirS = document.querySelector("#btn-sedes")
const btnCerrarS = document.querySelector("#btn-cerrar-modalS")
const modalS = document.querySelector("#modals")

btnAbrirS.addEventListener("click", () => {
  modalS.showModal();
});

btnCerrarS.addEventListener("click", () => {
  modalS.close();
});

function CerrarModalS(){
    modalS.close();
}