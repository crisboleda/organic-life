<?php 

    session_start();
    include("conexion.php");

    $estadoActual = $_POST['estado-de-envio'];
    
    if (isset($_GET['id'])) {
        $id_compra = $_GET['id'];
        
        $query = "UPDATE compras set estadoEnvio = '$estadoActual' WHERE id_compra = '$id_compra'";
        $resultado = mysqli_query($conexion, $query);

        if ($resultado) {
            header("Location: ../administrador.php?url=envios");
        }
    }

?>