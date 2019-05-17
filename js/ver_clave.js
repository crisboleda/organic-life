var ver = document.getElementById('mostrar');
var ocultar = document.getElementById('no-ver');

ver.addEventListener("click", mostrarContraseña);
ocultar.addEventListener("click", mostrarContraseña);

function mostrarContraseña() {
    var contraseña = document.getElementById('contraseñaUser');

    if (contraseña.type == "password") {
        contraseña.type = "text";
        ver.style.display = "none";
        ocultar.style.display = "block";

    }else {
        contraseña.type = "password";
        ver.style.display = "block";
        ocultar.style.display = "none";
    }
}