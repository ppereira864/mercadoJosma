<?php 
require('conexion1.php');

$cedulaSesion = pg_query("SELECT *FROM sesion_on_off ");
$row_cedulaSesion = pg_fetch_array($cedulaSesion, null, PGSQL_ASSOC);
$cedula = $row_cedulaSesion['cedula_rif'];

$ObenerDatosUU = pg_query("SELECT *FROM user_user 
	WHERE cedula_rif='$cedula'");
$row_ODUU = pg_fetch_array($ObenerDatosUU, null, PGSQL_ASSOC);
$row_host = $row_ODUU['hostname'];
$row_pass = $row_ODUU['passw'];

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

$obtenerDatosUM = pg_query("select *from user_mantenimiento");
$obtenerDatosUG = pg_query("select *from user_gerente");
$obtenerDatosUC = pg_query("select *from user_compra");

$item = pg_query("SELECT *FROM tipos_categ");
$vista = pg_query("SELECT *FROM tipo_plan");
$item1 = pg_query("SELECT *FROM tipo_plan");

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
			margin: 20px;
			padding-left: 700px;
			color: pink;
			text-align-last: center;
		}
		
		.div_UU img{
			width: 120px;
			border-radius: 400px;
			background: pink;
		}

		.div_UU table{
			background-color: hsl(2, 57%, 40%);
		}

		p{
			margin: 10px;
			background-color: pink;
			border-radius: 100px;
			text-align: center;
			font-size: 21px; 
		}

		.registrados{
			padding-left: 320px;
			text-align-last: center;		
		}

		.registrados table{
			background-color: pink;
			text-align-last: center;
		}

		.registrados table caption{
			color: pink;
		}


		input, select
        {
            border: 2px solid #BFBFBF;
            color: #000;
            padding: 7px 7px 7px 15px;
            
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

		#id1{
			background-color: hsl(2, 57%, 40%);
		}

		center form table thead tr td{
			color: pink;
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

	<p><b>Usuarios Regisrados</b><br></p>
	
	
	<div class="registrados">
		<table border="2">
		<caption>Usuarios Compra</caption>
		<thead>
			<tr>
				<th> HOSTNAME </th>
				<th> PASSWORD </th>
				<th> CEDULA </th>
				<th> CLASE </th>
				<th> ACCIONES </th>
			</tr>

		</thead>
		<tbody>
			<?php while ($row_DatosUC=pg_fetch_array($obtenerDatosUC, null, PGSQL_ASSOC)) {
			echo "
			<tr>
				<td>".$row_DatosUC['hostname']."</td>
				<td>".$row_DatosUC['passw']."</td>
				<td>".$row_DatosUC['cedula_rif']."</td>
				<td>".$row_DatosUC['clase']."</td>
				<td>
					<a href='eliminarUser.php?ced=".$row_DatosUC['cedula_rif']."'>Eliminar </a>
					<a href='modifUser.php?ced=".$row_DatosUC['cedula_rif']."'>Modificar </a>
				</td>
			</tr>";
			}?>
		</tbody>
	</table>
	</div>


	<div class="registrados">
	<table border="2">
		<caption>Usuarios Gerente</caption>
		<thead>
			<tr>
				<th> HOSTNAME </th>
				<th> PASSWORD </th>
				<th> CEDULA </th>
				<th> ACCIONES </th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row_DatosUG=pg_fetch_array($obtenerDatosUG, null, PGSQL_ASSOC)) {
			echo "
			<tr>
				<td>".$row_DatosUG['hostname']."</td>
				<td>".$row_DatosUG['passw']."</td>
				<td>".$row_DatosUG['cedula_rif']."</td>
				<td>
					<a href='eliminarUser.php?ced=".$row_DatosUG['cedula_rif']."'>Eliminar </a>
					<a href='modifUser.php?ced=".$row_DatosUG['cedula_rif']."'>Modificar </a>
				</td>
			</tr>";
			}?>
		</tbody>
	</table>
	</div>

	<div class="registrados">
	<table border="2">
		<caption>Usuarios Mantenimiento</caption>
		<thead>
			<tr>
				<th> HOSTNAME </th>
				<th> PASSWORD </th>
				<th> CEDULA </th>
				<th> ACCIONES </th>
			</tr>

		</thead>
		<tbody>
			<?php while ($row_DatosUM=pg_fetch_array($obtenerDatosUM, null, PGSQL_ASSOC)) {
			echo "
			<tr>
				<td>".$row_DatosUM['hostname']."</td>
				<td>".$row_DatosUM['passw']."</td>
				<td>".$row_DatosUM['cedula_rif']."</td>
				<td>
					<a href='eliminarUser.php?ced=".$row_DatosUM['cedula_rif']."'>Eliminar </a>
					<a href='modifUser.php?ced=".$row_DatosUM['cedula_rif']."'>Modificar </a>
				</td>
			</tr>";
			}?>
		</tbody>
	</table>
	</div><br><br>

	<p><b>MODIFICAR ELIMINAR CATEGORIAS</b><br></p>

<center>
<form action="ModDel.php" method="POST">
<table >
	<thead>
		<tr>
			<td><h4>ID</h4></td>
			<td><h4>Categorias</h4></td>
			<td><h4>Nuevo Valor</h4></td>
			<td><h4>Ejecucion</h4></td>
	</thead>
	<tbody>
			<?php 
			echo "<tr>";
			echo "<td><select name='id' id='id1'><option>1</option></select></td>";
				echo "<td>
						<select name='categ1'>";
							echo "<option></option>";
						while ($row_item = pg_fetch_array($item, null, PGSQL_ASSOC)) 
						{
							echo "<option>".$row_item['item1']."</option>";
						}

					echo "</select>";
				echo "</td>";
				echo "<td><input type='text' name='valor1' ></td>";
				echo "<td>
						<select name='accion1'>
							<option ></option>
							<option >INSERTAR</option>
							<option >MODIFICAR</option>
							<option >ELIMINAR</option>
						</select>
					</td>";
			echo "</tr>";
			?>
	</tbody>
</table>
<br>
	<tr>
		<td><input type="submit" name="enviar" value="Enviar"></td>
		<td><input type="reset" name="borrar" value="Borrar"></td>
	</tr>
</form>
</center><br><br>


 <p><b>MODIFICAR ELIMINAR COSTO DEL PLAN</b><br></p>

<center>
<table border="2" class="vista">
	<thead>
		<tr>
			<td><h4>Planes</h4></td>
			<td><h4>Costo Actual</h4></td>
	</thead>
	<tbody>
			<?php
				while ($row_vista = pg_fetch_array($vista, null, PGSQL_ASSOC)) 
				{
					echo "<tr>";
						echo "<td>".$row_vista['plan']."</td>";
						echo "<td>".$row_vista['costo_unitario']." Bsf.</td>";
					echo "</tr>";
				}
			?>
	</tbody>
</table>
</center><br>

<center>
<form action="ModDel.php" method="POST">
<table>
	<thead>
		<tr>
			<td><h4>ID</h4></td>
			<td><h4>Planes</h4></td>
			<td><h4>Nuevo Costo</h4></td>
			<td><h4>Ejecucion</h4></td>
	</thead>
	<tbody>
	<?php 
	echo "<tr>";
		echo "<td><select name='id' id='id1'><option>2</option></select></td>";
		echo "<td>
				<select name='plan'>";
					echo "<option></option>";
				while ($row_item1 = pg_fetch_array($item1, null, PGSQL_ASSOC)) 
				{
					echo "<option>".$row_item1['plan']."</option>";
				}

			echo "</select>";
		echo "</td>";
		echo "<td><input type='text' name='valor2' ></td>";
		echo "<td>
				<select name='accion2'>
					<option ></option>
					<option >MODIFICAR</option>
					<option >ELIMINAR</option>
				</select>
			</td>";

	echo "</tr>";

	?>
	</tbody>
</table>
<br>
	<tr>
		<td><input type="submit" name="enviar" value="Enviar"></td>
		<td><input type="reset" name="borrar" value="Borrar"></td>
	</tr>
</form>
</center><br><br>

</body>
</html>