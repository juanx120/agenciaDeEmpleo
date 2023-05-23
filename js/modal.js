//Modal registro
const btnAbrirR = document.querySelector("#btn-registro")
const btnCerrarR = document.querySelector("#btn-cerrar-modalR")
const modalR = document.querySelector("#modalr")

btnAbrirR.addEventListener("click", () => {
  modalR.showModal();
});

btnCerrarR.addEventListener("click", () => {
  modalR.close();
});

function CerrarModal(){
    modalR.close();
}

//Modal de olvido contraseña
const btnAbrirP = document.querySelector("#btn-password")
const btnCerrarP = document.querySelector("#btn-cerrar-modalP")
const modalP = document.querySelector("#modalp")

btnAbrirP.addEventListener("click", () => {
  modalP.showModal();
});

btnCerrarP.addEventListener("click", () => {
  modalP.close();
});

function CerrarModalP(){
    modalP.close();
}

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