var btn_cerrar = document.getElementById('close-alert')
var ventanaEmergente = document.getElementById('miModal')
var btn_comprar = document.getElementById('btn-comprar')
var total = parseFloat(document.getElementById('campoTotal').getAttribute('value'))
console.log(total)

btn_comprar.addEventListener("click", abrirVentana)
btn_cerrar.addEventListener("click", cerrarVentana)

function abrirVentana() {
    if (total > 0) {
        ventanaEmergente.style.display = "block"
    }
}

function cerrarVentana() {
    ventanaEmergente.style.display = "none"
}