<?php 

require('conexion1.php');

$hostname = $_POST['hostname'];
$password = $_POST['password'];

$Verf_USerUSer = pg_query("SELECT *FROM user_user 
	WHERE hostname='$hostname' AND passw='$password'");
$Verf_User_manten = pg_query("SELECT *FROM user_mantenimiento 
	WHERE hostname='$hostname' AND passw='$password'");
$Verf_User_gerente = pg_query("SELECT *FROM user_gerente 
	WHERE hostname='$hostname' AND passw='$password'");
$Verf_User_compra = pg_query("SELECT *FROM user_compra 
	WHERE hostname='$hostname' AND passw='$password'");

if ($row_USerUSer = pg_fetch_array($Verf_USerUSer, null, PGSQL_ASSOC)) 
{ ////INICIO if ($row_USerUSer = pg_fetch_array($Verf_USerUSer, null, PGSQL_ASSOC))
	$obtenerCed = $row_USerUSer['cedula_rif'];
	$iniciarSesion = pg_query("INSERT INTO sesion_on_off(statud, cedula_rif) 
								VALUES ('ON', '$obtenerCed');");
	echo " <html>
				<head>
					<meta http-equiv='REFRESH' content='0 ; url=SesionUser.php'>
					<meta content='0 '>
					<script>
						alert('".$hostname." Sesion Iniciada Correctamente');
					</script>
				</head>
			</html>
	";
	
}////FIN if ($row_USerUSer = pg_fetch_array($Verf_USerUSer, null, PGSQL_ASSOC))
else
{
	if ($row_User_manten = pg_fetch_array($Verf_User_manten, null, PGSQL_ASSOC)) 
	{ ////INICIO if ($row_User_manten = pg_fetch_array($Verf_User_manten, null, PGSQL_ASSOC))
		$obtenerCed = $row_User_manten['cedula_rif'];
		$iniciarSesion = pg_query("INSERT INTO sesion_on_off(statud, cedula_rif) 
								VALUES ('ON', '$obtenerCed');");
		echo " <html>
				<head>
					<meta http-equiv='REFRESH' content='0 ; url=SesionMant.php'>
					<meta content='0 '>
					<script>
						alert('".$hostname." Sesion Iniciada Correctamente');
					</script>
				</head>
			</html>
		";

	}////FIN if ($row_User_manten = pg_fetch_array($Verf_User_manten, null, PGSQL_ASSOC))
	else
	{
		if ($row_User_gerente = pg_fetch_array($Verf_User_gerente, null, PGSQL_ASSOC)) 
		{///INICIO if ($row_User_gerente = pg_fetch_array($Verf_User_gerente, null, PGSQL_ASSOC))
			$obtenerCed = $row_User_gerente['cedula_rif'];
			$iniciarSesion = pg_query("INSERT INTO sesion_on_off(statud, cedula_rif) 
								VALUES ('ON', '$obtenerCed');");
			echo " <html>
				<head>
					<meta http-equiv='REFRESH' content='0 ; url=SesionGert.php'>
					<meta content='0 '>
					<script>
						alert('".$hostname." Sesion Iniciada Correctamente');
					</script>
				</head>
			</html>
			";

		}///FIN if ($row_User_gerente = pg_fetch_array($Verf_User_gerente, null, PGSQL_ASSOC))
		else
		{
			if ($row_User_compra = pg_fetch_array($Verf_User_compra, null, PGSQL_ASSOC)) 
			{//INICIO if ($row_User_compra = pg_fetch_array($Verf_User_compra, null, PGSQL_ASSOC))
				$obtenerCed = $row_User_compra['cedula_rif'];
				$clase = $row_User_compra['clase'];
				$iniciarSesion = pg_query("INSERT INTO sesion_on_off(statud, cedula_rif) 
								VALUES ('ON', '$obtenerCed');");
				
				if($clase=="COMPRADOR"){
					echo "<html>
							<head>
								<meta http-equiv='REFRESH' content='0 ; url=SesionComp.php'>
								<meta content='0 '>
								<script>
									alert('".$hostname." Sesion Iniciada Correctamente');
								</script>
							</head>
						</html>
					";
				}

				if($clase=="VENDEDOR"){
					echo "<html>
							<head>
								<meta http-equiv='REFRESH' content='0 ; url=SesionVend.php'>
								<meta content='0 '>
								<script>
									alert('".$hostname." Sesion Iniciada Correctamente');
								</script>
							</head>
						</html>
					";
				}

			}///FIN if ($row_User_compra = pg_fetch_array($Verf_User_compra, null, PGSQL_ASSOC))
			else
			{
				echo "<html>
						<head>
							<meta http-equiv='REFRESH' content='0 ; url=iniciarSesion.php'>
							<meta content='0 '>
							<script>
								alert('Error Datos Invalidos Contrase#a O Usuario Invalidos');
							</script>
						</head>
					</html>
				";
			}
		}
	}
}

 ?>