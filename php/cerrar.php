<?php

	include("conexion.php");
	session_start();

	if (isset($_SESSION['datos'])) {
		$id = $_SESSION['datos']['id'];

		$query = "UPDATE usuario set ultima_sesion = NOW() WHERE id = '$id'";
		$resultado = mysqli_query($conexion, $query);
	}

	session_destroy();
	
	header("Location: ../index.php")

?>