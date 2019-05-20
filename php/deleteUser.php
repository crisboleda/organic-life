<?php 

    include("conexion.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $compras = "DELETE FROM compras WHERE id_cliente = '$id'";
        $deleteCompras = mysqli_query($conexion, $compras);

        $query = "DELETE FROM carrito_compras WHERE id_usuario = '$id'";
        $resultado = $conexion->query($query);

        $deleteUser = "DELETE FROM usuario WHERE id = '$id'";
        $ejecutar = $conexion->query($deleteUser);
        header("Location: ../administrador.php");


    }   

?>