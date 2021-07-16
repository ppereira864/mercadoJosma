<?php 
require('conexion1.php');

$articuloAbuscar = $_POST['articuloAbuscar'];
$entrada = 0;

if ($articuloAbuscar) {
	/*$palabras = explode(" ",$articuloAbuscar);
	$numPalabras = count($palabras);
	echo $numPalabras; */

		$Buscando= pg_query("SELECT *FROM 
								(select *from ventas AS VT join realiza AS RZ on VT.id = RZ.id_vent) AS NUV 
		WHERE nom_articulo LIKE '%$articuloAbuscar%' OR categorias LIKE '%$articuloAbuscar%' 
			OR descripcion LIKE '%$articuloAbuscar%'");
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Busquedad....</title>

	<META http-equiv=Content-Type content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<link rel="stylesheet" type="text/css" href="CSS/estilopropios.css">
	<link rel="stylesheet" type="text/css" href="CSS/bootstrap.css">

	<style>
		article{
			margin: 10px;
			background-color: hsl(1, 57%, 50%);
		}

		article label{
			color: #fff;
		}		

		article h3{
			color: #000;
		}

		h1{
			color: red;
		}

		#CB{
			font-size: 24px;
			color: #000;
		}
	</style>

	<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
		<!--
			function saludar(){
				var dato1 = document.getElementById('cantAcomp').value;
				return cad;
			}
		// -->
		</SCRIPT>
</head>

<body class="bodyIndex">

<div id="header">
		<ul class="nav">
			<li><a><img src="imagenes/190-menu.png"/> MENU</a>
				<ul>
					<li><a href="INDEX.php"><img src="imagenes/001-home.png" /> Home</a></li>
					<li><a href=""><img src="imagenes/269-info.png" /> Info</a></li>
					<li><a href=""><img src="imagenes/069-address-book.png" /> Contactanos</a></li>
				</ul>
			</li>
		</ul>
	</div>

<?php
 
	while ( $row =pg_fetch_array($Buscando, NULL, PGSQL_ASSOC) ) {
		$entrada = $entrada + 1;
		$row['id'];
		$row['nom_articulo'];
		$row['precio'];
		$row['descripcion'];
		$row['imagen'];
		$row['imagen1'];
		$row['imagen2'];
		$row['imagen3'];
		$row['imagen4'];
		$row['imagen5'];
		$row['imagen6'];
		$row['disponible']; $disp=$row['disponible'];
		$row['estado']; 
		$row['hostname_uu'];
		$row['fecha_venta']; 

		if ( $row['estado'] != "VENDIDO") {
		  echo "
		  		<article>
						<label id='CB'>Usuario: </label>
						<label>".$row['hostname_uu']."</label><br>
						<label id='CB'>Imagenes Del Producto </label><br>
						<img src='".$row['imagen']."' width='95' height='95'>
						<img src='".$row['imagen1']."' width='95' height='95'>
						<img src='".$row['imagen2']."' width='95' height='95'>
						<img src='".$row['imagen3']."' width='95' height='95'>
						<img src='".$row['imagen4']."' width='95' height='95'>
						<img src='".$row['imagen5']."' width='95' height='95'>
						<img src='".$row['imagen6']."' width='95' height='95'><br>
						<label id='CB'>Descripcion :</label>
						<label> ".$row['descripcion']."</label><br>
						<label id='CB'>Precio :</label>
						<label> ".$row['precio']." Bsf.</label><br>
						<label id='CB'>Articulo Disponible :</label>
						<label> ".$row['disponible']."</label><br>
						<label id='CB'>Desea Compra </label><br>
						<form action='Comprando.php?dispon=".$row['disponible']."&id=".$row['id']."' method='POST'>
							<input type='number' name='cantAcomp'>
							<input type='submit' name='comprar' value='Comprar'>
						</form><br>
						<label id='CB'>Fecha De Publicacion :</label>
						<label> ".$row['fecha_venta']."</label>
				</article>
				
			";
		}
	}

	if ( $entrada == 0 ) {
		echo "<h1>Lo Siento Articulo No Encontrado</h1>" ;
	}
 ?>

</body>
</html>