var li = document.getElementById('li-selector');

if (li) {
    li.addEventListener('click', mostrarSubMenu);
}

var ulSub = document.getElementById('submenu-cat');

var contador = 0;
function mostrarSubMenu() {
    if (contador == 0) {
        ulSub.style.display = "block";
        contador = contador + 1
    }else {
        ulSub.style.display = "none";
        contador = 0;
    }
}