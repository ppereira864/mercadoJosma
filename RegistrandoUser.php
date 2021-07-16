<?php 
require('conexion1.php');

$cedulaOrif  = $_POST['cedulaOrif'];
$nombres     = $_POST['nombres'];
$apellidos   = $_POST['apellidos'];
$pais        = $_POST['pais'];
$estado      = $_POST['estado'];
$ciudad      = $_POST['ciudad'];
$parroquia   = $_POST['parroquia'];
$dirrecion   = $_POST['dirrecion'];
$email       = $_POST['email'];
$tipousuario = $_POST['tipousuario'];
$hostname    = $_POST['hostname'];
$password    = $_POST['password'];

/* verificando Hostname que no se repita */

$usuario_on = pg_query("SELECT hostname from user_user where hostname='$hostname'");
$row_usuario_on = pg_fetch_array($usuario_on, null, PGSQL_ASSOC);

if ($row_usuario_on['hostname']==$hostname) {
	require('mensajeVerUser.php');
}
else
{
	$usuario_on = pg_query("SELECT hostname from user_gerente where hostname='$hostname'");
	$row_usuario_on = pg_fetch_array($usuario_on, null, PGSQL_ASSOC);
	
	if ($row_usuario_on['hostname']==$hostname) {
		require('mensajeVerUser.php');
	}
	else
	{
		$usuario_on = pg_query("SELECT hostname from user_mantenimiento where hostname='$hostname'");
		$row_usuario_on = pg_fetch_array($usuario_on, null, PGSQL_ASSOC);

		if ($row_usuario_on['hostname']==$hostname) {
			require('mensajeVerUser.php');
		}
		else
		{
			$usuario_on = pg_query("SELECT hostname from user_compra where hostname='$hostname'");
			$row_usuario_on = pg_fetch_array($usuario_on, null, PGSQL_ASSOC);

			if ($row_usuario_on['hostname']==$hostname) {
				require('mensajeVerUser.php');
			}
			else
			{
				$CoR_on = pg_query("SELECT cedula_rif from usuarios where cedula_rif='$cedulaOrif'");
				$row_CoR_on = pg_fetch_array($CoR_on, null, PGSQL_ASSOC);

				if ($row_CoR_on['cedula_rif']==$cedulaOrif) {
					require('mensajeVerPass.php');
				}
				else
				{
					if ($tipousuario=="USUARIO_COMPRA" || $tipousuario=="USUARIO_VENTA" )
						{ $letra = "C"; }
					if ($tipousuario=="USUARIO_GERENTE"){ $letra = "G"; }
					if ($tipousuario=="USUARIO_MANTEN"){ $letra = "M"; }
					
					$guardarUsuarios = pg_query("SELECT registrar_usuario('$cedulaOrif','$nombres','$apellidos','$pais','$estado','$ciudad','$parroquia','$dirrecion','$email','$letra');");

					if ($tipousuario=="USUARIO_COMPRA"){
						$Clase_user = pg_query("SELECT registrar_user_compra('$hostname','$password','$cedulaOrif','COMPRADOR');");
					}

					if ($tipousuario=="USUARIO_VENTA"){
						$Clase_user = pg_query("SELECT registrar_user_compra('$hostname','$password','$cedulaOrif','VENDEDOR');");
					}

					if ($tipousuario=="USUARIO_GERENTE"){
						$Clase_user = pg_query("SELECT registrar_user_gerente('$hostname','$password','$cedulaOrif');");
					}

					if ($tipousuario=="USUARIO_MANTEN"){
						$Clase_user = pg_query("SELECT registrar_user_mantenimiento('$hostname','$password','$cedulaOrif');");
					}

					if ($guardarUsuarios && $Clase_user ) {
							echo "<html>
									<head>
									   <meta http-equiv='REFRESH' content='0 ; 
									     url=correos.php?correo=$email&host=$hostname&passw=$password'
									</head>
								</html>
							";
					}

				}
			}
		}
	}
}

?>