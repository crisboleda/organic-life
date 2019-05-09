<?php
session_start();
sleep(2);
require_once "conexion.php";

$correo = $_POST['emailUser'];
$clave = $_POST['clave'];
	
$query = "SELECT * FROM frutas WHERE correoUser='$correo' AND                                                contraseñaUser='$clave'";

$consult2 = $mysqli->query($query);


if ($consult2->num_rows>=1) {
 	$session = $consult2->fetch_array();
 	$_SESSION['username'] = $session;

 	$usuario = $_SESSION['username']['tipo_usuario'];

 	if ($usuario == "cliente") {
 		header("Location: inicio.php");
 	}else {
 		header("Location: administracion.php");
 	}
}else{
 	echo "Los datos son incorrectos";
}

}else{
	echo "Debes llenar ambos campos";
}

?>