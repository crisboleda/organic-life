<?php

    session_start();
    sleep(2);

    if (isset($_SESSION['datos'])) {
        header("Location: index.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catálogo | OrganicLife</title>
    <link rel="stylesheet" href="css/registro.css">
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed" rel="stylesheet">

    <link rel="stylesheet" href="iconos/style.css">
    <link rel="stylesheet" href="iconos/icon-cerrar/style.css">
</head>
<body>
    <header id="cabecera">
        <img src="imagenes/logo.png" class="img-logo">
        <h1 class="logo"> <a href="index.html" > OrganicLife </a></h1>
        <img src="img/menu.png" class="icon-menu" id="boton-menu">
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="contacto.html">Contacto</a></li>
                <li><a href=""><span class="icon-search"></span></a></li>
            </ul>
        </nav>
    </header>  
    <div class="menu-lateralResponsive" id="menu-responsive">
        <nav class="nav-responsive">
            <ul>
                <li><a href="login.html">Entrar</a></li>
                <li><a href="contacto.html">Contacto</a></li>
                <li><a href=""><span class="icon-cart"></span></a></li>
            </ul>
        </nav>  
    </div>
    <?php if (isset($_SESSION['Error'])) { ?>
        <div class="algun_error" id="ventana-emergente">
            <?php echo $_SESSION['Error']; ?>
            <span class="icon-cancel-circle" id="close-alert"></span>
        </div>  
    <?php session_unset(); } ?>
    <form action="php/insertarUser.php" method="POST" autocomplete="off">
        <div class="container">
            <h2>Regístrate<br>con tu red social</h2>
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
                    <img src="img/eye.png" alt="" class="img-contraseña" id="mostrar">
                    <img src="img/hide.png" alt="" class="img-contraseña" id="no-ver">
                    <input type="password" name="clave" id="contraseñaUser" placeholder="Introduce tu contraseña" required="">
                </div>
                <label for="contraseñaUser"><p>Confirmar contraseña:</p></label>
                <div class="confirmar con_password">
                    <img src="img/eye.png" alt="" class="img-contraseña" id="mostrar">
                    <img src="img/hide.png" alt="" class="img-contraseña" id="no-ver">
                    <input type="password" name="claveConfirm" id="contraseñaUser" placeholder="Confirma tu contraseña" required="">
                </div>
                <div class="container-boton">
                    <input type="submit" name="" value="Regístrate">
                </div>
            
            </div>
            <h4>¿Ya estás registrado?</h4> <a href="login.php"> Inicia sesión</a> 
            <br> <br> <br>
        </div>
    </form>
    <script src="js/ver_clave.js"></script>
    <script src="js/cerrarVentanita.js"></script>
</body>
</html>