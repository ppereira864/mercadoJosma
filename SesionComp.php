<?php 
require('conexion1.php');

$cedulaSesion = pg_query("SELECT *FROM sesion_on_off ");
$row_cedulaSesion = pg_fetch_array($cedulaSesion, null, PGSQL_ASSOC);
$cedula = $row_cedulaSesion['cedula_rif'];

$ObenerDatosUC = pg_query("SELECT *FROM user_compra 
	WHERE cedula_rif='$cedula'");
$row_ODUC = pg_fetch_array($ObenerDatosUC, null, PGSQL_ASSOC);
$row_host = $row_ODUC['hostname'];
$row_pass = $row_ODUC['passw'];

$ObenerDatosUsuarios = pg_query("SELECT *FROM usuarios 
	WHERE cedula_rif='$cedula'");
$row_ODU = pg_fetch_array($ObenerDatosUsuarios, null, PGSQL_ASSOC);
$row_nomb = $row_ODU['nombres'];
$row_apel = $row_ODU['apellidos'];
$row_pais = $row_ODU['pais'];
$row_estd = $row_ODU['estado'];
$row_ciud = $row_ODU['ciudad'];
$row_parr = $row_ODU['parroquia'];
$row_dire = $row_ODU['dirrecion'];
$row_email = $row_ODU['email'];

$artiComprado = pg_query("SELECT  
	*FROM compra AS CP JOIN (SELECT EF.id_UU , EF.hostname_UU , EF.id_comp, EF.fecha_comp, EF.confirmacion
								FROM user_compra AS UC JOIN efectua AS EF
									ON (UC.hostname='$row_host' AND EF.hostname_UU='$row_host')) AS NN 
ON (CP.id = NN.id_comp);");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sesion User User</title>
	
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<link rel="stylesheet" type="text/css" href="CSS/estilopropios.css">
	<link rel="stylesheet" type="text/css" href="CSS/bootstrap.css">

	<style>
		.div_UU{
		margin: 10px;
		padding-left: 700px;
		color: pink;
		text-align-last: center;
		}
		
		.div_UU img{
		width: 100px;
		border-radius: 400px;
		background: pink;
		}

		.div_UU table{
			background-color: hsl(2, 57%, 40%);
		}

		.publicados{
			margin: 10px;
			padding-left: 200px;
		}

		.publicados table{
			background-color: pink;
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
						<a href="InfCont/Contactanos.pdf" target="_blank">
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
		
		<label><?php echo "[ ".$row_host." ]"; ?></label>

		<img src="svg/id-card.svg">
		<table border="3">
			<thead>
				<tr>
					<th>****DATOS DE USUARIO****</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Hosname: <?php echo $row_host; ?></td>
				</tr>
				<tr>
					<td>Password: <?php echo $row_pass; ?></td>
				</tr>
				<tr>
					<td><b>****INFORMACION PERSONAL****</b></td>
				</tr>
				<tr>
					<td>Cedula: <?php echo $cedula; ?></td>
				</tr>
				<tr>
					<td>Nombre: <?php echo $row_nomb; ?></td>
				</tr>
				<tr>
					<td>Apellido: <?php echo $row_apel; ?></td>
				</tr>
				<tr>
					<td>Pais: <?php echo $row_pais; ?></td>
				</tr>
				<tr>
					<td>Estado: <?php echo $row_estd; ?></td>
				</tr>
				<tr>
					<td>Ciudad: <?php echo $row_ciud; ?></td>
				</tr>
				<tr>
					<td>Parroquia: <?php echo $row_parr; ?></td>
				</tr>
				<tr>
					<td>Direccion: <?php echo $row_dire; ?></td>
				</tr>
				<tr>
					<td>Email: <?php echo $row_email; ?></td>
				</tr>
			</tbody>
		</table>
	</div>

	<p><b>ARICULOS COMPRADO POR <?php echo $row_host; ?></b><br></p>

 	<div class="publicados">
		<table border="2">
			<thead>
				<tr>
					<th>Articulo Comprado</th>
					<th>Cantidad Articulo</th>
					<th>Precio Total</th>
					<th>Forma De Pago</th>
					<th>Fecha De Compra</th>
					<th>Confirmacion</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($row_ArtCom=pg_fetch_array($artiComprado, null, PGSQL_ASSOC)) {
			echo "
			<tr>
				<td>".$row_ArtCom['art_comprado']."</td>
				<td>".$row_ArtCom['cantidad']."</td>
				<td>".$row_ArtCom['prec_total']."</td>
				<td>".$row_ArtCom['forma_pago']."</td>
				<td>".$row_ArtCom['fecha_comp']."</td>
				<td>".$row_ArtCom['confirmacion']."</td>
			</tr>";
			}?>
			</tbody>
		</table>
	</div>


</body>
 
 </html>