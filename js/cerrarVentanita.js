var btn_Cerrar = document.getElementById('close-alert');
btn_Cerrar.addEventListener('click', ocultarVentana);
var alerta = document.getElementById('ventana-emergente');

function ocultarVentana() {
    alerta.style.display = "none";
}