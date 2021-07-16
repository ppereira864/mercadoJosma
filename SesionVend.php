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

/*
SELECT  NN.id_UU , NN.hostname_UU, NN.id_Vent, VT.nom_articulo, VT.categorias, VT.imagen
FROM ventas AS VT JOIN 
(SELECT RZ.id_UU , RZ.hostname_UU , RZ.id_Vent
FROM user_compra AS UC JOIN realiza AS RZ
ON (UC.hostname='rogxana91' AND RZ.hostname_UU='rogxana91')) AS NSC 
ON (VT.id = NN.id_Vent);
 */

$ArtPubl = pg_query("SELECT  
	*FROM ventas AS VT JOIN (SELECT RZ.id_UU , RZ.hostname_UU , RZ.id_Vent
FROM user_compra AS UC JOIN realiza AS RZ
ON (UC.hostname='$row_host' AND RZ.hostname_UU='$row_host')) AS NN 
ON (VT.id = NN.id_Vent);");


$categoria = pg_query("SELECT *FROM tipos_categ");
$planes = pg_query("SELECT *FROM tipo_plan");

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
	<script src="js/jquery-3.0.0.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/JSPropio3.js" type="text/javascript"></script>

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

		.publicacion{
			margin: 10PX 40px;
		}

		.publicacion table{
			background-color: pink;
			color: hsl(2, 57%, 40%);
		}

		.publicados{
			margin: 10px;
			padding-left: 250px;
		}

		.publicados table{
			background-color: pink;
		}

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

	<p><b>ARICULOS PUBLICADOS POR <?php echo $row_host; ?></b><br></p>

	<div class="publicados">
		<table border="2">
			<thead>
				<tr>
					<th>Categoria Articulo</th>
					<th>Nombre Articulo</th>
					<th>Disponibilida</th>
					<th>Imagen 1</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($row_ArtPubl=pg_fetch_array($ArtPubl, null, PGSQL_ASSOC)) {
			echo "
			<tr>
				<td>".$row_ArtPubl['categorias']."</td>
				<td>".$row_ArtPubl['nom_articulo']."</td>
				<td>".$row_ArtPubl['disponible']."</td>
				<td><img src='".$row_ArtPubl['imagen']."' width='150' height='100'></td>
			</tr>";
			}?>
			</tbody>
		</table>
	</div>

	<p><b>PUBLICAR ARTICULO</b><br></p>

	<div class="publicacion">
	<form action="GuardPublic.php" method="POST" id="GuardPublic" enctype="multipart/form-data">
		<table border="4">
			<thead>
				<tr>
					<th>Categoria  :</th>
					<td><select name="categorias">
							<option ></option>
							<?php 
								while ($row_Catg = pg_fetch_array($categoria, null, PGSQL_ASSOC)) 
								{
									echo "<option>".$row_Catg['item1']."</option>";
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<th>Nombre Articulo :</th>
					<td><input type="text" name="nom_articulo"></td>
				</tr>
				<tr>
					<th>Precio :</th>
					<td><input type="number" name="precio"></td>
				</tr>
				<tr>
					<th>Descripcion :</th>
					<td><textarea cols="30" rows="5" name="descripcion">
					</textarea></td>
				</tr>
				<tr>
					<th> Tipo De Plan  :</th>
					<td><select name="plan">
							<option ></option>
							<?php
								while ($row_planes = pg_fetch_array($planes, null, PGSQL_ASSOC)) 
								{
									echo "<option>Plan ".$row_planes['plan']."</option>";
								} 
							?>
						</select>
					</td>
				</tr>
				<tr>
					<th> Cantidad DE Articulo  :</th>
					<td>
						<input type="number" name="cantid" value="">
					</td>
				</tr>
				<tr>
					<th> Forma De Pago  :</th>
					<td>
						<select name="forma_pago">
							<option ></option>
							<option >Deposito</option>
							<option >Transferencia</option>
							<option >En Persona</option>
						</select>
					</td>
				</tr>
				<tr>
					<th> Nro De Cuenta  :</th>
					<td>
						<input type="text" name="cuenta">
					</td>
				</tr>
				<tr>
					<th>(*) Imagen 1 :</th>
					<td><input type="file" name="imagen" ></td>
				</tr>
				<tr>
					<th> Imagen 2 :</th>
					<td><input type="file" name="imagen1" ></td>
				</tr>
				<tr>
					<th> Imagen 3 :</th>
					<td><input type="file" name="imagen2" ></td>
				</tr>
				<tr>
					<th> Imagen 4 :</th>
					<td><input type="file" name="imagen3" ></td>
				</tr>
				<tr>
					<th> Imagen 5 :</th>
					<td><input type="file" name="imagen4" ></td>
				</tr>
				<tr>
					<th> Imagen 6 :</th>
					<td><input type="file" name="imagen5" ></td>
				</tr>
				<tr>
					<th> Imagen 7 :</th>
					<td><input type="file" name="imagen6" ></td>
				</tr>
			</thead>
		</table><br>
		<input type="submit" name="Guardar" value=" GUARDAR ">
		<input type="reset" name="Borrar" value=" BORRAR ">
	</form>
	</div> 
</body>
 
 </html>