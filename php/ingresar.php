<?php
	session_start();
	sleep(1);

	include("conexion.php");

	if (isset($_GET['url'])) {
        $url= $_GET['url'];

    }

	if (isset($conexion)) {
    	echo "";
	}else {
    	echo "Error en la conexión";
	}

	$correo = $_POST['emailUser'];
	$clave = $_POST['clave'];
	
	$query = "SELECT * FROM usuario WHERE correoUser='$correo' 
									AND   contraseñaUser='$clave'";

	$resultado = $conexion->query($query);
	$informacion = mysqli_fetch_array( $resultado );

	
	if ($resultado->num_rows >= 1) {
 		$_SESSION['datos'] = $informacion;

 		$usuario = $_SESSION['datos']['rango'];
		
		header("Location: $url");
 	 	
	}else{
 	 	echo "Los datos son incorrectos";
	}

?>