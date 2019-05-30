<?php

    include("php/conexion.php");
    session_start();

    if (isset($_SESSION['datos'])) {
        $id_User = $_SESSION['datos']['id'];

        $consulta = "SELECT * FROM carrito_compras WHERE id_usuario = '$id_User'";
        $resultado = mysqli_query($conexion, $consulta);

        $cantidad = mysqli_num_rows($resultado);
    }else {
        $cantidad = 0;
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Organic Life</title>
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="iconos/style.css">
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed" rel="stylesheet">
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
    <div class="sub-menu">
        <ul class="lista-submenu">
            <li><a href="catalogo.php">Catálogo</a></li>
            <li><a href="organiclife.php">OrganicLife</a></li>
            <li><a href="blog.php">Blog</a></li>
            <ul class="subMenu-usuario" id="submenu-perfil">
                <li><a href="php/validarUsuario.php">Perfil</a></li>
                <li><a href="php/cerrar.php">Cerrar sesión</a></li>
            </ul>
            <a href="carrito.php" class="href-carrito"><span class="icon-cart"></span></a>
            <p class="cantidad"><?php echo $cantidad ?></p>
        </ul>
    </div>  
    <div class="menu-lateralResponsive" id="menu-responsive">
        <nav class="nav-responsive">
            <ul>
            <?php 
                if (empty($_SESSION['datos'])) { ?>
                     
                    <li><a href="login.php?url=<?php echo $_SERVER["REQUEST_URI"]?>">Entrar</a></li>
                    <li><a href="registro.php">Registrarse</a></li>
                    <li><a href="contacto.php">Contacto</a></li>
                    <li><a href=""><span class="icon-search"></span></a></li>
                    <li><a href="catalogo.php">Catálogo</a></li>
                    <li><a href="organiclife.php">OrganicLife</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <ul class="subMenu-usuario" id="submenu-perfil">
                        <li><a href="php/validarUsuario.php">Perfil</a></li>
                        <li><a href="php/cerrar.php">Cerrar sesión</a></li>
                    </ul>
                    <a href="carrito.php" class="href-carrito"><span class="icon-cart"></span></a>
                    <p class="cantidad"><?php echo $cantidad ?></p>
                <?php }else { ?>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href=""><span class="icon-search"></span></a></li>
                <li class="li-perfilUsuario">
                    <img src="imagenes/usuario.png" class="img-usuario" id="img-perfil">
                </li>
                <li><a href="catalogo.php">Catálogo</a></li>
                <li><a href="organiclife.html">OrganicLife</a></li>
                <li><a href="blog.html">Blog</a></li>
                <ul class="subMenu-usuario" id="submenu-perfil">
                    <li><a href="php/validarUsuario.php">Perfil</a></li>
                    <li><a href="php/cerrar.php">Cerrar sesión</a></li>
                </ul>
                <a href="carrito.php" class="href-carrito"><span class="icon-cart"></span></a>
                <p class="cantidad"><?php echo $cantidad ?></p>    
                <?php } ?>
            </ul>
        </nav>  
    </div>
    
    <div class="parte1">
        <h1>El blog de Organic Life</h1>
        <p> Profesionales de la salud, padres, conocedores y otros expertos ofrecen sus mejores consejos, guías paso a paso, tutoriales y más en temas de salud, nutrición y bienestar para ayudarte en el propósito de alcanzar una vida más saludable para ti y tu familia.

            Sabemos que el ritmo de vida que vivimos nos crea desafíos en la búsqueda de una mejor calidad de vida. Por eso creemos que podemos servir compartiendo información que te ayude a mejorar tu estilo de vida. Ese es el objetivo fundamental de este blog que queremos compartir contigo.</p>
    </div>
        
    <section class="main">
        <section class="articles">
    
            <article class="article1">   
                <img src="imagenes/organico.jpg" alt="">
                <h2>Alimentos org&aacutenicos</h2>
                <p>Como ya dijimos en este otro artículo que habla sobre los alimentos orgánicos y sus beneficios, este tipo de alimentos está cada vez más introducido en nuestra alimentación debido a sus 
                múltiples propiedades y beneficios tanto para la raza humana como para el planeta tierra.<br><br>
                Así es; al igual que los alimentos orgánicos nos benefician a nosotros los humanos, también beneficia a nuestro querido planeta tierra debido a 
                la forma en la que están cultivados y criados sin productos químicos ni fármacos, tal y como veremos a continuación</p>

                <h5><img class="encabezado" src="imagenes/logo.png"> Organic Life | <img class="encabezado" src="imagenes/calendar.png"> mayo 7, 2018</h5>
            </article>
    
            <article class="article1">
                <img src="imagenes/beneficios.jpg" alt="">
                <h2>Beneficios de los alimentos org&aacutenicos</h2>
                <p>Los alimentos que provienen del sector agrícola están cultivados libres de todo tipo de productos químicos como plaguicidas, insecticidas, aditivos, pesticidas, fertilizantes artificiales, etc.<br><br>Todos estos productos químicos sintéticos dañan a los alimentos que los reciben reduciendo en gran medida la calidad 
                de sus nutrientes, además de dañar el medio ambiente y directamente la capa de ozono permitiendo que pasen las radiaciones solares, etc.</p> 

                <h5><img class="encabezado" src="imagenes/logo.png"> Organic Life | <img class="encabezado" src="imagenes/calendar.png"> abril 10, 2018</h5>

            </article>
            <article class="article1">
                <img src="imagenes/inorganicos.jpg" alt="">
                <h2>Alimentos inorg&aacutenicos</h2>
                <p>Los alimentos orgánicos son aquellos que se componen de los tres macronutrientes, las proteínas, 
                los hidratos de carbono y las grasas. Los alimentos inorgánicos son básicamente el agua y los minerales <br> <br>A diferencia de los orgánicos, los alimentos 
                inorgánicos no aportan energía ya que son minerales, agua y oligoelementos.<br><br>Como ya sabes, el agua es necesaria para la vida al igual que los minerales. Ambos intervienen en la mayoría de procesos y reacciones químicas enzimáticas. Influyen en los impulsos nerviosos hacia los músculos y regulan el balance de líquidos del organismo, además de cientos y cientos de procesos más, todos ellos muy importantes</p>

                <h5><img class="encabezado" src="imagenes/logo.png"> Organic Life | <img class="encabezado" src="imagenes/calendar.png"> marzo 14, 2018</h5>

            </article>
    
        </section>
        <!--Lado derecho-->
        <div class="suscripcion">
            <h1> Entérate de nuevos eventos</h1>
            <input type="email" name="emailUser" id="nameUser" placeholder="Correo electrónico" required="">
            <input type="submit" name="" value="Suscríbete">
        </div>
        <aside>
            <img src="imagenes/sabiasque.jpg" alt="">
            <h3>¿Sabias qu&eacute?</h3>
            <p>Las frutas y las verduras tienen cualidades nutricionales únicas: son bajas en calorías, contienen gran cantidad de agua, vitaminas hidrosolubles como vitamina C, ácido fólico, vitaminas del complejo B, vitaminas liposolubles como beta carotenos, vitamina A, E y K</p>
        </aside>
            
        <div class="recomendados">
            <h1> Nuestras recomendaciones </h1>
            <iframe src="https://www.youtube.com/embed/hJgn0B6bHwE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <p> Youtube | <em>25 TRUCOS CON FRUTAS Y VERDURAS</em></p>
        </div>
        <div class="recomendados">
            <iframe src="https://www.youtube.com/embed/ZaD-u1UTeNc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <p> Youtube | <em>CALORÍAS EN FRUTA Y VERDURA</em></p>
        </div>
            
        <div class="recomendados">
            <iframe src="https://www.youtube.com/embed/EK0mXgmt_T0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <p> Youtube | <em>EL JUGO VERDE QUE CAMBIÓ MI VIDA</em></p>
        </div>
            <!--Videos agg
            <div class="recomendados">
                <iframe src="https://www.youtube.com/embed/PtMWDb9rPno" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p> Youtube | <em>COMO COMBINAR FRUTAS Y VERDURAS</em></p>
            </div>-->            
    
    </section>  

    <!-- FOOTER -->
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
    <script src="js/menu.js"></script>
    <script src="js/aparecerIcono.js"></script>
</body>
</html>