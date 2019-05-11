<?php 

    session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organic Life</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed" rel="stylesheet">

    <!-- Foonts -->
    <link rel="stylesheet" href="iconos/style.css">

    <!-- Slider -->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
    <link rel="stylesheet" type="text/css" href="css/nivo-slider.css">
    <link rel="stylesheet" type="text/css" href="css/mi-slider.css">
    <script type="text/javascript"> 
        $(window).on('load', function() {
            $('#slider').nivoSlider(); 
        }); 
    </script>
</head>
<body>
    <header id="cabecera">
        <img src="imagenes/logo.png" class="img-logo">
        <h1 class="logo">Organic Life</h1>
        <img src="img/menu.png" class="icon-menu" id="boton-menu">
        <nav>
            <ul>
                <?php 
                    if (empty($_SESSION['datos'])) { ?>
                     
                    <li><a href="login.php?url=<?php echo $_SERVER["REQUEST_URI"]?>">Entrar</a></li>
                    <li><a href="registrarse.html">Registrarse</a></li>
                    <li><a href="contacto.html">Contacto</a></li>
                    <li><a href=""><span class="icon-search"></span></a></li>
                    
                <?php }else { ?>
                <li><a href="contacto.html">Contacto</a></li>
                <li><a href=""><span class="icon-search"></span></a></li>
                <li class="li-perfilUsuario">
                    <img src="imagenes/usuario.png" class="img-usuario" id="img-perfil">
                </li>

                <?php } ?>
            </ul>
        </nav>
    </header>
    <div class="sub-menu">
        <ul class="lista-submenu">
            <li><a href="catalogo.php">Catálogo</a></li>
            <li><a href="">OrganicLife</a></li>
            <li><a href="">Blog</a></li>
            <ul class="subMenu-usuario" id="submenu-perfil">
                <li><a href="php/validarUsuario.php">Perfil</a></li>
                <li><a href="php/cerrar.php">Cerrar sesión</a></li>
            </ul>
            <span class="icon-cart"></span>
        </ul>
    </div>  
    <div class="menu-lateralResponsive" id="menu-responsive">
        <nav class="nav-responsive">
            <ul>
                <li><a href="login.php?url=index.html">Entrar</a></li>
                <li><a href="registrarse.html">Registrarse</a></li>
                <li><a href="contacto.html">Contacto</a></li>
                <li><a href=""><span class="icon-cart"></span></a></li>
            </ul>
        </nav>  
    </div>

    <div class="container-inicio">
        <div class="slider-wrapper theme-mi-slider">
            <div id="slider" class="nivoSlider">     
                <img src="img-slider/slider1.png">
                <img src="img-slider/slider2.jpg">
                <img src="img-slider/slider3.jpg">
                <img src="img-slider/slider3.jpg">
            </div> 
        </div>
    </div>


    <div class="productos">

            <div class="frutas"><br> <h2> Frutas </h2>
                <br>
                <p> Como empresa de frutas especializada, importamos frutas de la más alta calidad desde países como Brasil, Perú, Chile, Argentina, Costa Rica y Colombia entre otros. </p>
                <button type="button" class="btn">VER SELECCIÓN</button>
            </div>
            <div class="verduras"><br> <h2> Verduras </h2>
                <br>
                <p> Verduras de excelente calidad gracias a la red de agricultores y proveedores con los que contamos a lo largo de todo el territorio nacional. </p>
                <button type="button" class="btn">VER SELECCIÓN</button>
            </div>
        </div>


    <!--Footer-->
    <footer>
        <div class="contenedor">
            <div class="cont-body">                
                <div class="columna1">    
                    <h1> Entérate de nuevos eventos</h1>
                    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="text" placeholder="correo electrónico">
                            <button class="btn btn-secondary my-2 my-sm-0" type="submit">SUSCRÍBETE</button>
                            </form>
                        </nav>
                    </div>
                    <div class="columna2">
            
                        <h1> Nuestras Redes Sociales </h1>
                        <div class="fila">
                            <img src="imagenes/facebook.png">
                            <label> Síguenos en Facebook</label>
                        </div> 
    
                        <div class="fila">
                            <img src="imagenes/google.png">
                            <label> Síguenos en Google+</label>
                        </div>
            
                        <div class="fila">
                            <img src="imagenes/twitter.png">
                            <label> Síguenos en Twitter</label>
                        </div>
                    </div>
            
                    <div class="columna3">
            
                        <h1> Cambiar Idioma </h1>
                        <div class="fila-columna3">
                        <fieldset>
                            <div class="form-group">
                                <select class="custom-select">
                                    <option selected="">Español</option>
                                    <option value="1">Inglés</option>
                                    <option value="2">Portugés</option>
                                </select>
                            </div>
                        </fieldset> 
                    </div>  
                </div>
            </div>
            <div class="cont-footer">
                <div class="alineacion">
                <div class="copyright">
                    © 2019 Todos los derechos reservados | Diseñado por <a href="index.html"> OrganicLife </a>
                </div>
            
                <div class="nosotros">
                    <a href=""> Preguntas Frecuentes |</a>
                    <a href=""> Términos y condiciones </a>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="js/menu.js"></script>
    <script src="js/aparecerIcono.js"></script>
</body>
</html>