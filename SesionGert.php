<?php 
require('conexion1.php');

$cedulaSesion = pg_query("SELECT *FROM sesion_on_off ");
$row_cedulaSesion = pg_fetch_array($cedulaSesion, null, PGSQL_ASSOC);
$cedula = $row_cedulaSesion['cedula_rif'];

$ObenerDatosUG = pg_query("SELECT *FROM user_gerente 
	WHERE cedula_rif='$cedula'");
$row_ODUG = pg_fetch_array($ObenerDatosUG, null, PGSQL_ASSOC);
$row_host = $row_ODUG['hostname'];
$row_pass = $row_ODUG['passw'];

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

/*SELECT Count(*) AS cateorias FROM ventas WHERE categorias='otros';*/

$item = pg_query("SELECT *FROM tipos_categ");
$item2 = pg_query("SELECT *FROM tipos_categ");


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

		label, h4{
			color: pink;
			font-size: 18px
		}


		input, select
        {
            border: 2px solid #BFBFBF;
            color: #000;
            padding: 7px 7px 7px 15px;
            
        }

        form{
        	padding-left: 400px;
        }

		input[type="submit"]{
			background: linear-gradient(#FFF,pink);
			border: 1;
			color: brown;
			opacity: 0.8;
			cursor: pointer;
			border-radius: 15px;
			margin-bottom: 0;
		}
		
		
		input[type="reset"]{
			background: linear-gradient(#FFF,red);
			border: 1;
			color: brown;
			opacity: 0.8;
			cursor: pointer;
			border-radius: 15px;
			margin-bottom: 0;
		}

		.vista{
			background-color: hsl(2, 57%, 40%);
			color: rgb(212, 172, 13);
			text-align: center;
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

<p><b>CATEGORIAS CON MAS PUBLICACIONES</b><br></p>

<center>
<table border="2" class="vista">
	<thead>
		<tr>
			<td><h4>CATEGORIAS</h4></td>
			<td><h4>PUBLICADOS</h4></td>
	</thead>
	<tbody>
			<?php
				while ($row_item = pg_fetch_array($item, null, PGSQL_ASSOC)) 
				{
					$catg = $row_item['item1'];
					echo "<tr>";
						echo "<td>".$row_item['item1']."</td>";

							$cont = pg_query("SELECT Count(*) AS cateorias FROM ventas 
								WHERE categorias='$catg'");
							$row_cont = pg_fetch_array($cont, null, PGSQL_ASSOC);

						echo "<td>".$row_cont['cateorias']."</td>";
					echo "</tr>";
				}
			?>
	</tbody>
</table>
</center><br><br>

<p><b>CATEGORIAS MAS VENDIDAS</b><br></p>

<center>
<table border="2" class="vista">
	<thead>
		<tr>
			<td><h4>CATEGORIAS</h4></td>
			<td><h4>VENDIDOS</h4></td>
	</thead>
	<tbody>
			<?php
				while ($row_item2 = pg_fetch_array($item2, null, PGSQL_ASSOC)) 
				{
					$catg = $row_item2['item1'];
					echo "<tr>";
						echo "<td>".$row_item2['item1']."</td>";

							$cont1 = pg_query("SELECT Count(*) AS cateoria FROM compra 
								WHERE categoria='$catg'");
							$row_cont1 = pg_fetch_array($cont1, null, PGSQL_ASSOC);

						echo "<td>".$row_cont1['cateoria']."</td>";
					echo "</tr>";
				}
			?>
	</tbody>
</table>
</center><br><br>


</body>
 
 </html>