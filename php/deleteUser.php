<?php 

    include("conexion.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM carrito_compras WHERE id = '$id'";
        $resultado = $conexion->query($query);

        $deleteUser = "DELETE FROM usuario WHERE id = '$id'";
        $ejecutar = $conexion->query($deleteUser);
        header("Location: ../administrador.php");


    }   

?>