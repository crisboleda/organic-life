<?php 

    session_start();

    if(isset($_SESSION['datos'])){
        $usuario = $_SESSION['datos']['rango'];
        if ($usuario == "admin") {
            header("Location: ../administrador.php");
        }else {
            header("Location: ../usuario.php");
        }
    }else {
        header("Location: ../index.php");
    }

?>
