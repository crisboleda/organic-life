var btn_cerrar = document.getElementById('close-alert');
var ventanaEmergente = document.getElementById('miModal');
var btn_comprar = document.getElementById('btn-comprar');

btn_comprar.addEventListener("click", abrirVentana);
btn_cerrar.addEventListener("click", cerrarVentana);

function abrirVentana() {
    ventanaEmergente.style.display = "block";
}

function cerrarVentana() {
    ventanaEmergente.style.display = "none";
}