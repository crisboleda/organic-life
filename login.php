<?php
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
    <form action="php/ingresar.php?url=<?php echo $url ?>" method="POST" autocomplete="off">
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
                    <img src="img/eye.png" alt="" class="img-contraseña" id="mostrar">
                    <img src="img/hide.png" alt="" class="img-contraseña" id="no-ver">
                    <input type="password" name="clave" id="contraseñaUser" placeholder="Introduce tu contraseña" required="">
                </div>
                    <p><a href="">¿Olvidaste tu contraseña?</a> </p>
                <div class="container-boton">
                    <input type="submit" name="" value="Iniciar sesión">
                </div>
            </div>
            <h4>¿No tienes cuenta?</h4> <a href="registrarse.html"> Regístrate aquí</a> 
            
        </div>
    </form>
    <script src="js/ver_clave.js"></script>
</body>
</html>