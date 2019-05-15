<?php 
    
    session_start();
    include("conexion.php");

    if (isset($_GET['id'])) {
        $id_producto = $_GET['id'];
    }

    if (isset($_SESSION['datos'])) {
        $id_usuario = $_SESSION['datos']['id'];
    }else {
        header("Location: ../login.php");
        $_SESSION['loginCarrito'] = "Debes ingresar con tu cuenta para acceder al carrito de compras";
    }

    $cantidad = $_POST['cantidadTotal'];

    echo $id_producto;
    echo $cantidad;
    echo $id_usuario;

    $query = "INSERT INTO carrito_compras (id_usuario, producto, cantidad) 
                                    VALUES ('$id_usuario', '$id_producto', '$cantidad')";

    $resultado = $conexion->query($query);

    if ($resultado) {
        header("Location: ../carrito.php");
    }else {
        echo "Error";
    }

?>