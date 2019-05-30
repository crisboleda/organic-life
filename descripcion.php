<?php 


    include("php/conexion.php");
    session_start();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM productos WHERE id_producto = '$id'";

        $resultado = $conexion->query($query);

        $columna = mysqli_fetch_array($resultado);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Descripcion</title>
    <link rel="stylesheet" href="css/bootstrap.css">
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

    <!--footer-->
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Foonts -->
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed" rel="stylesheet">


    <!--descripcion-->
    <link rel="stylesheet" href="css/descripcion.css">
    <link rel="stylesheet" href="mis_estilos_ms/_bootswatch.scss">
    <link rel="stylesheet" href="mis_estilos_ms/_variables.scss">
    <link rel="stylesheet" href="mis_estilos_ms/bootstrap.css">
  
</head>
<body>
    <header id="cabecera">
        <img src="imagenes/logo.png" class="img-logo">
        <h1 class="logo">Organic Life</h1>
        <img src="imagenes/menu.png" class="icon-menu" id="boton-menu">
        <nav>
            <div class="container-buscador" id="contenido">
                <form action="php/buscar.php?url=<?php echo $_SERVER["REQUEST_URI"] ?>" method="POST">
                    <input type="text" id="campoBuscar" placeholder="Buscar..." name="productoBuscar">
                    <span class="icon-search"></span>
                </form>
            </div>
            <ul id="lista-principal">
            <?php 
                    if (empty($_SESSION['datos'])) { ?>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="login.php?url=<?php echo $_SERVER["REQUEST_URI"]?>">Entrar</a></li>
                    <li><a href="registro.php">Registrarse</a></li>
                    <li><a href="contacto.php">Contacto</a></li>
                    <li><span class="icon-search" id="buscador"></span></li>
                    
                <?php }else { ?>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><span class="icon-search" id="buscador"></span></li>
                <li class="li-perfilUsuario">
                    <img src="imagenes/usuario.png" class="img-usuario" id="img-perfil">
                </li>

                <?php } ?>
            </ul>
            <?php if (isset($_SESSION['objetoNoEncontrado'])) { ?>
                <h3 class="errorBusqueda" id="messageError"><?php echo $_SESSION['objetoNoEncontrado'] ?></h3>
            <?php unset($_SESSION['objetoNoEncontrado']); } ?>
        </nav>  
    </header>
    <div class="menu-lateralResponsive" id="menu-responsive">
        <nav class="nav-responsive">
            <ul>
                <li><a href="login.php">Entrar</a></li>
                <li><a href="registro.php">Registrarse</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href=""></a></li>
            </ul>
        </nav>  
    </div>

    <div class="descripcion">
        <div class="des1234">
            <div id="imgdescripcion">
                <img src="<?php echo $columna['imagenProducto'] ?>" style="width: 48%; height:100%;" alt="">
            </div>
            <div class="datos12">
                <h3><?php echo $columna['nombreProducto'] ?></h3>
                <h5>Precio : $ <?php echo $columna['precioProducto'] ?></h5>
                <form action="php/añadirAlCarrito.php?id=<?php echo $columna['id_producto'] ?>" method="POST">
                    <div class="posicion123">
                        <div class="boton123" id="menos"><a>-</a></div>    
                    
                        <input type="number" class="cantidad12" id="cantidad" name="cantidadTotal" value="1" min="1" max="1000">
                    
                        <div class="boton123" id="mas"><a>+</a></div>
                    </div>  
                

                <div class="añadir12">
                    <input type="submit" value="Añadir al carrito"><a href=""></a>
                </div>
                </form>
            </div>
            
            <div class="valoracion">
                
            </div>
        </div> 
      
    </div>
    <div class="des123">
        <div class="descipcion_producto">
            <div class="des1">
                <h5>Descripción del producto</h5>
                <p><?php echo $columna['descripcionProducto'] ?></p>
            </div>
            
        </div>
    </div> 
    <div>
        <div class="rank">
                    <div class="espacio12">
                        <h4>Valoraciones</h4>
                    </div>
                    <div class="progress">
                        <h6>reputación</h6>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">70%</div>
                    </div>
                    <div class="progress">
                        <h6>Brinda buena atencion</h6>
                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                    </div>
                    <div class="progress">
                        <h6>Entrega a tiempo</h6>
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                    </div>
                    
        </div>
    </div>
    <!--fin de la descripcion-->

    <!--Footer-->
    <footer>
        <div class="contenedor">
            <div class="cont-body">                
                <div class="columna1">    
                    <div class="suscripcionfooter">
                        <h1> Entérate de nuevos eventos</h1>
                        <input type="email" name="emailUser" id="suscribefooter" placeholder="Correo electrónico" required="">
                        <input type="submit" id="submitfooter" name="" value="Suscríbete">
                    </div>
                </div>
                <div class="columna2">
            
                    <h1> Nuestras Redes Sociales </h1>
                    <div class="fila">
                        <img src="imagenes/facebook1.png">
                        <label> Síguenos en Facebook</label>
                    </div> 

                    <div class="fila">
                        <img src="imagenes/google1.png">
                        <label> Síguenos en Google+</label>
                    </div>
            
                    <div class="fila">
                        <img src="imagenes/twitter1.png">
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
            <br><div class="cont-footer">
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
    <script src="js/buscar.js"></script>
    <script src="js/cantidad.js"></script>
    <script src="js/aparecerIcono.js"></script>
</body>
</html>