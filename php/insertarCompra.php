<?php 

    include("conexion.php");
    session_start();

    $id_usuario = $_SESSION['datos']['id'];

    $ciudad = $_POST['ciudad-envio'];
    $codigoPostal = $_POST['postal-envio'];
    $domicilio = $_POST['direccion-envio'];
    $metodoPago = $_POST['metodo-pago'];


    $productosCarrito = "SELECT * FROM carrito_compras WHERE id_usuario = '$id_usuario'";
    $primerResultado = mysqli_query($conexion, $productosCarrito);

    while ($productos = mysqli_fetch_array($primerResultado)) {
        $id_producto = $productos['producto'];
        $cantidad = $productos['cantidad'];

        $consultarPrecio = "SELECT * FROM productos WHERE id_producto = '$id_producto'";
        $result = mysqli_query($conexion, $consultarPrecio);
        $dato = mysqli_fetch_array($result);
        $valor = $dato['precioProducto'];

        $query = "INSERT INTO compras (id_cliente, id_producto, cantidad, ciudad, codigo_postal,
                                       domicilio, precio, metodo_pago)
                            VALUES ('$id_usuario', '$id_producto', '$cantidad', '$ciudad',
                                    '$codigoPostal', '$domicilio', '$valor', '$metodoPago')";
        
        $resultado = mysqli_query($conexion, $query);
    }

    header("Location: ../carrito.php");

?>