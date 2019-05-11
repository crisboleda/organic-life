<?php
    session_start();
    include("php/conexion.php");
    
    if (isset($conexion)) {
        echo "";
    }else {
        echo "Error";
    }

    $query = "SELECT * FROM productos";
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
        <img src="img/menu.png" class="icon-menu" id="boton-menu">
        <nav>
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
                    <ul class="subMenu-usuario" id="submenu-perfil">
                        <li><a href="">Perfil</a></li>
                        <li><a href="php/cerrar.php">Cerrar sesión</a></li>
                    </ul>
                </li>

            <?php } ?>
        </nav>
    </header>
    <div class="sub-menu">
        <span class="icon-cart"></span>
        <ul class="lista-submenu">
            <li><a href="">Catálogo</a></li>
            <li><a href="index.php">OrganicLife</a></li>
            <li><a href="">Blog</a></li>
            
        </ul>
    </div>  
    <div class="menu-lateralResponsive" id="menu-responsive">
        <nav class="nav-responsive">
            <ul>
                <li><a href="login.html">Entrar</a></li>
                <li><a href="registrarse.html">Registrarse</a></li>
                <li><a href="contacto.html">Contacto</a></li>
                <li><a href=""><span class="icon-cart"></span></a></li>
            </ul>
        </nav>  
    </div>
    <div class="menu-lateral">
        <nav class="submenu-lateral">
            <ul class="lista-lateral">
                <li id="li-selector"><a>Subcategorías</a><span class="icon-circle-down"></span>
                    <ul class="submenu-catergorias" id="submenu-cat">
                        <li><a href="">Frutas</a></li>
                        <li><a href="">Verduras</a></li>
                    </ul>
                </li>
                <li><a>Rango de precios</a><span class="icon-circle-down"></span>
                    <ul>
                        <li><a href="">$1,000 - 4,999</a></li>
                        <li><a href="">$5,000 - 9,999</a></li>
                        <li><a href="">$10,000 - 14,999</a></li>
                        <li><a href="">$15,000 - 19,999</a></li>
                        <li><a href="">$20,000 - 24,999</a></li>
                    </ul>
                </li>
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
                <h3>Precio: <?php echo $columna['precioProducto'] ?></h3><br>
                <button><a href="descripcion.php?id=<?php echo $columna['id_producto']?>">Ver más</a></button>
            </div>
        <?php } ?>
    </div>
    <script src="js/submenu.js"></script>
</body>
</html>