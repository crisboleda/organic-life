<?php

    session_start();
    include("php/conexion.php");

    if(isset($_SESSION['datos'])){
        $usuario = $_SESSION['datos']['rango'];
        $admitido = "admin";
        if ($usuario == $admitido) {
            // Si es admin
        }else {
            header("Location: index.php");
        }
    }else {
        header("Location: index.php");
    }

    if (isset($_GET['id']) and isset($_GET['url'])) {

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/administrador.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed" rel="stylesheet">
    <title>Administrador</title>

    <link rel="stylesheet" href="iconos/icon-cerrar/style.css">
</head>
<body>
    <header id="cabecera">
        <img src="imagenes/logo.png" class="img-logo">
        <h1 class="logo">Organic Life</h1>
        <img src="imagenes/menu.png" class="icon-menu" id="boton-menu">
        <nav>
            <ul class="lista-ul">  
                <li class=""><a href="index.php" class="inicio">Inicio</a></li>
                <li><a href="#" class="icono-usuario"><img src="imagenes/notificacion.png" alt=""></a></li>
                <li><a href="#" class="icono-usuario li-left"><img src="imagenes/perfil.png" alt=""></a></li>
                <li><a href="php/cerrar.php" class="boton">Cerrar sesión</a></li>
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
                <li><a href="catalogo.php">Catálogo</a></li>
                <li><a href="organiclife.php">OrganicLife</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="php/cerrar.php" class="boton">Cerrar sesión</a></li>
                <li><a href=""><span class="icon-cart"></span></a></li>
            </ul>
        </nav>  
    </div>
    <?php if (isset($_GET['id_producto'])) { ?>
        
    <div id="miModal" class="modal">
		<div class="flex" id="flex">
			<div class="contenido-modal">
				<div class="modal-header">
                    <span class="icon-cancel-circle" id="close-alert"></span>
					<h2>Editar producto</h2>
				</div>
				<div class="modal-body">
                    <?php 
                        $identificacion = $_GET['id_producto'];
                        $editProducto = "SELECT * FROM productos WHERE id_producto = '$identificacion'";
                        $consult = $conexion->query($editProducto); 
                        $info = mysqli_fetch_array($consult);
                    ?>
                    <form action="php/updateProducto.php?id=<?php echo $identificacion ?>" method="POST">
                    <label for="nombre">Nombre del producto:</label><br>
                    <input type="text" id="nombre" name="nombre-producto" value="<?php echo $info['nombreProducto']?>">
                    <br><br>
                    <label for="descripcion">Descripción del producto:</label><br>
                    <textarea name="descrip-producto" id="" cols="50" rows="10"><?php echo $info['descripcionProducto']?></textarea>
                    <br><br>
                    <label for="gramos">Peso/cantidad</label><br>
                    <input type="text" id="gramos" name="gramos-producto" value="<?php echo $info['gramosProducto']?>">
                    <br><br>
                    <label for="precio">Precio del producto:</label><br>
                    <input type="text" id="precio" name="precio-producto" value="<?php echo $info['precioProducto']?>">
                    <br><br>
                    <label for="tipo">Tipo de producto:</label><br>
                    <?php if ($info['tipo'] == "fruta") { ?>
                        <input type="radio" name="tipo-producto" value="fruta" checked="">Fruta
                        <input type="radio" name="tipo-producto" value="verdura">Verdura
                    <?php }else { ?>
                        <input type="radio" name="tipo-producto" value="fruta">Fruta
                        <input type="radio" name="tipo-producto" value="fruta" checked="">Verdura
                    <?php } ?>
                    <br><br>
                    <input type="submit" value="Actualizar información">
                    </form>
				</div>
			</div>
		</div>
	</div>
    <?php } ?>

    <div class="container">

        <div class="contenido">
            <div id="nuevoProducto" class="opcionMenu">
                <h2>Ingresar nuevo producto</h2>
                <form action="php/insertarProducto.php" method="POST" enctype="multipart/form-data">
                    <label for="nombre">Nombre del producto:</label><br>
                    <input type="text" id="nombre" name="nombre-producto">
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

            <div id="nuevoAdmin" class="opcionMenu">
                <h2>Agregar un nuevo Administrador</h2>
                <form action="php/insertarNewAdmin.php" method="POST">
                    <label for="nombreAdmin">Nombre:</label><br>
                    <input type="text" id="nombreAdmin" name="nombre-admin">
                    <br><br>
                    <label for="apellidoAdmin">Apellido:</label><br>
                    <input type="text" id="apellidoAdmin" name="apellido-admin">
                    <br><br>
                    <label for="emailAdmin">Correo electrónico:</label><br>
                    <input type="email" id="emailAdmin" name="correo-admin">
                    <br><br>
                    <label for="password">Contraseña:</label><br>
                    <input type="password" id="password" name="clave-admin">
                    <br><br>
                    <label for="domicilio">Dirección domicilio:</label><br>
                    <input type="text" id="domicilio" name="direccion-admin">
                    <br><br>
                    <label for="ciudad">Ciudad:</label><br>
                    <input type="text" id="ciudad" name="ciudad-admin">
                    <br><br>
                    <label for="telefono">Telefono/Celular:</label><br>
                    <input type="text" id="telefono" name="telefono-admin">
                    <br><br>
                    <input type="submit" value="Agregar como administrador">
                </form>
            </div>

            <div id="listaUsuarios" class="opcionMenu">
                <table id="table">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo electrónico</th>
                        <th>Domicilio</th>
                        <th>Ciudad residencia</th>
                        <th>Telefono</th>
                        <th>Rango</th>
                        <th>Eliminar</th>
                    </tr>
                    <?php
                        $consultaUser = "SELECT * FROM usuario";
                        $resultadoUser = $conexion->query($consultaUser);

                        while ($datos = mysqli_fetch_array($resultadoUser)){?>
                        <tr>
                            <td><p><?php echo $datos['id'] ?></p></td>
                            <td><p><?php echo $datos['nombreUser']?></p></td>
                            <td><p><?php echo $datos['apellidoUser']?></p></td>
                            <td><p><?php echo $datos['correoUser'] ?></p></td>
                            <td><p><?php echo $datos['direccionUser'] ?></p></td>
                            <td><p><?php echo $datos['ciudad'] ?></p></td>
                            <td><p><?php echo $datos['telefono'] ?></td>
                            <td><p><?php echo $datos['rango']?></p></td>
                            <td><button><a href="php/deleteUser.php?id=<?php echo $datos['id'] ?>"><img src="imagenes/basura.png"></a></button></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div id="listaProductos" class="opcionMenu">
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Descripción</th>
                        <th>Peso/cantidad</th>
                        <th>Precio</th>
                        <th>Tipo</th>
                        <th>Eliminar</th>
                        <th>Editar</th>
                    </tr>
                    <?php
                        $query = "SELECT * FROM productos";
                        $resultado = $conexion->query($query);

                        while ($columna = mysqli_fetch_array($resultado)){?>
                        <tr>
                            <td><h2><?php echo $columna['id_producto'] ?></td>
                            <td><h2><?php echo $columna['nombreProducto']?></h2></td>
                            <td class="table-img"><img src="<?php echo $columna['imagenProducto'] ?>"></td>
                            <td><p><?php echo $columna['descripcionProducto']?></p></td>
                            <td><p><?php echo $columna['gramosProducto'] ?></p></td>
                            <td><h3><?php echo $columna['precioProducto'] ?></h3></td>
                            <td><p><?php echo $columna['tipo'] ?></p></td>
                            <td><button><a href="php/deleteproducto.php?id=<?php echo $columna['id_producto'] ?>"><img src="imagenes/basura.png"></a></button></td>
                            <td><button class="modalEdit"><a href="administrador.php?url=listaProductos&id_producto=<?php echo $columna['id_producto'] ?>"><img src="imagenes/edit.png"></a></button></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div id="listaVentas" class="opcionMenu">
                <?php 
                    $consultaCompras = "SELECT * FROM compras";
                    $ventas = mysqli_query($conexion, $consultaCompras);
                ?>  
                <?php while ($compra = mysqli_fetch_array($ventas)) { ?>
                    <?php 
                        $identificacionCliente = $compra['id_cliente'];
                        $queryCliente = "SELECT * FROM usuario WHERE id = '$identificacionCliente'";
                        $buscarCliente = mysqli_query($conexion, $queryCliente);
                        $datosCliente = mysqli_fetch_array($buscarCliente);   

                        $identificacionProducto = $compra['id_producto'];
                        $queryProducto = "SELECT * FROM productos WHERE id_producto = '$identificacionProducto'";
                        $buscarProducto = mysqli_query($conexion, $queryProducto);
                        $datosProducto = mysqli_fetch_array($buscarProducto);
                        
                        $id_compra = $compra['id_compra'];
                        $fecha = $compra['fecha_compra'];
                        $fecha = date("d-m-o", strtotime($fecha));
                        $estadoEnvio = $compra['estadoEnvio'];
                        $nombreCliente = $datosCliente['nombreUser'];
                        $apellidoCliente = $datosCliente['apellidoUser'];
                        $correoCliente = $datosCliente['correoUser'];
                        $telefonoCliente = $datosCliente['telefono'];
                        $nombreProducto = $datosProducto['nombreProducto'];
                        $imgProduct = $datosProducto['imagenProducto'];
                        $cantidad = $compra['cantidad'];
                        $precio = $compra['precio'];
                        $total = bcdiv(($cantidad * $precio), '1', 3);
                        $metodoPago = $compra['metodo_pago'];
                        $ciudadEnvio = $compra['ciudad'];
                        $codPostal = $compra['codigo_postal'];
                        $direccionEnvio = $compra['domicilio'];
                    ?>
                    <a name="venta<?php echo $compra['id_compra'] ?>"></a>
                    <div class="card-venta" data-value="<?php echo $estadoEnvio ?>">
                        <div class="header-card">
                            <p><b>FECHA DE VENTA:</b> <em><?php echo $fecha ?></em></p>
                        </div>
                        <div class="infoUser-card">
                            <h3>Información del cliente</h3>
                            <p><b>Nombre: </b><?php echo $nombreCliente ?> <?php echo $apellidoCliente ?></p>
                            <p><b>Correo: </b><?php echo $correoCliente ?></p>
                            <p><b>Telefono/Celular: </b><?php echo $telefonoCliente ?></p>
                        </div>
                        <div class="infoEnvio-card">
                            <h3>Información de envio</h3>
                            <p><b>Ciudad: </b><?php echo $ciudadEnvio ?></p>
                            <p><b>Código postal: </b><?php echo $codPostal ?></p>
                            <p><b>Dirección: </b><?php echo $direccionEnvio ?></p>
                        </div>
                        <div class="infoProduct-card">
                            <h3>Información del producto</h3>
                            <img class="img-producto" src="<?php echo $imgProduct ?>">
                            <p><b>Referencia: </b><?php echo $nombreProducto ?></p>
                            <p><b>Cantidad: </b><?php echo $cantidad ?></p>
                            <p><b>Total: </b>$ <?php echo $total ?></p>
                            <p><b>Metodo de pago</b></p>
                            <img src="imagenes/<?php echo $metodoPago ?>.png">
                        </div>
                        <br>
                        <div class="linea-separadora"></div>
                        <br>
                        <div class="estado-envio">
                            <div class="linea-1">
                                <div class="bola-1">
                                    <p>Envio en proceso</p>
                                </div>
                            </div>
                            <div class="linea-2">
                                <div class="bola-2">
                                    <p>Producto en camino</p>
                                </div>
                                <div class="bola-3">
                                    <p>Producto entregado</p>
                                </div>
                            </div>
                        </div>
                        <br><br><br><br>
                    </div>
                <?php } ?>
            </div>

            <div id="envios" class="opcionMenu">
                <table class="table-estadoEnvios">
                    <tr>
                        <th>Id Compra</th>
                        <th>Fecha de compra</th>
                        <th>Fecha de entrega</th>
                        <th>Estado de envio</th>
                        <th style="border-left: 2px #C7C7C7 solid;">Cambiar estado</th>
                    </tr>
                    <?php 
                        $totalCompras = "SELECT * FROM compras";
                        $queryCompras = mysqli_query($conexion, $totalCompras);
                    ?>
                    <?php while ($informacionCompras = mysqli_fetch_array($queryCompras)) { 
                        $fechaCompra = $informacionCompras['fecha_compra']; 
                        $fechaCompra = date("d-m-o", strtotime($informacionCompras['fecha_compra']) )?>
                        <tr>
                            <td><a href="administrador.php?url=listaVentas#venta<?php echo $informacionCompras['id_compra'] ?>"><?php echo $informacionCompras['id_compra'] ?></a></td>
                            <td><?php echo $fechaCompra ?></td>
                            <td><?php echo $informacionCompras['fecha_entrega'] ?></td>
                            <td class="valueEstado"><?php echo $informacionCompras['estadoEnvio'] ?></td>
                            <td style="border-left: 2px #C7C7C7 solid; position: relative;">
                                <form action="php/cambiarEstadoEnvio.php?id=<?php echo $informacionCompras['id_compra'] ?>" method="POST" class="estadosDeEnvio" name="form-cambiarEstadosEnvio">
                                    <input type="radio" name="estado-de-envio" value="Pendiente" id="productoPendiente<?php echo $informacionCompras['id_compra'] ?>" ><label for="productoPendiente<?php echo $informacionCompras['id_compra'] ?>"><img src="imagenes/pendiente.png" title="Pendiente"></label>
                                    <input type="radio" name="estado-de-envio" value="En camino" id="enCamino<?php echo $informacionCompras['id_compra'] ?>"><label for="enCamino<?php echo $informacionCompras['id_compra'] ?>"><img src="imagenes/camino.png" title="En camino"></label>
                                    <input type="radio" name="estado-de-envio" value="Entregado" id="productoRecibido<?php echo $informacionCompras['id_compra'] ?>"><label for="productoRecibido<?php echo $informacionCompras['id_compra'] ?>"><img src="imagenes/entregado.png" title="Entregado"></label>
                                    <button><img src="imagenes/comprobado.png"></button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

        <div class="menu-adminstrador">
            <ul>
                <li><a href="#" class="optionA" value="">Tu perfil</a></li>
                <li><a href="administrador.php?url=nuevoProducto" class="optionA">Ingresar nuevo producto</a></li>
                <li><a href="administrador.php?url=nuevoAdmin" class="optionA">Agregar nuevo administrador</a></li>
                <li><a href="administrador.php?url=listaUsuarios" class="optionA">Lista de clientes</a></li>
                <li><a href="administrador.php?url=listaProductos" class="optionA">Lista de productos</a></li>
                <li><a href="administrador.php?url=listaVentas" class="optionA">Historial de ventas</a></li>
                <li><a href="administrador.php?url=envios" class="optionA">Envios</a></li>
                <li><a href="#" class="optionA" value="">Quejas o sugerencias</a></li>
                <li><a href="#" class="optionA" value="">Configuración</a></li>
            </ul>
        </div>
    
    </div>

    <script src="js/estadoEnvio.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/rowTable.js"></script>
    <script src="js/manejoDeContenidos.js"></script>
    <script src="js/urlActual.js"></script>
</body>
</html>