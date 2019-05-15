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
            <li><a href="">OrganicLife</a></li>
            <li><a href="blog.html">Blog</a></li>
           
        </ul>
    </div>  
    <div class="menu-lateralResponsive" id="menu-responsive">
        <nav class="nav-responsive">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="catalogo.php">Catálogo</a></li>
                <li><a href="organiclife.html">OrganicLife</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="php/cerrar.php" class="boton">Cerrar sesión</a></li>
                <li><a href=""><span class="icon-cart"></span></a></li>
            </ul>
        </nav>  
    </div>

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
                <table>
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
                            <td><h2><?php echo $datos['id'] ?></td>
                            <td><h2><?php echo $datos['nombreUser']?></h2></td>
                            <td><p><?php echo $datos['apellidoUser']?></p></td>
                            <td><p><?php echo $datos['correoUser'] ?></p></td>
                            <td><h3><?php echo $datos['direccionUser'] ?></h3></td>
                            <td><p><?php echo $datos['ciudad'] ?></p></td>
                            <td><h2><?php echo $datos['telefono'] ?></td>
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
                            <td><h2><?php echo $columna['id_producto'] ?></td>
                            <td><button><a href="php/deleteproducto.php?id=<?php echo $columna['id_producto'] ?>"><img src="imagenes/basura.png"></a></button></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

        </div>

        <div class="menu-adminstrador">
            <ul>
                <li><a href="#" class="optionA" value="">Tu perfil</a></li>
                <li><a href="#" class="optionA" name="nuevoProducto">Ingresar nuevo producto</a></li>
                <li><a href="#" class="optionA" name="nuevoAdmin">Agregar nuevo administrador</a></li>
                <li><a href="#" class="optionA" name="listaUsuarios">Lista de clientes</a></li>
                <li><a href="#" class="optionA" name="listaProductos">Lista de productos</a></li>
                <li><a href="#" class="optionA" value="">Historial de ventas</a></li>
                <li><a href="#" class="optionA" value="">Panel de control</a></li>
                <li><a href="#" class="optionA" value="">Quejas o sugerencias</a></li>
                <li><a href="#" class="optionA" value="">Configuración</a></li>
            </ul>
        </div>
    
    </div>

    <script src="js/manejoDeContenidos.js"></script>
</body>
</html>