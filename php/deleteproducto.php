<?php 

    include("conexion.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $query = "DELETE FROM productos WHERE id_producto = '$id'";
        $resultado = $conexion->query($query);

        if (!$resultado) {
            echo "Error";
        }

        header("Location: ../administrador.php");
    }

?>