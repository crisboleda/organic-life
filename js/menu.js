
var boton = document.getElementById('boton-menu');
var menuLateral = document.getElementById('menu-responsive');
boton.addEventListener('click', clickBoton);

var contador = 0
function clickBoton() {
    console.log(contador)
    if (contador == 0) {
        menuLateral.style.right = "0";
        contador = contador + 1;
    }else {
        menuLateral.style.right = "-100%";
        contador = 0;
    }
}
