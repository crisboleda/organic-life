<?php 

    session_start();
    include("conexion.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $query = "DELETE FROM carrito_compras WHERE id_carrito = '$id'";

    $resultado = $conexion->query($query);

    header("Location: ../carrito.php");

?>
