function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

var contenido = getParameterByName('url');
console.log(contenido);

var contenidos = document.getElementsByClassName('opcionMenu');
    for (var i = 0; i < contenidos.length; i++) {   
        contenidos[i].style.display = "none";
        var id = contenidos[i].id;
        if (contenido == id) {
            var elemento = document.getElementById(id);
            elemento.style.display = "block";    
        }
    }