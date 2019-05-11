var icono = document.getElementById('img-perfil');
var submenu = document.getElementById('submenu-perfil');
icono.addEventListener("click", aparecer);

var contador = 1
function desaparecer() {
    if (contador == 2) {
        submenu.style.display = "none";
        contador = 0
    }
    contador = contador + 1
}

function aparecer() {
    let contador = 0
    submenu.style.display = "block";
}

document.addEventListener("click", desaparecer);

