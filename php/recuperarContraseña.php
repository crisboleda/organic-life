<?php 

    include("conexion.php");
    session_start();

    $correo = $_POST['correoRecuperacion'];

    $verificar = "SELECT * FROM usuario WHERE correoUser = '$correo'";
    $resultado = mysqli_query($conexion, $verificar);

    if (mysqli_num_rows($resultado) >= 1) {
        $datos = mysqli_fetch_array($resultado);
        $id = $datos['id'];

        $asunto = "Recuperación de contraseña";
        $mensaje = "https://organic_life.com/recuperar.php?id=$id";

        mail($correo, $asunto, $mensaje);

        header("Location: ../login.php");

    }else {
        $_SESSION['noExisteEmail'] = "Este correo no se encuentra registrado";
        header("Location: ../login.php");
    }

?>