<?php 
require("conexion1.php");

$Verif_Sesion = pg_query("SELECT *FROM sesion_on_off");
$hostname = ""; $cedula_rif = ""; $clip = 'OFF';

if ($row_Sesion=pg_fetch_array($Verif_Sesion, null, PGSQL_ASSOC)) 
{ //// inicio if ($row_Sesion=pg_fetch_array($Verif_Sesion, null, PGSQL_ASSOC))

$statud = $row_Sesion['statud'];
$cedula_rif = $row_Sesion['cedula_rif'];
	
	if ($statud=='ON')
	{ //// inicio if ($statud=='ON')
			$Verf_USerUSer = pg_query("select *from user_user where cedula_rif='$cedula_rif'");
			$Verf_User_manten = pg_query("select *from user_mantenimiento 
											where cedula_rif='$cedula_rif'");
			$Verf_User_gerente = pg_query("select *from user_gerente where cedula_rif='$cedula_rif'");
			$Verf_User_compra = pg_query("select *from user_compra where cedula_rif='$cedula_rif'");

			if ($row_USerUSer = pg_fetch_array($Verf_USerUSer, null, PGSQL_ASSOC)) 
			{ //// inicio if ($row_USerUSer = pg_fetch_array($Verf_USerUSer, null, PGSQL_ASSOC))

				$hostname = $row_USerUSer['hostname'];
				$cedula_rif = $row_USerUSer['cedula_rif'];
				$Tipo_Usuario = "U"; $clip = "ON";
			}//// inicio if ($row_USerUSer = pg_fetch_array($Verf_USerUSer, null, PGSQL_ASSOC))

			if ($row_User_manten = pg_fetch_array($Verf_User_manten, null, PGSQL_ASSOC)) 
			{ //// inicio if ($row_USerUSer = pg_fetch_array($Verf_USerUSer, null, PGSQL_ASSOC))

				$hostname = $row_User_manten['hostname'];
				$cedula_rif = $row_User_manten['cedula_rif'];
				$Tipo_Usuario = "M"; $clip = "ON";
			}//// inicio if ($row_USerUSer = pg_fetch_array($Verf_USerUSer, null, PGSQL_ASSOC))

			if ($row_User_gerente = pg_fetch_array($Verf_User_gerente, null, PGSQL_ASSOC)) 
			{ //// inicio if ($row_USerUSer = pg_fetch_array($Verf_USerUSer, null, PGSQL_ASSOC))

				$hostname = $row_User_gerente['hostname'];
				$cedula_rif = $row_User_gerente['cedula_rif'];
				$Tipo_Usuario = "G"; $clip = "ON";
			}//// inicio if ($row_USerUSer = pg_fetch_array($Verf_USerUSer, null, PGSQL_ASSOC))

			if ($row_User_compra = pg_fetch_array($Verf_User_compra, null, PGSQL_ASSOC)) 
			{ //// inicio if ($row_USerUSer = pg_fetch_array($Verf_USerUSer, null, PGSQL_ASSOC))

				$hostname = $row_User_compra['hostname'];
				$cedula_rif = $row_User_compra['cedula_rif'];
				$clase = $row_User_compra['clase'];
				$Tipo_Usuario = "C"; $clip = "ON";
			}//// inicio if ($row_USerUSer = pg_fetch_array($Verf_USerUSer, null, PGSQL_ASSOC))

	} //// fin if ($statud=='ON')

}  //// fin if ($row_Sesion=pg_fetch_array($Verif_Sesion, null, PGSQL_ASSOC))

$lista = pg_query("SELECT *FROM ventas");
$cont=0;

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>Compra&Ventas_JP&RC</title>

	<META http-equiv=Content-Type content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<link rel="stylesheet" type="text/css" href="CSS/estilopropios.css">
	<link rel="stylesheet" type="text/css" href="CSS/bootstrap.css">
	<script src="js/jquery-3.0.0.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/JSPropio.js" type="text/javascript"></script>

	<style>

		input
        {
            background: url("imagenes/203-earth.png") no-repeat scroll 0 0 transparent;
            border: 1px solid #BFBFBF;
            font-size: 18px;
            color: #000;
            padding: 5px 5px 5px 45px;
            width: 230px;
        }

        input.submit
        {
            width: auto;
            background-position: 4px -91px;
            background-color: #999999;
            color: #FFFFFF;
            cursor: pointer;
            background: linear-gradient(#FFF,pink);
        }

        input.user{ background-position: 4px -21px; }
        input.search{ background-position: 2px 2px; }
        input.password{ background-position: 4px -46px; }
        input.favorite{ background-position: 4px -70px; }
		
		button{
            font: 700 iem Tahoma, Arial, Verdana, sans-serif;
            color: #000; background-color: pink;
            border: 1px solid #0074a5;
            border-top: 1px solid #004370;
            border-left: 1px solid #004370;
            cursor: pointer;
        }

        button{
            width: auto;
            overflow: visible;
            padding: 3px 8px 2px 6px;
        }

        button[type]{
            padding: 4px 8px 4px 10px;
        }
	</style>


</head>

<body class="bodyIndex">

<header>

	<div id="header">
		<ul class="nav">
			<li><a><img src="imagenes/190-menu.png"/> MENU</a>
				<ul>
					<li><a href="INDEX.php"><img src="imagenes/001-home.png" /> Home</a></li>
					<li><a href="InfCont/Contactanos.pdf" target="_blank"><img src="imagenes/269-info.png" /> Info</a></li>
					<li><a href=""><img src="imagenes/069-address-book.png" /> Contactanos</a></li>
				</ul>
			</li>
		</ul>
	</div>

		<div id="header2">
			<a href="registrarUsuario.php">
				<button type="submit"><img src="svg/hierarchical-structure-1.svg" width="60" height="70">
				 <br> Registrarse
				</button>
			</a> || 
			<a href="iniciarSesion.php">
				<button type="submit"><img src="svg/user-1.svg" width="60" height="70">
				 <br>Iniciar Sesion
				</button>
			</a> 
			<?php  	
			if ($clip=='ON') {
				echo " || 
						<a href='cerraSesion.php?cedula_rif=$cedula_rif&hostname=$hostname'>
						<button type='submit'><img src='svg/id-card.svg' width='60' height='70'>
						<br> Cerrar ".$hostname."
						</button>
						</a>";

						if ($Tipo_Usuario=="U") {
							echo "	<a href ='SesionUser.php'>
									<button type='submit'><img src='svg/id-card.svg' width='60' height='70'>
									<br> Home  ".$hostname."
									</button>
									</a>";	
						}

						if ($Tipo_Usuario=="M") {
							echo "	<a href ='SesionMant.php'>
									<button type='submit'><img src='svg/id-card.svg' width='60' height='70'>
									<br> Home  ".$hostname."
									</button>
									</a>";	
						}

						if ($Tipo_Usuario=="G") {
							echo "	<a href ='SesionGert.php'>
									<button type='submit'><img src='svg/id-card.svg' width='60' height='70'>
									<br>Home  ".$hostname."
									</button>
									</a>";	
						}

						if ($Tipo_Usuario=="C") {
								if ($clase=="COMPRADOR") {
									echo "	<a href ='SesionComp.php'>
									<button type='submit'><img src='svg/id-card.svg' width='60' height='70'>
									<br>Home  ".$hostname."
									</button>
									</a>";	
								}

								if ($clase=="VENDEDOR") {
									echo "	<a href ='SesionVend.php'>
									<button type='submit'><img src='svg/id-card.svg' width='60' height='70'>
									<br>Home  ".$hostname."
									</button>
									</a>";
								}	
						}
			}
			?>
		</div>

		<div class="slider">
			<ul>
				<li>
					<img src="imagenes/imagen1.png" width="10" height="250">
				</li>
				<li>
					<img src="imagenes/imagen2.jpg" width="10" height="250">
				</li>
				<li>
					<img src="imagenes/imagen3.jpg" width="10" height="250">
				</li>
			</ul>
		</div>

</header>

<nav>
<center>
<hr class="hr2">
	<div class="DivNavegador">
	<hr class="hr1">
		<form action="busquedad.php" id="BuscarArticulos" method="POST">
			<tr>
				<td>
					<input type="text" name="articuloAbuscar" class="search" 
					placeholder="   Buscar Articulo..."/>
				</td>
			</tr>
				<input type="submit" name="BUSCAR" class="btn-success" value="BUSCAR" />
		</form>
	<hr class="hr1">
	</div>
<hr class="hr2">
</center>
</nav>

<?php
while ($row_lista=pg_fetch_array($lista, NULL, PGSQL_ASSOC)) {

	if ($cont < 3) {

		if ($row_lista['estado'] != "VENDIDO") {
			echo "
				<article>
				<hr>
					<img src='".$row_lista['imagen']."' width='70' height='70'> 
					<h4 style='color:white'>".$row_lista['descripcion']."</h4>
				<hr>
				</article>
			";
			$cont ++;
		}
	}
}
 ?>



</body>


<PRE>
UNIVERSIDAD NACIONAL EXPERIMENTAL DE GUAYANA				    ( @ @ )
CARRERA: ING. INFORMATICA					---------oOOo-(_)-oOOo---------
CATEDRA: BASE DE DATOS I					|		  	      |
PROFESOR: DELFIN CARRET						|    Josmary de pool	      |
								|     Rocielys caceres        |
								|		              |
								-----------------Oooo.---------
									  .oooO  (   )
									  (   )  )  /
								           \  (  (_/
								            \_)
</PRE>



</html>