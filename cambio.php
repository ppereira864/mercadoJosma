<?php 
require('conexion1.php');

$cedula_rif = $_POST['cedula_rif'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$pais = $_POST['pais'];
$estado = $_POST['estado'];
$ciudad = $_POST['ciudad'];
$parroquia = $_POST['parroquia'];
$dirrecion = $_POST['dirrecion'];
$email = $_POST['email'];
$cadena= "";

if ($nombres != "") {
	$actualizar = pg_query("UPDATE public.usuarios 
				SET nombres='$nombres' WHERE cedula_rif='$cedula_rif'");

	if ($actualizar) {
		$cadena ="1"; 
	}
}

if ($apellidos != "") {
	$actualizar = pg_query("UPDATE public.usuarios
   				SET apellidos='$apellidos' WHERE cedula_rif='$cedula_rif'");
	
	if ($actualizar) {
		$cadena ="2";
	}
}

if ($pais != "") {
	$actualizar = pg_query("UPDATE public.usuarios
   				SET pais='$pais' WHERE cedula_rif='$cedula_rif'");

	if ($actualizar) {
		$cadena ="3";
	}
}

if ($estado != "") {
	$actualizar = pg_query("UPDATE public.usuarios
   				SET estado='$estado' WHERE cedula_rif='$cedula_rif'");

	if ($actualizar) {
		$cadena ="4";
	}
}

if ($ciudad != "") {
	$actualizar = pg_query("UPDATE public.usuarios
   SET ciudad='$ciudad' WHERE cedula_rif='$cedula_rif'");

	if ($actualizar) {
		$cadena ="5";
	}
}

if ($parroquia != "") {
	$actualizar = pg_query("UPDATE public.usuarios
   				SET parroquia='$parroquia' WHERE cedula_rif='$cedula_rif'");

	if ($actualizar) {
		$cadena ="6";
	}
}



if ($dirrecion != "") {
	$actualizar = pg_query("UPDATE public.usuarios
   SET dirrecion='$dirrecion' WHERE cedula_rif='$cedula_rif'");

	if ($actualizar) {
		$cadena ="7";
	}
}

if ($email != "") {
	$actualizar = pg_query("UPDATE public.usuarios
   SET email='$email' WHERE cedula_rif='$cedula_rif'");

	if ($actualizar) {
		$cadena ="8";
	}
}

if ($cadena != "") {
	echo " <html>
			<head>
				<meta http-equiv='REFRESH' content='0 ; url=SesionUser.php'>
				<script>
					alert('Se Actualizo El U LOS Campo Correctamente');
				</script>
			</head>
		</html>
	";
}else{
	echo " <html>
			<head>
				<meta http-equiv='REFRESH' content='0 ; url=SesionUser.php'>
				<script>
					alert('Lo Siento Campo No Procesado');
				</script>
			</head>
		</html>
	";
}

/*
$actualizar = pg_query("UPDATE public.usuarios
   SET nombres='$nombres', apellidos='$apellidos', pais='$pais', estado='$estado', 
   ciudad='$ciudad', parroquia='$parroquia', dirrecion='$dirrecion', email='$email'
 WHERE cedula_rif='$cedula_rif'");*/

 ?>