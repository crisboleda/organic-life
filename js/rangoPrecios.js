var rangosPrecio = document.getElementsByName('precio');


for (let i = 0; i < rangosPrecio.length; i++) {
    rangosPrecio[i].addEventListener("click", capturarRango);

    function capturarRango() {
        var rango = rangosPrecio[i].value,
            separadorString = /(\d+)/g,
            listRangos = rango.match(separadorString);

        if (listRangos) {
            var rangoMenor = listRangos[0];
            var rangoMayor = listRangos[1];
        }

        const tarjetas = document.getElementsByClassName('card');


        for (let i = 0; i < tarjetas.length; i++) {
            var precioCard = String(tarjetas[i].children[4].getAttribute('value')); 
            tarjetas[i].style.display = "inline-block";
            
            var precioCard = precioCard.replace(".", "");

            var precioProducto = parseInt(precioCard);
        
            if ((precioProducto < rangoMenor) || (precioProducto > rangoMayor)) {
                tarjetas[i].style.display = "none";
            }
        }
    }
}



