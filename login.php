<?php

    session_start();

    if (isset($_GET['url'])) {
        $url= $_GET['url'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catálogo | OrganicLife</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed" rel="stylesheet">

    <link rel="stylesheet" href="iconos/icon-cerrar/style.css">
    <link rel="stylesheet" href="iconos/style.css">
</head>
<body>
    <header id="cabecera">
        <img src="imagenes/logo.png" class="img-logo">
        <h1 class="logo"> <a href="index.html" > OrganicLife </a></h1>
        <img src="img/menu.png" class="icon-menu" id="boton-menu">
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href=""><span class="icon-search"></span></a></li>
            </ul>
        </nav>
    </header>  
    <div class="menu-lateralResponsive" id="menu-responsive">
        <nav class="nav-responsive">
            <ul>
                <li><a href="login.html">Entrar</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href=""><span class="icon-cart"></span></a></li>
            </ul>
        </nav>  
    </div>

    <?php if (isset($_SESSION['loginCarrito'])) { ?>
        <div class="inicia_primero" id="ventana-emergente">
            <?php echo $_SESSION['loginCarrito']; ?>
            <span class="icon-cancel-circle" id="close-alert"></span>
        </div>
    <?php session_unset(); } ?>
    <?php 
        if (isset($_SESSION['mensaje'])) { ?>
            <div class="inicia_primero" id="ventana-emergente">
                <?php echo $_SESSION['mensaje']; ?>
                    <span class="icon-cancel-circle" id="close-alert"></span>
            </div>      
    <?php session_unset(); } ?>

    <form action="php/ingresar.php" method="POST" autocomplete="off">
        <div class="container">
            <h2>Inicia sesión<br>con tu red social</h2>
            <div class="redes">
                <img src="imagenes/google.png">
                <img src="imagenes/facebook.png">
                <img src="imagenes/twitter.png">
            </div>
            <div class="container2">
    		    <label for="nameUser"><p>Correo Electronico:</p></label>
                <input type="email" name="emailUser" id="nameUser" placeholder="Correo electrónico" required=""> <br>
                <label for="contraseñaUser"> <p>Contraseña:</p></label>
                <div class="container con_password">
                    <input type="password" name="clave" id="contraseñaUser" placeholder="Introduce tu contraseña" required="">
                </div>
                <p><a href="">¿Olvidaste tu contraseña?</a> </p>
                <div class="container-boton">
                    <input type="submit" name="" value="Iniciar sesión">
                </div>
            </div>
            <h4>¿No tienes cuenta?</h4> <a href="registro.php"> Regístrate aquí</a> 
            
        </div>
    </form>
    <script src="js/ver_clave.js"></script>
    <script src="js/cerrarVentanita.js"></script>
</body>
</html>