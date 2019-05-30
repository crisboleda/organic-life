const iconBuscar = document.getElementById('buscador');
const lista = document.getElementById('lista-principal');
const contenido = document.getElementById('contenido');

iconBuscar.addEventListener("click", acciones);

function acciones() {
    lista.style.display = "none";
    contenido.style.transition = "0.4s";
    contenido.style.top = "0";
    contenido.style.marginTop = "20px";
}

contenido.addEventListener("mouseleave", ocultar);

function ocultar() {
    console.log(1)
    contenido.style.transition = "0.7s";
    contenido.style.top = "-100%";
    lista.style.display = "block";
}

const mensaje = document.getElementById('messageError');
if (mensaje) {
    setTimeout(function(){ocultarMensaje()},4000);
}

function ocultarMensaje() {
    mensaje.classList.add('ocultar');
}
