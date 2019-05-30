const cards = document.getElementsByClassName('card-venta');
const padreEstadoEnvio = document.getElementsByClassName('estado-envio');


for (let i = 0; i < cards.length; i++) {
    var primeraLinea = padreEstadoEnvio[i].children[0],
        bola1 = primeraLinea.children[0];

    var segundaLinea = padreEstadoEnvio[i].children[1],
        bola2 = segundaLinea.children[0],
        bola3 = segundaLinea.children[1];

    var estado = cards[i].getAttribute('data-value');

    if (estado == "Pendiente") {
        bola1.style.backgroundColor = "#68d436";
        primeraLinea.style.backgroundColor = "#c4c4c470";
        segundaLinea.style.backgroundColor = "#c4c4c470";
        bola2.style.backgroundColor = "#e0e0e0";
        bola3.style.backgroundColor = "#e0e0e0";

    }else if (estado == "En camino") {
        bola1.style.backgroundColor = "#68d436";
        bola2.style.backgroundColor = "#68d436";
        primeraLinea.style.backgroundColor = "#68d436";
        segundaLinea.style.backgroundColor = "#c4c4c470";

    }else {
        bola1.style.backgroundColor = "#68d436";
        bola2.style.backgroundColor = "#68d436";
        bola3.style.backgroundColor = "#68d436";
        primeraLinea.style.backgroundColor = "#68d436";
        segundaLinea.style.backgroundColor = "#68d436";
    }
    
}






// ------------------------------------------------

const valoresEstadosEnvios = document.getElementsByClassName('valueEstado'),
      formularioEstados = document.getElementsByName('form-cambiarEstadosEnvio');


for (let i = 0; i < valoresEstadosEnvios.length; i++) {
    var contenido = String(valoresEstadosEnvios[i].innerHTML),
        inputPendiente = formularioEstados[i].children[0],
        inputEnCamino = formularioEstados[i].children[2],
        inputEntregado = formularioEstados[i].children[4];

    if (contenido == "Pendiente") {
        inputPendiente.setAttribute("checked", "true");
        valoresEstadosEnvios[i].classList.add('colorAlerta');

    }else if (contenido == "En camino") {
        inputEnCamino.setAttribute("checked", "true");
        valoresEstadosEnvios[i].classList.add('colorPrecaucion');

    }else {
        inputEntregado.setAttribute("checked", "true");
        valoresEstadosEnvios[i].classList.add('colorCompletado');
    }
}


