<?php 

    session_start();

    if(isset($_SESSION['datos'])){
        $usuario = $_SESSION['datos']['rango'];
        if ($usuario == "admin") {
            header("Location: ../admin.php");
        }else {
            header("Location: ../catalogo.php");
        }
    }else {
        header("Location: ../index.php");
    }

?>
