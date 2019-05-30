<?php 

    include("conexion.php");
    session_start();

    $id = $_SESSION['datos']['id'];

    $name = $_SESSION['datos']['Nombre'];
    $correo = $_SESSION['datos']['email'];

    $nombre = $_POST['nombre-user'];
    $apellido = $_POST['apellido-user'];
    $correo = $_POST['correo-user'];
    $domicilio = $_POST['direccion-user'];
    $codigoPostal = $_POST['cod_postal'];
    $ciudad = $_POST['ciudad-user'];
    $telefono = $_POST['telefono-user'];

    $query = "UPDATE usuario set nombreUser = '$nombre',
                                 apellidoUser = '$apellido',
                                 correoUser = '$correo',
                                 direccionUser = '$domicilio',
                                 codigo_postal = '$codigoPostal',
                                 ciudad = '$ciudad',
                                 telefono = '$telefono'
                                 
                            WHERE id = '$id'";

    $resultado = $conexion->query($query);
    header("Location: ../usuario.php?url=update");

?>