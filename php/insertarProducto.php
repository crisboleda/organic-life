<?php
    include("conexion.php");
    
    if (isset($conexion)) {
        echo "";
    }else {
        echo "Error";
    }

    $nameProducto = $_POST['nombre-producto'];
    // strtolower(rand())
    $fotoOriginal = $_FILES['imagen']['name'];
	$nombreFoto = $fotoOriginal;
	$cd = $_FILES['imagen']['tmp_name'];
	$ruta = "../imagenesProductos/".$fotoOriginal;
	$destinoFoto = "imagenesProductos/".$nombreFoto;
	$resultado = @move_uploaded_file($cd, $ruta);
    
    $descripcion = $_POST['descrip-producto'];
    $gramos = $_POST['gramos-producto'];
    $precio = $_POST['precio-producto'];
    $tipo = $_POST['tipo-producto'];

    $query = "INSERT INTO productos (nombreProducto, imagenProducto, descripcionProducto,                                  gramosProducto, precioProducto, tipo) 
                    VALUES ('$nameProducto', '$destinoFoto', '$descripcion', '$gramos',
                           '$precio', '$tipo')";

    $resultado = $conexion->query($query);

    header("Location: ../administrador.php");

?>