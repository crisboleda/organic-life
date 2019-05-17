<?php 

    include("conexion.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $nombre = $_POST['nombre-producto'];
    $descripcion = $_POST['descrip-producto'];
    $gramos = $_POST['gramos-producto'];
    $precio = $_POST['precio-producto'];
    $tipo = $_POST['tipo-producto'];

    $query = "UPDATE productos set nombreProducto = '$nombre', 
                                   descripcionProducto = '$descripcion',
                                   gramosProducto = '$gramos',
                                   PrecioProducto = '$precio',
                                   tipo = '$tipo'
                                   
              WHERE id_producto = '$id'";

    $resultado = $conexion->query($query);

    header("Location: ../administrador.php?url=listaProductos");


?>