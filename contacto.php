<?php 

    

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Contacto</title>
    <link rel="stylesheet" href="css/contacto.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR" rel="stylesheet">
   

  </head>
  <body>

    <header>
        <img src="imagenes/logo.png" class="img-logo">
        <h1 class="logo">Organic Life</h1>
        <img src="imagenes/menu.png" class="icon-menu" id="boton-menu">
        <nav>
            <ul>
                <?php if (empty($_SESSION['datos'])) { ?>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="login.php?url=<?php echo $_SERVER["REQUEST_URI"]?>">Entrar</a></li>
                    <li><a href="registro.php">Registrarse</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li><a href=""><span class="icon-search"></span></a></li>
                         
                <?php }else { ?>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li><a href=""><span class="icon-search"></span></a></li>
                    <li class="li-perfilUsuario">
                        <img src="imagenes/usuario.png" class="img-usuario" id="img-perfil">
                    </li>
     
                <?php } ?>
            </ul>
        </nav>
    </header>
           <div class="menu-lateralResponsive" id="menu-responsive">
               <nav class="nav-responsive">
                   <ul>
                       <li><a href="login.php">Entrar</a></li>
                       <li><a href="registro.php">Registrarse</a></li>
                       <li><a href="#">Contacto</a></li>
                       <li><a href=""></a></li>
                   </ul>
               </nav>  
           </div>

    <div id="titulo"> 
        <h1>¡Env&iacuteanos t&uacute problema</h1>
        <h1>o sugerencia!</h1>
    </div>

    <div class="login-box">
      
      <form action="php/enviar.php" method="POST">
        <!-- ASUNTO INPUT -->
        <label for="username">Asunto:</label>
        <input type="text" name="posdata" placeholder="Ingresa un asunto">

        <!-- NOMBRE INPUT -->
        <label for="password">Nombre:</label>
        <input type="text" name="nombre">
       

         <!-- CORREO INPUT -->
        <label for="password">Correo:</label>
        <input type="text" name="correo" placeholder="Escribe t&uacute  correo">

        <!-- MENSAJE INPUT -->
        <textarea name="mensaje" id="hola" cols="40" rows="5" placeholder="Escribe t&uacute mensaje"></textarea>
        
        <input type="submit" value="ENVIAR">

      </form>
    </div>

   <div>
       <section class="ubicacion">
           <h2>Nos ubicamos en:</h2>
           <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d993.9025617361882!2d-75.68147687085388!3d4.836794436109731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sco!4v1557621793269!5m2!1ses-419!2sco" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
       </section>
   </div> 
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