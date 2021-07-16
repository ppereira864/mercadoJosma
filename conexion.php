<?php 

$mysqli = new mysqli("localhost","root","","mercado_jos_ros");

if (mysqli_connect_errno()) {

	echo "<br><br>";
	echo "<center style=color:red><h1>CONEXION FALLIDA: </h1></center>",mysqli_connect_errno();
	exit();

}

 ?>