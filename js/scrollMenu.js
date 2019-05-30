window.addEventListener("scroll", accion)
var menu = document.getElementById('sub-menu');
var seccion = document.getElementById('seccion1');

function accion() {
    var coordenadas = menu.getBoundingClientRect().top
    var posicion = seccion.getBoundingClientRect().top

    if (coordenadas <= 0) {
        menu.style.position = "fixed";
        menu.style.top = "0"
        menu.style.backgroundColor = "#FFF";
    }

    if (posicion >= 65) {
        menu.style.position = "relative";
        menu.style.top = null;
    }
}
