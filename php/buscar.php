<?php 

    session_start();
    include("conexion.php");

    if (isset($_GET['url'])) {
        $url = $_GET['url'];
    }else {
        $url = "../index.php";
    }

    $producto = $_POST['productoBuscar'];
    $query = "SELECT * FROM productos WHERE nombreProducto = '$producto'";
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) >= 1) {
        
        $datos = mysqli_fetch_array($resultado);
        $id_producto = $datos['id_producto'];

        header("Location: ../descripcion.php?id=$id_producto");

    }else {
        $_SESSION['objetoNoEncontrado'] = "El producto que intenta buscar no esta disponible";
        header("Location: $url");
    }


?>