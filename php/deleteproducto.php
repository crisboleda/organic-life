<?php 

    include("conexion.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $delCarrito = "DELETE FROM carrito_compras WHERE producto = '$id'";
        $resultado = $conexion->query($delCarrito);

        $deleteProducto = "DELETE FROM productos WHERE id_producto = '$id'";
        $ejecutar = $conexion->query($deleteProducto);

        header("Location: ../administrador.php");

    }

?>