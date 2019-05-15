<?php 

    session_start();

    if (isset($_SESSION['datos'])) {
        
    }else {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/usuario.css">
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed" rel="stylesheet">
    <title>Usuario</title>
</head>
<body>
    <header id="cabecera">
        <img src="imagenes/logo.png" class="img-logo">
        <h1 class="logo">Organic Life</h1>
        <img src="imagenes/menu.png" class="icon-menu" id="boton-menu">
        <nav>
            <a href="php/cerrar.php" class="boton">Cerrar sesión</a>
            <ul class="lista-ul">  
                <li class="li-left"><a href="index.php" class="inicio">Inicio</a></li>
                <li><a href="#" class="icono-usuario"><img src="imagenes/favoritos.png" alt=""></a></li>
                <li><a href="#" class="icono-usuario"><img src="imagenes/notificacion.png" alt=""></a></li>
                <li><a href="#" class="icono-usuario"><img src="imagenes/perfil.png" alt=""></a></li>
            </ul>
        </nav>
    </header>
    <div class="sub-menu">
        <span class="icon-cart"></span>
        <ul class="lista-submenu">
            <li><a href="catalogo.php">Catálogo</a></li>
            <li><a href="organiclife.html">OrganicLife</a></li>
            <li><a href="blog.html">Blog</a></li>
        </ul>
    </div>  
    <div class="menu-lateralResponsive" id="menu-responsive">
        <nav class="nav-responsive">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href=""><span class="icon-cart"></span></a></li>
                <li><a href="catagolo.php">Catálogo</a></li>
                <li><a href="organiclife.php">OrganicLife</a></li>
                <li><a href="blog.html">Blog</a></li>
            </ul>
        </nav>  
    </div>

    <div class="menu-usuario">
        <ul>
            <li><a href="#">Tu perfil</a></li>
            <li><a href="carrito.php">Carrito de compras</a></li>
            <li><a href="#">Actualizar datos</a></li>
            <li><a href="#">Historial de pedidos</a></li>
            <li><a href="#">Historial de compras</a></li>
            <li><a href="#">Configuración</a></li>
        </ul>
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

</body>
</html>