<?php 

    $destino = 'lifeorganic182@gmail.com';
    $asunto = $_POST['posdata'];
    $nombre = $_POST['nombre'];
    $email = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    mail($destino, $asunto, $nombre, $email, $mensaje);

    header("Location: ../contacto.php");

?>