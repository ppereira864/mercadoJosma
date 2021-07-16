<?php 

require ('conexion1.php');

$Verif_Sesion = pg_query("SELECT *FROM sesion_on_off");

if ($row_Sesion=pg_fetch_array($Verif_Sesion, null, PGSQL_ASSOC)) {

	do {

		$statud = $row_Sesion['statud'];
		$cedula_rif = $row_Sesion['cedula_rif'];
		
		if ($statud=='ON'){
			$Verf_USerUSer = pg_query("select *from user_user where cedula_rif='$cedula_rif'");

			if ($row_USerUSer = pg_fetch_array($Verf_USerUSer, null, PGSQL_ASSOC)) {

				$hostname = $row_USerUSer['hostname'];
				
			}
			else{
				echo " <html>
							<head>
								<meta http-equiv='REFRESH' content='0 ; url=INDEX.php'>
								<script>
								alert('Disculpe Inicie Sesion Como Super Usuario');
								</script>
							</head>
						</html>
				";
			}
		}

	} while ($row_Sesion=pg_fetch_array($Verif_Sesion, null, PGSQL_ASSOC));

}
else
{

echo " <html>
			<head>
				<meta http-equiv='REFRESH' content='0 ; url=INDEX.php'>
				<script>
				alert('Disculpe Inicie Sesion Como Super Usuario');
				</script>
			</head>
		</html>
";

}

 ?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>REGISTRAR NUEVO USUARIO</title>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<link rel="stylesheet" type="text/css" href="CSS/estilopropios.css">
	<link rel="stylesheet" type="text/css" href="CSS/bootstrap.css">
	<script src="js/jquery-3.0.0.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/JSPropio11.js" type="text/javascript"></script>

	<style>
		input, select
        {
            
            border: 2px solid #BFBFBF;
            color: #000;
            padding: 7px 7px 7px 45px;
            width: 230px;
        }

		input.host{ 
			background: url("imagenes/114-user (2).png") no-repeat scroll 0 0 transparent;
			background-position: 4px 4px;
			font-size: 16px;
		}

		input.passw{ 
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
							<a href="INDEX.php"><img src="imagenes/001-home.png" /> Home</a>
						</li>
						<li>
							<a href="InfCont/Contactanos.pdf" target="_blank"><img src="imagenes/269-info.png" /> Info</a>
						</li>
						<li>
							<a href=""><img src="imagenes/069-address-book.png" /> Contactanos</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>

<br>

	
	<center>
	
	<img class="ContainerImg" src="imagenes/114-user.png" alt="founder">
		
		<form  action="RegistrandoUser.php" id="RegistroUser" method="POST" 
				style="background-color:pink; width:40%" onsubmit="return valPassw();">
			
			<table>
				<tr>
					<center>
						<h3>
							Registrar Nuevo Usuario
						</h3>
					</center>
				</tr>
				<hr>

				<tr>
					<td style="color:hsl(2, 57%, 40%)">
						Ingrese Cedula o Rif :
					</td>
					<td>
						<input type="text" name="cedulaOrif" placeholder="CEDULA/RIF....">
					</td>
				</tr>

				<tr>
					<td style="color:hsl(2, 57%, 40%)">
						Ingrese Nombres :
					</td>
					<td>
						<input type="text" name="nombres" placeholder="NOMBRE....">
					</td>
				</tr>

				<tr>
					<td style="color:hsl(2, 57%, 40%)">
						Ingrese Apellidos :
					</td>
					<td>
						<input type="text" name="apellidos" placeholder="APELLIDO....">
					</td>
				</tr>

				<tr>
					<td style="color:hsl(2, 57%, 40%)">
						Ingrese Pais :
					</td>
					<td>
						<input type="text" name="pais" placeholder="PAIS....">
					</td>
				</tr>

				<tr>
					<td style="color:hsl(2, 57%, 40%)">
						Ingrese Estado :
					</td>
					<td>
						<input type="text" name="estado" placeholder="ESTADO....">
					</td>
				</tr>

				<tr>
					<td style="color:hsl(2, 57%, 40%)">
						Ingrese Ciudad :
					</td>
					<td>
						<input type="text" name="ciudad" placeholder="CIUDAD...."></td>
				</tr>

				<tr>
					<td style="color:hsl(2, 57%, 40%)">
						Ingrese Parroquia :
					</td>
					<td>
						<input type="text" name="parroquia" placeholder="PARROQUIA....">
					</td>
				</tr>

				<tr>
					<td style="color:hsl(2, 57%, 40%)">
						Ingrese Dirrecion :
					</td>
					<td>
						<input type="text" name="dirrecion" placeholder="DIRRECION....">
					</td>
				</tr>

				<tr>
					<td style="color:hsl(2, 57%, 40%)">
						Ingrese Email :
					</td>
					<td>
						<input type="email"  name="email" id="email"
						 placeholder=" Example@UI.COM....">
					</td>
				</tr>

				<tr>
					<td style="color:hsl(2, 57%, 40%)">
						Tipo de Usuario :
					</td>
					<td>
						<select name="tipousuario">
							<option ></option>
							<option >USUARIO_COMPRA</option>
							<option >USUARIO_VENTA</option>
							<option >USUARIO_MANTEN</option>
							<option >USUARIO_GERENTE</option>
						</select>
					</td>
				</tr>
			</table>

			<hr>

			<table>
				<tr>
					<td style="color:hsl(2, 57%, 40%)">  
					Hotname :
					</td>
					<td>
						<input type="text" name="hostname" 
						class="host" placeholder="  HOSTNAME....">
					</td>
				</tr>

				<tr>
					<td style="color:hsl(2, 57%, 40%)">  
					Contrase&ntilde;a :
					</td>
					<td>
						<input type="password" name="password" id="password" 
						class="passw" placeholder="    ***********">
					</td>
				</tr>

				<tr>
					<td style="color:hsl(2, 57%, 40%)">  
					Reingrese Contrase&ntilde;a :
					</td>
					<td>
						<input type="password" name="repassword" id="repassword" 
						class="passw" placeholder="    ***********">
					</td>
				</tr>
			</table>
			<br>
			<input type="submit" name="REGISTRAR" value="REGISTRAR">
			<input type="reset" name="borrar" value="BORRAR">
		</form>
	</center>

</body>

</html>