<?php

    session_start();
    include("php/conexion.php");

    if(isset($_SESSION['datos'])){
        $usuario = $_SESSION['datos']['rango'];
        if ($usuario == admin) {
            // Si es admin
        }else {
            header("Location: index.php");
        }
    }else {
        header("Location: index.php");
    }

    if (isset()) {

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organic Life | Admin</title>
</head>
<body>
    <form action="php/insertarProducto.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre del producto:</label><br>
        <input type="text" id="nombre" name="nombre-producto">
        <br><br>
        <label for="img">Imagen del producto:</label><br>
        <input type="file" id="img" name="imagen">
        <br><br>
        <label for="descripcion">Descripción del producto:</label><br>
        <input type="text" id="descripcion" name="descrip-producto">
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

        <form action="admin.php">
            <button name="verProductos">Ver productos</button>
        </form>

    </form>
</body>
</html>