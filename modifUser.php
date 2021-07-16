<?php 
require('conexion1.php');

$cedModf = $_GET['ced'];

$Sesion = pg_query("SELECT *FROM sesion_on_off ");
$row_Sesion = pg_fetch_array($Sesion, null, PGSQL_ASSOC);
$ced = $row_Sesion['cedula_rif'];

$obtenerHost = pg_query("SELECT *FROM user_user WHERE cedula_rif='$ced'");
$row_obtenerHost = pg_fetch_array($obtenerHost, NULL, PGSQL_ASSOC);
$host = $row_obtenerHost['hostname'];

$datosUsuarios = pg_query("SELECT *FROM usuarios WHERE cedula_rif='$cedModf'");


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Datos a Modiicar</title>

 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<link rel="stylesheet" type="text/css" href="CSS/estilopropios.css">
	<link rel="stylesheet" type="text/css" href="CSS/bootstrap.css">

	<style>
		p{
			margin: 10px;
			background-color: pink;
			border-radius: 100px;
			text-align: center;
			font-size: 21px; 
		}

		.div_UU{
		margin: 10px;
		padding-left: 710px;
		color: pink;
		text-align-last: center;
		}
		
		.div_UU img{
		width: 100px;
		border-radius: 400px;
		background: pink;
		}

		.registrados{
			padding-left: 200px;
			text-align-last: center;		
		}

		.registrados table{
			background-color: pink;
			text-align-last: center;
		}
	</style>
 </head>

 <body class="bodyIndex">
	
	<div id="header">
		<ul class="nav">
			<li><a><img src="imagenes/190-menu.png"/> MENU</a>
				<ul>

					<li>
						<a href="INDEX.php">
							<img src="imagenes/001-home.png" /> 
								Home
						</a>
					</li>

					<li>
						<a href="">
							<img src="imagenes/269-info.png" />
								Info
						</a>
					</li>
					
					<li>
						<a href="">
							<img src="imagenes/069-address-book.png" />
								Contactanos
						</a>
					</li>

				</ul>
			</li>
		</ul>
	</div>

	<div class="div_UU">
		
		<label><?php echo "[ ".$host." ]"; ?></label>

		<a href="SesionUser.php"><img src="imagenes/001-home.png"></a>
	</div>
 	
 	<p><b>Que Datos Desea Modificar ? </b><br></p>

 	<div class="registrados">
 	<form action="cambio.php" method="POST">
 	<table border="2">
		<caption><b>Usuarios</b></caption>
		<?php while ($row_DatosU=pg_fetch_array($datosUsuarios, null, PGSQL_ASSOC)) {
		echo "
			<tr><td>Datos</td> <td>Contiene</td></tr>

			 <tr>
				<td> NOMBRES </td>
				<td>
					<input type='text' name='nombres' 
								placeholder='".$row_DatosU['nombres']."'>
				</td>
			</tr>
			<tr>
				<td> APELLIDOS </td>
				<td>
					<input type='text' name='apellidos' 
								placeholder='".$row_DatosU['apellidos']."'>
				</td>
			</tr>
			<tr>
				<td> PAIS </td>
				<td>
					<input type='text' name='pais' 
								placeholder='".$row_DatosU['pais']."'>
				</td>
			</tr>
			<tr>
				<td> ESTADO </td>
				<td>
					<input type='text' name='estado' 
								placeholder='".$row_DatosU['estado']."'>
				</td>
			</tr>
			<tr>
				<Td> CIUDAD </Td>
				<td>
					<input type='text' name='ciudad' 
								placeholder='".$row_DatosU['ciudad']."'>
				</td>
			</tr>
			<tr>
				<Td> PARROQUIA </Td>
				<td>
					<input type='text' name='parroquia' 
								placeholder='".$row_DatosU['parroquia']."'>
				</td>
			</tr>
			<tr>
				<Td> DIRECCION </Td>
				<td>
					<input type='text' name='dirrecion' 
								placeholder='".$row_DatosU['dirrecion']."'>
				</td>
			</tr>
			<tr>
				<Td> EMAIL </Td>
				<td>
					<input type='text' name='email' 
								placeholder='".$row_DatosU['email']."'>
				</td>
			</tr>
			<select name='cedula_rif'>
				<option>".$row_DatosU['cedula_rif']."</option>
			</select>
			";
			}?>

		<input type="submit" name="cambiar" value="CAMBIAR">
	</table>
	</form>
	</div><br>

 </body>

 </html>