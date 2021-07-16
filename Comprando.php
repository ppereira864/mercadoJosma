<?php 
require('conexion1.php');

$dispon = $_GET['dispon'];
$id = $_GET['id'];
$cantAcomp = $_POST['cantAcomp'];
$fecha = date("j/n/Y");

$Verif_Sesion = pg_query("SELECT *FROM sesion_on_off");
$row = pg_fetch_array($Verif_Sesion, NULL, PGSQL_ASSOC);
$ced = $row['cedula_rif'];

$ver_User_comp = pg_query("SELECT *FROM user_compra WHERE cedula_rif='$ced'");
$row_ver_User_comp = pg_fetch_array($ver_User_comp, NULL, PGSQL_ASSOC);
$clase = $row_ver_User_comp['clase'];

$ver_Usuario = pg_query("SELECT *FROM usuarios WHERE cedula_rif='$ced'");
$row_ver_Usuario = pg_fetch_array($ver_Usuario, NULL, PGSQL_ASSOC);
$correo = $row_ver_Usuario['email'];

$ver_Venta = pg_query("SELECT *FROM ventas WHERE id='$id'");
$row_ver_Venta = pg_fetch_array($ver_Venta, NULL, PGSQL_ASSOC);

$categ = $row_ver_Venta['categoria'];
$nom_articulo = $row_ver_Venta['nom_articulo'];
$precio = $row_ver_Venta['precio'] * $cantAcomp;
$forma_pago = $row_ver_Venta['forma_pago'];
$cuenta = $row_ver_Venta['cuenta'];

$valor = $dispon - $cantAcomp;

if ($clase =="COMPRADOR") {
	

		if ($cantAcomp <= 0 OR $cantAcomp > $dispon) {
		echo "<html>
				<head>
					<meta http-equiv='REFRESH' content='0 ; url=INDEX.php'>
					<script>
						alert('ERROR!!! Cantidad No disponible');
					</script>
				</head>
			</html>
		";
		}else{
?>
		<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Correo Confirmacion</title>
	
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

		<link rel="stylesheet" type="text/css" href="CSS/bootstrap.css">
		
		<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
		<!--
			function hora(){
				var tiempo    = new Date();
				var hora, cad ="";
				with (tiempo){
				hora = getHours();
				cad += hora + ":" + getMinutes()+":"+getSeconds();
				}
				return cad;
			}
		// -->
		</SCRIPT>

	<style>
		
		.divImg1{
		width: 70px;
		height: 75px;
		border-radius: 500px;
		background: pink;
		padding: 5px;
		margin-top: 60px;
		margin-bottom: 30px;
		}
		
		.lab1{
		font-size:  18px;
		}
		
		.lab2{
		font-size: 12px;
		}
		
		.lab3{
		font-size: 10px;
		}
		
		.div1Email{
		margin: 10px;
		padding-left: 900px;
		}
		
		.div1Email img{
		width: 50px;
		}

		.msj h1{
			padding-left: 300px;
		}

		.msj h2{
			margin: 5px;
			padding-left: 300px;
			color: gray;
		}

		.msj label{
			margin: 5px;
			padding-left: 250px;
		}

		.msj label h4{
			margin: 5px;
			padding-left: 70px;
		}
	</style>

</head>

<body>
<div class="div1Email">
	<img src="imagenes/email-1.png">	
</div>

<hr>
	<table>
		<thead>
			<tr>
				<th>
					<img class="divImg1" src="imagenes/logo.png">
				</th>
				<th>
					<label class="lab1"> Compra&Ventas_JP&RC</label><br>
					<label class="lab2"> para mi</label>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th></th>
				<th>
					<label class="lab3">De:   Compra&Ventas_JP&RC Team 
					<a >info@Compra&Ventas_JP&RC.com</a></label><br>
					<label class="lab3">Para: <?php echo $correo; ?></label><br>
					<label class="lab3">Fecha: <?php echo $fecha." ";?>
							<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
							<!--  
							document.write(hora());   
							-->
							</SCRIPT>
					</label>
				</th>
			</tr>
		</tbody>
	</table>

	<div class="msj">
		<h1>Compra&Ventas_JP&RC</h1>
		<h2>Confirmacion De Compra</h2>
		<label>hola</label><br>
		<label >Gracias por Comprar Articulos En Compra&Ventas_JP&RC</label><br>
		<label>Para Hacer La Compra SASTIFACTORIA hacer CLICK en el siguiente enlace:</label>
		<br><label><a href="compraSact.php?
		id=<?php echo $id; ?>&valor=<?php echo $valor; ?>&arti=<?php echo $nom_articulo; ?>&
		cantA=<?php echo $cantAcomp; ?>&prect=<?php echo $precio; ?>&formPag=<?php echo $forma_pago; ?>&categ=<?php echo $categ; ?>">https://perfil.Compra&Ventas_JP&RC.es/activate/sdjskdjksdmnKJNSlksdlSSJSKsksMDK
		<br>DKmddkKLDKDsssSKSSskdkSKmm</a></label>
		<label>Si despues de hacer click el enlace parece roto, por favor copielo en la ventana</label>
		<br><label>de tu navegador.</label><br>
		<label>Usted a Realizado La Compra De:</label><br>
		<label>Articulo: <?php echo $nom_articulo; ?></label><br>
		<label>Cantidad: <?php echo $cantAcomp; ?></label><br>
		<label>Precio Total: <?php echo $precio; ?></label><br>
		<label>Forma De Pago: <?php echo $forma_pago; ?></label><br>
		<label>NRo De Cuenta: <?php echo $cuenta; ?></label><br>
		<label>Si necesita contactanos puedes hacerlo en esta dirrecion de correo<br><a >info@Compra&Ventas_JP&RC.com</a></label><br>
		<label>Si no quieres recibir mas correos, por favor modifica tus opciones de usuario.</label><br><br><hr>
		<label><h4>Copyright (c) 2015-2017 Graphic Resources LLC.</h4></label>
	</div>
		
</body>

</html>


<?php
			
		}
}else{
	echo "<html>
			<head>
				<meta http-equiv='REFRESH' content='0 ; url=INDEX.php'>
				<script>
					alert('Debe Poseer Una Cuenta De Comprador');
				</script>
			</head>
		</html>";
}

 ?>