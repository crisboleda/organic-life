<?php

$mysqli = new mysqli("localhost", "root", "", "frutas");
if (mysqli_connect_error()) {
	echo "Conexcion Fallida";
}
$mysqli->set_charset("utf8");
?>