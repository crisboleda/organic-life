<?php

    session_start();
    if (isset($_GET['url'])) {
        $url= $_GET['url'];
    }

    include("conexion.php");

    $correo = $_POST['emailUser'];
    $contraseña = $_POST['clave'];
    $confirmarContraseña = $_POST['claveConfirm'];

    $verificarCorreo = "SELECT * FROM usuario WHERE correoUser = '$correo'";
    $comprobar = mysqli_query($conexion, $verificarCorreo);

    if (mysqli_num_rows($comprobar) >= 1 ) {
        $_SESSION['Error'] = "El correo que intenta registrar, ya esta en uso";
        header("Location: ../registro.php");
        
    }else {
        if ($contraseña == $confirmarContraseña) {
            $query = "INSERT INTO usuario (correoUser, contraseñaUser) 
                                VALUES ('$correo', '$contraseña')";
    
            $resultado = $conexion->query($query);
            
        }else {
            $_SESSION['Error'] = "Las contraseñas no coinciden";
            header("Location: ../registro.php");
        } 
    
        if ($resultado == 1) {
            $secondquery = "SELECT * FROM usuario WHERE correoUser='$correo' 
            AND contraseñaUser='$contraseña'";
    
            $secondResult = $conexion->query($secondquery);
    
            $informacion = mysqli_fetch_array($secondResult);
            $_SESSION['datos'] = $informacion;
        }
    
        if(isset($_SESSION['datos'])) {
            header("Location: ../registro.php");
        }
    }

    
?>