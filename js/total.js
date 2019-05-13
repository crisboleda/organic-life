var cantidad = document.getElementById('cantidad').innerHTML;
var total = document.getElementById('setCantidad');
var precioProducto = document.getElementById('precio').innerHTML;

console.log(cantidad);
console.log(precioProducto);

var resultado = parseFloat(precioProducto * cantidad);

total.innerHTML = resultado.toFixed(3);;