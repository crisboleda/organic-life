var cantidad = document.getElementById('cantidad');
var masCantidad = document.getElementById('mas');
var menosCantidad = document.getElementById('menos');

masCantidad.addEventListener("click", aumentarCantidad);
menosCantidad.addEventListener("click", disminuirCantidad);

var contador = 1;
function aumentarCantidad() {
    contador = contador + 1;
    console.log(contador);
    cantidad.value = contador;
}

function disminuirCantidad() {
    contador = contador - 1;
    if (contador == 0) {
        contador = 1;
    }
    cantidad.value = contador;
}