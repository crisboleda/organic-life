<?php 

    session_start();
    include("conexion.php");

    $nombre = $_POST['nombre-admin'];
    $apellido = $_POST['apellido-admin'];
    $correo = $_POST['correo-admin'];
    $clave = $_POST['clave-admin'];
    $domicilio = $_POST['direccion-admin'];
    $ciudad = $_POST['ciudad-admin'];
    $telefono = $_POST['telefono-admin'];
    $rank = "admin";

    $query = "INSERT INTO usuario (nombreUser, apellidoUser, contraseñaUser, correoUser, 
                                    direccionUser, ciudad, telefono, rango)
                    VALUES ('$nombre', '$apellido', '$clave', '$correo', '$domicilio',
                            '$ciudad', '$telefono', '$rank')";

    $resultado = $conexion->query($query);

    header("Location: ../administrador.php");

?>