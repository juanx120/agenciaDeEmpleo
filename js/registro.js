const btnAbrirR = document.querySelector("#btn-registro")
const btnCerrarR = document.querySelector("#btn-cerrar-modalR")
const modalR = document.querySelector("#modalr")

//Modal registro
btnAbrirR.addEventListener("click", () => {
  modalR.showModal();
});

btnCerrarR.addEventListener("click", () => {
  modalR.close();
});

function CerrarModal(){
    modalR.close();
}

const btnAbrirP = document.querySelector("#btn-password")
const btnCerrarP = document.querySelector("#btn-cerrar-modalP")
const modalP = document.querySelector("#modalp")


//Modal de olvido contraseña
btnAbrirP.addEventListener("click", () => {
  modalP.showModal();
});

btnCerrarP.addEventListener("click", () => {
  modalP.close();
});

function CerrarModalP(){
    modalP.close();
}