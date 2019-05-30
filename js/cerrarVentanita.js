var btn_Cerrar = document.getElementById('close-alert')
btn_Cerrar.addEventListener('click', ocultarVentana)
var alerta = document.getElementById('ventana-emergente')
var ventana = document.getElementById('miModal')

var recuperarContraseña = document.getElementById('recuperar')
recuperarContraseña.addEventListener("click", ventanaRecuperar)

function ventanaRecuperar() {
    ventana.style.display = "block";
}

function ocultarVentana() {
    ventana.style.display = "none";
    alerta.style.display = "none";
}