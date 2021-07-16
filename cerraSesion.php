<?php 
require('conexion1.php');

$obtenerCed = $_GET['cedula_rif'];
$obtenerHost = $_GET['hostname'];


if ($obtenerCed=="") {
	
	echo " <html>
			<head>
				<meta http-equiv='REFRESH' content='0 ; url=INDEX.php'>
				<script>
				alert('Disculpe No Hay Sesion Iniciada');
				</script>
			</head>
		</html>
	";
}
else{
	$obtenerCed = $_GET['cedula_rif'];
	$Verif_Sesion = pg_query("DELETE FROM sesion_on_off WHERE cedula_rif='$obtenerCed';");

	if ($Verif_Sesion) {

	echo " <html>
			<head>
				<meta http-equiv='REFRESH' content='0 ; url=INDEX.php'>
				<script>
				alert('Sesion ".$obtenerHost." Cerrada');
				</script>
			</head>
		</html>
	";
	}
	else{
	echo " <html>
			<head>
				<meta http-equiv='REFRESH' content='0 ; url=INDEX.php'>
				<script>
				alert('No Pudo Cerrarse Sesion ".$obtenerHost."');
				</script>
			</head>
		</html>
	";
	}
}
 

 ?>