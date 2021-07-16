<?php 
/*
setlocale(LC_TIME,"es_ES");

echo strftime("hoy es %A y son las %H:%M");
echo strftime("El Año es %Y y el mes es %B");*/
$fecha = date("j/n/Y");
$hora = date("H:i:s");
$correo = $_GET['correo'];
$host = $_GET['host'];
$passw = $_GET['passw'];
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
			function saludar(){
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
		padding-left: 1200px;
		}
		
		.div1Email img{
		width: 50px;
		}

		.msj h1{
			padding-left: 450px;
		}

		.msj h2{
			margin: 5px;
			padding-left: 550px;
			color: gray;
		}

		.msj label{
			margin: 5px;
			padding-left: 400px;
		}

		.msj label h4{
			margin: 5px;
			padding-left: 250px;
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
							document.write(saludar());   
							-->
							</SCRIPT>
					</label>
				</th>
			</tr>
		</tbody>
	</table>

	<div class="msj">
		<h1>Compra&Ventas_JP&RC</h1>
		<h2>Activa tu cuenta</h2>
		<label>hola</label><br>
		<label >gracias por registrarte en Compra&Ventas_JP&RC</label><br>
		<label>Para completar el registro tienes que hacer clic en el siguiente enlace:</label>
		<br><label><a href="mensajeRegSact.php">https://perfil.Compra&Ventas_JP&RC.es/activate/sdjskdjksdmnKJNSlksdlSSJSKsksMDK
		<br>DKmddkKLDKDsssSKSSskdkSKmm</a></label>
		<label>Si despues de hacer click el enlace parece roto, por favor copielo en la ventana</label>
		<br><label>de tu navegador.</label><br>
		<label>Estos son tus datos de acceso a la web:</label><br>
		<label>Usuarios: <?php echo $host; ?></label><br>
		<label>Contraseña: <?php echo $passw; ?></label><br>
		<label>Si necesita contactanos puedes hacerlo en esta dirrecion de correo<br><a >info@Compra&Ventas_JP&RC.com</a></label><br>
		<label>Si no quieres recibir mas correos, por favor modifica tus opciones de usuario.</label><br><br><hr>
		<label><h4>Copyright (c) 2015-2017 Graphic Resources LLC.</h4></label>
	</div>
		
</body>

</html>
