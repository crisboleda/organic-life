var table = document.getElementById('table');
var filas = table.getElementsByTagName('tr')

for (var i = 1; i < filas.length; i = i + 2) {
    filas[i].style.background = "#dddddd30"

}


