document.addEventListener("scroll", prueba);
var header = document.getElementById('cabecera');

function prueba() {
    let ubicacionScroll = document.documentElement.scrollTop;
    parseInt(ubicacionScroll);

    if (ubicacionScroll > 80) {
        header.classList.add('bajar-header');

    }else if (ubicacionScroll < 10) {
        header.classList.remove('bajar-header')
    }
}