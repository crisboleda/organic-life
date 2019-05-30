var icono = document.getElementById('img-perfil');
var submenu = document.getElementById('submenu-perfil');

if (icono) {
    icono.addEventListener("click", aparecer);
}

var contador1 = 0;


function aparecer() {
    submenu.style.display = "block";
    contador1 = contador1 + 1
}

document.addEventListener("click", desaparecer);

function desaparecer() {
    if (contador1 == 2) {
        submenu.style.display = "none";
        contador1 = 0;
    }else {
        contador1 = contador1 + 1;
    }
}


