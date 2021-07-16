<?php 
	require('conexion1.php');

$Verif_Sesion = pg_query("SELECT *FROM sesion_on_off");

if ($row_Sesion=pg_fetch_array($Verif_Sesion, null, PGSQL_ASSOC)) 
{ //// inicio if ($row_Sesion=pg_fetch_array($Verif_Sesion, null, PGSQL_ASSOC))

$statud = $row_Sesion['statud'];
	
	if ($statud=='ON')
	{ //// inicio if ($statud=='ON')
			
		echo " <html>
					<head>
						<meta http-equiv='REFRESH' content='0 ; url=INDEX.php'>
						<meta content='0 '>
						<script>
							alert('Disculpe Ya Existe! Una Sesion Iniciada');
						</script>
					</head>
				</html>
		";

	} //// fin if ($statud=='ON')

}  //// fin if ($row_Sesion=pg_fetch_array($Verif_Sesion, null, PGSQL_ASSOC))


 ?>

 <!DOCTYPE html>
 <html>
 
 <head>
 	<meta charset="utf-8">
 	<title>Iniciando Conexion</title>
 	
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<link rel="stylesheet" type="text/css" href="CSS/estilopropios.css">
	<link rel="stylesheet" type="text/css" href="CSS/bootstrap.css">
	<script src="js/jquery-3.0.0.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/JSPropio2.js" type="text/javascript"></script>

	<style>
		input.submit, .reset
        {
            
            border: 2px solid #BFBFBF;
            color: #000;
            padding: 7px 7px 7px 45px;
            width: 350px;
        }

		input.host{
			border: 2px solid #BFBFBF;
            color: #000;
            padding: 7px 7px 7px 45px;
            width: 230px; 
			background: url("imagenes/114-user (2).png") no-repeat scroll 0 0 transparent;
			background-position: 4px 4px;
			font-size: 16px;
		}

		input.passw{
			border: 2px solid #BFBFBF;
            color: #000;
            padding: 7px 7px 7px 45px;
            width: 230px; 
			background: url("imagenes/142-key.png") no-repeat scroll 0 0 transparent;
			background-position: 5px 5px;
			font-size: 16px;
		}

		input[type="submit"]{
			padding: 7px 7px 7px 12px;
			width: 130px;
		}
        
        input[type="reset"]{
			padding: 7px 7px 7px 12px;
			width: 130px;
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
<br>

	<div class="divFormulario">		
		<center>
			<img class="divImg" src="imagenes/118-user-check.png">
		
		<form action="verrificarUser.php" method="POST" style="background-color:pink; width:100%">
		<table>

			<tr>
				<center>
					<h3>
						Iniciar Seccion
					</h3>
				</center>
			</tr>
			<hr>

			<tr>
				<td style="color:hsl(2, 57%, 40%)">
					Usuario :
				</td>
				<td>
					<input type="text" name="hostname" 
					class="host" placeholder="Usuario">
				</td>
			</tr>

			<tr>
				<td style="color:hsl(2, 57%, 40%)">
					Contrase&ntilde;a :
				</td>
				<td>
					<input type="password" name="password" 
					class="passw" placeholder="********">
				</td>
			</tr>
		</table>
		
		<br> 
		<hr>
		<input type="submit" name="Acceder" value=" INGRESAR ">
		<input type="reset" name="Borrar" value=" BORRAR ">
		<hr>
		<br>
		
		</form>
		</center>
	</div>
<br>


 		
 </body>
 
 </html>