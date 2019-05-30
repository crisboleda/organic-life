<?php
	session_start();
	sleep(1);
	include("conexion.php");

	$correo = $_POST['emailUser'];
	$clave = $_POST['clave'];
	
	$query = "SELECT * FROM usuario WHERE correoUser='$correo' 
									AND   contraseñaUser='$clave'";

	$resultado = $conexion->query($query);
	$informacion = mysqli_fetch_array( $resultado );

	
	if (mysqli_num_rows($resultado) >= 1) {
 		$_SESSION['datos'] = $informacion;

 		$usuario = $_SESSION['datos']['rango'];
		
		header("Location: ../index.php");
 	 	
	}else{
		$_SESSION['mensaje'] = "El correo electrónico o la contraseña son incorrectos";
		header("Location: ../login.php");  
	}

?>