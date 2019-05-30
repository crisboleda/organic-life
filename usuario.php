<?php 

    include("php/conexion.php");
    session_start();

    if (isset($_SESSION['datos'])) {
        $id = $_SESSION['datos']['id'];

        $query = "SELECT * FROM usuario WHERE id = '$id'";
        $resultado = mysqli_query($conexion, $query);

        $datos = mysqli_fetch_array($resultado);
        $_SESSION['datos'] = $datos;

        $nombre = $_SESSION['datos']['nombreUser'];
        $apellido = $_SESSION['datos']['apellidoUser'];
        $correo = $_SESSION['datos']['correoUser'];
        $domicilio = $_SESSION['datos']['direccionUser'];
        $codigoPostal = $_SESSION['datos']['codigo_postal'];
        $ciudad = $_SESSION['datos']['ciudad'];
        $telefono = $_SESSION['datos']['telefono'];

        $ultimoCierre = $_SESSION['datos']['ultima_sesion'];
        $ultimoCierre = date("d-m-o  h:i .a",strtotime($ultimoCierre));
        
    }else {
        header("Location: index.php");
    }

    if (!isset($_GET['url'])) {
        header("Location: usuario.php?url=perfil-user");
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

    <link rel="stylesheet" href="iconos/icon-cerrar/style.css">
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
            <li><a href="organiclife.php">OrganicLife</a></li>
            <li><a href="blog.php">Blog</a></li>
        </ul>
    </div>  
    <div class="menu-lateralResponsive" id="menu-responsive">
        <nav class="nav-responsive">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href=""><span class="icon-cart"></span></a></li>
                <li><a href="catagolo.php">Catálogo</a></li>
                <li><a href="organiclife.php">OrganicLife</a></li>
                <li><a href="blog.php">Blog</a></li>
            </ul>
        </nav>  
    </div>

    <div class="container">
        <div class="contenido">
            <div id="" class="opcionMenu">
                <h2>Ingresar nuevo producto</h2>
                <form action="php/insertarProducto.php" method="POST" enctype="multipart/form-data">
                    <label for="nombre">Nombre del producto:</label><br>
                    <input type="text" id="nombre" name="nombre-producto" >
                    <br><br>
                    <label for="img">Imagen del producto:</label><br>
                    <input type="file" id="img" name="imagen">
                    <br><br>
                    <label for="descripcion">Descripción del producto:</label><br>
                    <textarea name="descrip-producto" id=""></textarea>
                    <br><br>
                    <label for="gramos">Peso/cantidad</label><br>
                    <input type="text" id="gramos" name="gramos-producto">
                    <br><br>
                    <label for="precio">Precio del producto:</label><br>
                    <input type="text" id="precio" name="precio-producto">
                    <br><br>
                    <label for="tipo">Tipo de producto:</label><br>
                    <input type="radio" name="tipo-producto" value="fruta">Fruta
                    <input type="radio" name="tipo-producto" value="verdura">Verdura
                    <br><br>
                    <input type="submit" value="Guardar">
                
                </form>
            </div>

            <div id="update" class="opcionMenu">
                <h2>Actualizar datos</h2>
                <form action="php/updateDatos.php" method="POST">
                    <label for="nombreAdmin">Nombre:</label><br>
                    <input type="text" id="nombreAdmin" name="nombre-user" value="<?php echo $nombre ?>">
                    <br><br>
                    <label for="apellidoAdmin">Apellido:</label><br>
                    <input type="text" id="apellidoAdmin" name="apellido-user" value="<?php echo $apellido ?>">
                    <br><br>
                    <label for="emailAdmin">Correo electrónico:</label><br>
                    <input type="email" id="emailAdmin" name="correo-user" value="<?php echo $correo ?>">
                    <br><br>
                    <label for="domicilio">Dirección domicilio:</label><br>
                    <input type="text" id="domicilio" name="direccion-user" value="<?php echo $domicilio ?>">
                    <br><br>
                    <label for="postal">Código postal:</label><br>
                    <input type="text" id="postal" name="cod_postal" value="<?php echo $codigoPostal ?>">
                    <br><br>
                    <label for="ciudad">Ciudad:</label><br>
                    <input type="text" id="ciudad" name="ciudad-user" value="<?php echo $ciudad ?>">
                    <br><br>
                    <label for="telefono">Telefono/Celular:</label><br>
                    <input type="text" id="telefono" name="telefono-user" value="<?php echo $telefono ?>">
                    <br><br>
                    <input type="submit" value="Actualizar datos">
                </form>
            </div>

            <div id="compras" class="opcionMenu">
                <h2 class="title-misCompras">Mis compras</h2>
                <table class="table-compras">
                <tr>
                    <th>Nombre producto</th>
                    <th>Imagen</th>
                    <th>Cantidad</th>
                    <th>Fecha de compra</th>
                    <th>Total</th>
                    <th>Metodo de pago</th>
                    <th>Detalles</th>
                </tr>
                <?php 
                    $compras = "SELECT * FROM compras WHERE id_cliente = '$id'";
                    $consulta = mysqli_query($conexion, $compras); ?>
                    
                <?php while ($articulos = mysqli_fetch_array($consulta)) { ?>
                    <?php
                        $idProducto = $articulos['id_producto'];
                        $querySelector = "SELECT * FROM productos WHERE id_producto = '$idProducto'";
                        $resultadoProducto = mysqli_query($conexion, $querySelector);
                        $infoProducto = mysqli_fetch_array($resultadoProducto);

                        $nombreProducto = $infoProducto['nombreProducto'];
                        $img = $infoProducto['imagenProducto'];
                        $cantidad = $articulos['cantidad'];
                        $fecha = $articulos['fecha_compra'];
                        $hora = date("h:i .a", strtotime($fecha));
                        $fecha = date("d-m-o",strtotime($fecha));
                        $precio = $articulos['precio'];
                        $total = $cantidad * $precio;
                        $total = bcdiv($total, '1', 3);
                        $metodoPago = $articulos['metodo_pago'];
                    ?>
                    <tr>
                        <td><p><?php echo $nombreProducto ?></p></td>
                        <td class="img-product"><img src="<?php echo $img ?>"></td>
                        <td><p><?php echo $cantidad ?></p></td>
                        <td><p><?php echo $fecha ?><br><?php echo $hora ?></p></td>
                        <td><p>$ <?php echo $total ?></p></td>
                        <td class="metodo"><p><?php echo $metodoPago ?></p><img src="imagenes/<?php echo $metodoPago ?>.png"></td>
                        <td><a class="href-detalles" href="?url=compras&detalles_id=<?php echo $articulos['id_compra'] ?>">Ver detalles</a></td>
                    </tr>
                <?php } ?>
                </table>
            </div>
        
            <div id="perfil-user" class="opcionMenu">
                <div class="sub-contenido">
                    <img src="imagenes/user-perfil.png" alt="">
                    <p><?php echo $nombre ?> <?php echo $apellido ?></p>
                    <p>Usuario</p>
                </div>
                <?php 
                    $cantidadCompras = "SELECT * FROM compras WHERE id_cliente = '$id'";
                    $buscar = mysqli_query($conexion, $cantidadCompras);
                    $totalCompras = mysqli_num_rows($buscar);
                ?>
                <div class="info-perfil">
                    <div class="info-box">
                        <p>Total de compras:  <span><?php echo $totalCompras ?></span></p>
                    </div>
                    <div class="info-box">
                        <p>Ultimo cierre de sesión: <span><?php echo $ultimoCierre ?></span></p>
                    </div>
                    <div class="info-box">
                        <p>Mi correo de contacto:  <span><?php echo $correo ?></span></p>
                    </div>
                </div>
            </div>

        </div>
        <div class="menu-usuario">
            <ul>
                <li><a href="usuario.php?url=perfil-user">Tu perfil</a></li>
                <li><a href="carrito.php">Carrito de compras</a></li>
                <li><a href="usuario.php?url=update">Actualizar datos</a></li>
                <li><a href="usuario.php?url=compras">Historial de compras</a></li>
                <li><a href="#">Configuración</a></li>
            </ul>
        </div>
    </div>

    <!-- VENTANA EMERGENTE DETALLES COMPRA-->
    <?php 
        if(isset($_GET['detalles_id'])) {
            $id_compra = $_GET['detalles_id'];
        }else {
            $id_compra = NULL;
        }

        $infoCompra = "SELECT * FROM compras WHERE id_compra = '$id_compra'";
        $compra = mysqli_query($conexion, $infoCompra);
        $propiedades = mysqli_fetch_array($compra);

        $fecha = $propiedades['fecha_compra'];
        $fecha = date("d-m-o", strtotime($fecha));
        $fecha_entrega = $propiedades['fecha_entrega'];
        $ciudad = $propiedades['ciudad'];
        $codPostal = $propiedades['codigo_postal'];
        $direcEnvio = $propiedades['domicilio'];
        $pago = $propiedades['metodo_pago'];

    ?>
    <?php if (isset($_GET['detalles_id'])) { ?>

        <div id="miModal" class="modal">
            <div class="flex" id="flex">
                <div class="contenido-modal">
                    <div class="modal-header">
                        <span class="icon-cancel-circle" id="close-alert"></span>
                        <h2>Detalles de envío</h2>
                    </div>
                    <div class="modal-body">
                        <p><b>Fecha de compra:</b> <?php echo $fecha ?></p>
                        <p><b>Destino del producto: </b><?php echo $ciudad ?></p>
                        <p><b>Código postal: </b><?php echo $codPostal ?></p>
                        <p><b>Dirección de envio: </b><?php echo $direcEnvio ?></p>
                        <p><b>Fecha de entrega: </b><?php echo $fecha_entrega ?></p>
                        <p><b>Método de pago: </b><?php echo $pago ?><span class="img-pago"><img src="imagenes/<?php echo $pago ?>.png"></span></p>
                        <p><b>Estado de pago: </b><span class="estado">¡Satisfactorio!</span></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- FIN VENTANA EMERGENTE -->
    <!--Footer-->
    <!--<footer>
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
    </footer>-->
    <script src="js/urlActual.js"></script>
    <script src="js/cerrarDetalles.js"></script>
</body>
</html>