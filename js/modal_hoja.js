//Modal añadir estudios
const btnAbrirEst = document.querySelector("#btn-estudios")
const btnCerrarEst = document.querySelector("#btn-cerrar-modalEst")
const modalEst = document.querySelector("#modalest")

btnAbrirEst.addEventListener("click", () => {
  modalEst.showModal();
});

btnCerrarEst.addEventListener("click", () => {
  modalEst.close();
});

function CerrarModalEst(){
    modalEst.close();
}

//Modal añadir experiencias laborales
const btnAbrirExp = document.querySelector("#btn-experiencia")
const btnCerrarExp = document.querySelector("#btn-cerrar-modalExp")
const modalExp = document.querySelector("#modalexp")

btnAbrirExp.addEventListener("click", () => {
  modalExp.showModal();
});

btnCerrarExp.addEventListener("click", () => {
  modalExp.close();
});

function CerrarModalExp(){
    modalExp.close();
}

//Modal añadir referencias
const btnAbrirRef = document.querySelector("#btn-referencia")
const btnCerrarRef = document.querySelector("#btn-cerrar-modalRef")
const modalRef = document.querySelector("#modalref")

btnAbrirRef.addEventListener("click", () => {
  modalRef.showModal();
});

btnCerrarRef.addEventListener("click", () => {
  modalRef.close();
});

function CerrarModalRef(){
    modalRef.close();
}