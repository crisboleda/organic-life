const btn_cerrar = document.getElementById('close-alert')
const ventana = document.getElementById('miModal')
const enlaces = document.getElementsByClassName('href-detalles')

for (let i = 0; i < enlaces.length; i++) {
    enlaces[i].addEventListener("click", abrirVentana)
}

btn_cerrar.addEventListener("click", cerrarVentana)

function abrirVentana() {
    ventana.style.display = "block"
}

function cerrarVentana() {
    ventana.style.display = "none"
}