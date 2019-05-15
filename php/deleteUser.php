<?php 

    include("conexion.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM usuario WHERE id = '$id'";

        $resultado = $conexion->query($query);

        header("Location: ../administrador.php");

    }   

?>