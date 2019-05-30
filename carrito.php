<?php 

    session_start();
    include("php/conexion.php");

    if (isset($_SESSION['datos'])) {
        $id = $_SESSION['datos']['id'];
        $query = "SELECT * FROM carrito_compras WHERE id_usuario = '$id'";

        $consultaCarrito = $conexion->query($query);


        $ciudad = $_SESSION['datos']['ciudad'];
        $domicilio = $_SESSION['datos']['direccionUser'];
        $codigoPostal = $_SESSION['datos']['codigo_postal'];

    }

    $subtotal = 0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito de compras</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed" rel="stylesheet">

    <!-- Foonts -->
    <link rel="stylesheet" href="iconos/style.css">
    <link rel="stylesheet" href="iconos/envio/style.css">
    <link rel="stylesheet" href="iconos/icon-cerrar/style.css">

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
    <link href="https://fonts.googleapis.com/css?family=Gugi" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed" rel="stylesheet">

    <!--carrito de compras-->
    <link rel="stylesheet" href="css/carrito.css">
    
 
  
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
                <li><a href="login.html">Entrar</a></li>
                <li><a href="registrarse.html">Registrarse</a></li>
                <li><a href="contacto.html">Contacto</a></li>
                <li><a href=""></a></li>
            </ul>
        </nav>  
    </div>



    <!--Inicio del carrito de compras-->
        
        <table>
            <tr>
                <th>Producto</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Eliminar</th>
            </tr>
            <?php if (isset($_SESSION['datos'])) { 
                $id = $_SESSION['datos']['id'];
                $query = "SELECT * FROM carrito_compras WHERE id_usuario = '$id'";

                $consultaCarrito = $conexion->query($query); ?>

                <?php while ($datos = mysqli_fetch_array($consultaCarrito)) { ?>
                    <?php $producto = $datos['producto']; 
                    $queryProducto = "SELECT * FROM productos WHERE id_producto = '$producto'";
                    $consultaProducto = $conexion->query($queryProducto); 
                    $informacion = mysqli_fetch_array($consultaProducto); 
                    $operacion = $informacion['precioProducto'] * $datos['cantidad'];
                    $data = bcdiv($operacion, '1', 3);
                    $subtotal = $subtotal + $data; 
                       
                    ?>
                    
                    <tr>
                        <td><p><?php echo $informacion['nombreProducto'] ?></p></td>
                        <td><img src="<?php echo $informacion['imagenProducto'] ?>"></td>
                        <td><p>$ <?php echo $informacion['precioProducto'] ?></p></td>
                        <td><p><?php echo $datos['cantidad'] ?></p></td>
                        <td><p>$ <?php echo $data ?></p>
                        <td><button class="btn-delete"><a href="php/quitarProducto.php?id=<?php echo $datos['id_carrito'] ?>"><img src="imagenes/basura.png"></a></button></td>
                    </tr>

                <?php } ?>
            <?php } ?>
        </table>
        
        <div class="suptotal">
            <div class="pagos"><p>Formas de pago</p>
                <ul>
                    <li>Paypal  | </li>
                    <li>MasterCard  | </li>
                    <li>Efectivo  | </li>
                    <li>PSE</li>
                </ul>
            </div>
            <?php $subtotal = number_format($subtotal,'3', ',','.') ?>
            <div class="sup"><p>Suptotal : $ <input type="text" id="campoTotal" readonly="readonly" value="<?php echo $subtotal ?>"></p></div>
        </div>
        
        <div class="comya13">
            <a href="#" id="btn-comprar"><h5>¡Compra ahora!</h5></a>
        </div>

        <div class="continuarlin">
            <a href="catalogo.php"><h5>Continuar comprando</h5></a>
        </div>

    <!--fin del carrito de compras-->

    <!-- VENTANA EMERGENTE COMPRAR YA -->
        
    <div id="miModal" class="modal">
        <div class="flex" id="flex">
            <div class="contenido-modal">
                <div class="modal-header">
                    <span class="icon-cancel-circle" id="close-alert"></span>
                    <h2>INFORMACIÓN DE COMPRA</h2>
                </div>
                <div class="modal-body">
                    <form action="php/insertarCompra.php" method="POST">
                        <h3>Información de envío  <p class="precioTotal">Total a pagar: $ <?php echo $subtotal ?></p></h3>
                        <br>
                        <label for="">Ciudad: </label>
                        <input type="text" name="ciudad-envio" placeholder="Destino del producto" class="campo" value="<?php echo $ciudad ?>" required="">
                        <label for="" class="cod-postal">Código Postal:</label>
                        <input type="text" name="postal-envio" placeholder="Su código postal" class="campo" value="<?php echo $codigoPostal ?>" required=""><br>
                        <label for="">Dirección de residencia: </label>
                        <input type="text" name="direccion-envio" placeholder="Ingrese su dirección" class="campo-addres" value="<?php echo $domicilio ?>" required=""><br>

                        <?php 
                            date_default_timezone_set("America/Bogota");
                            
                            include("php/fechaEspañol.php");
                            $d = date("d") + 3;
                            $m = date("m");

                            $time = "$d-$m-2019";

                            $resultado = fechaEspañol($time);
                            
                        ?>
                        <br><br>
                        <p><span class="icon-airplane"></span><span class="tiempo">El envío llegará:</span><input type="text" name="fechaEntrega" readonly="readonly" value="<?php echo $resultado ?>" class="inputFecha"></p>

                        <div class="linea-separadora"></div>
                        <h3>Método de pago</h3>
                        <ul>
                            <li><input type="radio" name="metodo-pago" value="mastercard" checked=""><img src="imagenes/mastercard.png"></li>
                            <li><input type="radio" name="metodo-pago" value="paypal"><img src="imagenes/paypal.png"></li>
                            <li><input type="radio" name="metodo-pago" value="visa"><img src="imagenes/visa.png"></li>
                            <li><input type="radio" name="metodo-pago" value="bitcoin"><img src="imagenes/bitcoin.png"></li>
                            <li><input type="radio" name="metodo-pago" value="payment"><img src="imagenes/payment.png"></li>
                        </ul>
                        <input type="submit" value="COMPRAR">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN VENTANA EMERGENTE -->

<!--Footer-->
    <footer>
        <div class="contenedor">
            <div class="cont-body">                
                <div class="columna1">    
                    <div class="suscripcionfooter">
                        <h1> Entérate de nuevos eventos</h1>
                        <input type="email" name="emailUser" id="suscribefooter" placeholder="Correo electrónico" required="">                            <input type="submit" id="submitfooter" name="" value="Suscríbete">
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
    <script src="js/ventanaComprar.js"></script>
    <script src="js/aparecerIcono.js"></script>
</body>
</html>