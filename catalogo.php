<?php
    session_start();
    include("php/conexion.php");

    if (isset($_SESSION['datos'])) {
        $id_User = $_SESSION['datos']['id'];
        $consulta = "SELECT * FROM carrito_compras WHERE id_usuario = '$id_User'";
        $resultado = mysqli_query($conexion, $consulta);
        $cantidad = mysqli_num_rows($resultado);
        
    }else {
        $cantidad = 0;
    }

    if (isset($conexion)) {
        echo "";
    }else {
        echo "Error";
    }

    if (isset($_GET['id'])) {
        $tipo = $_GET['id'];

    }else {
        $tipo = 'fruta';
    }

    if (isset($_GET['rango'])) {
        echo $_GET['rango'];
    }

    $query = "SELECT * FROM productos WHERE tipo = '$tipo'";
    $resultado = $conexion->query($query);

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catálogo</title>
    <link rel="stylesheet" href="css/catalogo.css">
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed" rel="stylesheet">

    <link rel="stylesheet" href="iconos/style.css">
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
                    <li><a href="index.php">Incio</a></li>
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
    <div class="sub-menu">
        <ul class="lista-submenu">
            <li><a href="catalogo.php">Catálogo</a></li>
            <li><a href="organiclife.php">OrganicLife</a></li>
            <li><a href="blog.php">Blog</a></li>
            <ul class="subMenu-usuario" id="submenu-perfil">
                <li><a href="php/validarUsuario.php">Perfil</a></li>
                <li><a href="php/cerrar.php">Cerrar sesión</a></li>
            </ul>
            <a href="carrito.php"><span class="icon-cart"></span></a>
            <p class="cantidad"><?php echo $cantidad ?></p>
        </ul>
    </div>  
    <div class="menu-lateralResponsive" id="menu-responsive">
        <nav class="nav-responsive">
            <ul>
                <li><a href="login.php?url=index.html">Entrar</a></li>
                <li><a href="registro.php">Registrarse</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href=""><span class="icon-cart"></span></a></li>
                <p class="cantidad"><?php echo $cantidad ?></p>
            </ul>
        </nav>  
    </div>
    <div class="menu-lateral">
        <nav class="submenu-lateral">
            <ul class="lista-lateral">
                <li><span><img src="imagenes/icon-fruta.png"></span><a href="catalogo.php?id=fruta">Frutas</a></li>
                <li><span><img src="imagenes/icon-verdura.png"></span><a href="catalogo.php?id=verdura">Verduras</a></li>
                <ul>
                    <li><input type="radio" name="precio" id="no-rango" checked="" value="no-rango"><label for="no-rango">Fuera de rango de precios</label></li>
                    <li><input type="radio" name="precio" id="1-4" value="1000-4999"><label for="1-4">$ 1,000 - 4,999</label></li>
                    <li><input type="radio" name="precio" id="5-9" value="5000-9999"><label for="5-9">$ 5,000 - 9,999</label></li>
                    <li><input type="radio" name="precio" id="10-14" value="10000-14000"><label for="10-14">$ 10,000 - 14,999</label></li>
                    <li><input type="radio" name="precio" id="15-19" value="15000-19000"><label for="15-19">$ 15,000 - 19,999</label></li>
                    <li><input type="radio" name="precio" id="20-24" value="20000-24000"><label for="20-24">$ 20,000 - 24,999</label></li>
                </ul>
            </ul>
        </nav>
    </div>
    <div class="contenido-productos">
        <?php
        while ($columna = mysqli_fetch_array( $resultado )){?>
            <div class='card'>
                <img src="<?php echo $columna['imagenProducto'] ?>">
                <h2><?php echo $columna['nombreProducto']?></h2>
                <p><em><?php echo $columna['gramosProducto'] ?></em></p><br>
                <h3 value="<?php echo $columna['precioProducto'] ?>">Precio: $ <?php echo $columna['precioProducto'] ?></h3><br>
                <button><a href="descripcion.php?id=<?php echo $columna['id_producto']?>">Ver más</a></button>
            </div>
        <?php } ?>
    </div>

    <script src="js/buscar.js"></script>
    <script src="js/rangoPrecios.js"></script>
    <script src="js/aparecerIcono.js"></script>
    <script src="js/submenu.js"></script>
</body>
</html>