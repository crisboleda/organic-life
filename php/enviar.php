
<?php 

    session_start();

    $destino = 'lifeorganic182@gmail.com';
    $asunto = 'MENSAJE DE CONTACTO';
    $titulo = $_POST['posdata'];
    $nombre = $_POST['nombre'];
    $email = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $mensaje = "
    <html>
        <head>
        <link href='https://fonts.googleapis.com/css?family=Encode+Sans+Condensed' rel='stylesheet'>

        <style>
            * {
                font-family: 'Encode Sans Condensed', sans-serif;
            }
        </style>

        </head>
        <body>
            <h1 style='font-size: 22px; color: #0CA302;'>$titulo</h1>
            <h3 style='font-size: 17px;'>Nombre del destinatario:$nombre</h3>
            <h3 style='font-size: 17px;'>Correo del destinatario: $email</h3>
            <h2 style='font-size: 17px;'>Problema / sujerencia: </h2>
            <p style='font-size: 17px;'>$mensaje</p>
        </body>
    </html>
    ";


    $resultado = mail($destino, $asunto, $mensaje, $cabeceras);

    if ($resultado) {
        $_SESSION['mensajeCorrecto'] = "Su mensaje fue enviado, en breve le daremos respuesta";
    }

    header("Location: ../contacto.php");

?>