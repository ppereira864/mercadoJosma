<?php 
require('conexion1.php');

$cedulaSesion = pg_query("SELECT *FROM sesion_on_off ");
$row_cedulaSesion = pg_fetch_array($cedulaSesion, null, PGSQL_ASSOC);
$cedula = $row_cedulaSesion['cedula_rif'];

$ObenerDatosUM = pg_query("SELECT *FROM user_mantenimiento 
	WHERE cedula_rif='$cedula'");
$row_ObenerDatosUM = pg_fetch_array($ObenerDatosUM, null, PGSQL_ASSOC);


$ObenerDatosUU = pg_query("SELECT *FROM user_user 
	WHERE cedula_rif='$cedula'");
$row_ObenerDatosUU = pg_fetch_array($ObenerDatosUU, null, PGSQL_ASSOC);

if ($row_ObenerDatosUM) {
	$url="SesionMant.php";
}

if ($row_ObenerDatosUU) {
	$url="SesionUser.php";
}

$id = $_POST['id'];

if ($id == "1" AND ($row_ObenerDatosUM OR $row_ObenerDatosUU)) {
	$categ1 = $_POST['categ1'];
	$valor1 = $_POST['valor1'];
	$accion1 = $_POST['accion1'];


	if ( $accion1 == "INSERTAR" AND $valor1 !="" ){

		$insertar = pg_query("INSERT INTO tipos_categ(item1) VALUES ('$valor1')");

			if ($insertar) {
				echo "<html>
						<head>
							<meta http-equiv='REFRESH' content='0 ; url=".$url."'>
							<script>
								alert('REGISTRO Sastifactorio!!!!');
							</script>
						</head>
					</html>";
			}else{
				echo "<html>
						<head>
							<meta http-equiv='REFRESH' content='0 ; url=".$url."'>
							<script>
								alert('ERROR!!!! Al Registrar A La BD');
							</script>
						</head>
					</html>";
			}
	}else{
		$inser1 = 1;
	}

	if ($accion1 == "MODIFICAR" AND $categ1 !="" AND $valor1=!"" ){
		$modificar = pg_query("UPDATE tipos_categ SET item1='$valor1' WHERE item1='$categ1'");

			if ($modificar) {
				echo "<html>
						<head>
							<meta http-equiv='REFRESH' content='0 ; url=".$url."'>
							<script>
								alert('ACTUALIZACION Sastifactoria!!!!');
							</script>
						</head>
					</html>";
			}else{
				echo "<html>
						<head>
							<meta http-equiv='REFRESH' content='0 ; url=".$url."'>
							<script>
								alert('ERROR!!!! Al Acualizar Categoria.');
							</script>
						</head>
					</html>";
			}
	}else{
		$modf1 = 1;
	}

	if ($accion1 == "ELIMINAR" AND $categ1 !=""){
		$eliminar = pg_query("DELETE FROM tipos_categ WHERE item1='$categ1'");

			if ($eliminar) {
				echo "<html>
						<head>
							<meta http-equiv='REFRESH' content='0 ; url=".$url."'>
							<script>
								alert('ELIMINACION Sastifactoria!!!!');
							</script>
						</head>
					</html>";
			}else{
				echo "<html>
						<head>
							<meta http-equiv='REFRESH' content='0 ; url=".$url."'>
							<script>
								alert('ERROR!!!! Al Eliminar Categoria.');
							</script>
						</head>
					</html>";
			}
	}else{
		$elim1 = 1;
	}

	
	if( ($inser1 == 1) OR ($modf1 == 1) OR ($elim1 == 1) ){
	echo "<html>
			<head>
				<meta http-equiv='REFRESH' content='0 ; url=".$url."'>
				<script>
					alert('ERROR!!!! Categorias=NULL OR Nuevo Valor=NULL OR Ejecucion=NULL ');
				</script>
			</head>
		</html>";
	}

}

if ($id == "2" AND ($row_ObenerDatosUM OR $row_ObenerDatosUU)) {

	$plan = $_POST['plan'];
	$valor2 = $_POST['valor2'];
	$accion2 = $_POST['accion2'];
	

	if ($accion2 == "MODIFICAR" AND $plan !="" AND $valor2=!"" ) {
		$modificar = pg_query("UPDATE tipo_plan SET costo_unitario=$valor2 WHERE plan='$plan'");

		if ($modificar) {
			echo "<html>
					<head>
						<meta http-equiv='REFRESH' content='0 ; url=".$url."'>
						<script>
							alert('ACTUALIZACION Sastifactoria!!!!');
						</script>
					</head>
				</html>";
		}else{
			echo "<html>
					<head>
						<meta http-equiv='REFRESH' content='0 ; url=".$url."'>
						<script>
							alert('ERROR!!!! Al Acualizar Costo De Plan.');
						</script>
					</head>
				</html>";
		}
	}else{
		$modf2 = 1;
	}

	if ($accion2 == "ELIMINAR" AND $plan !="" ){
		$eliminar = pg_query("DELETE FROM tipo_plan WHERE plan='$plan'");

			if ($eliminar) {
				echo "<html>
						<head>
							<meta http-equiv='REFRESH' content='0 ; url=".$url."'>
							<script>
								alert('ELIMINACION Sastifactoria!!!!');
							</script>
						</head>
					</html>";
			}else{
				echo "<html>
						<head>
							<meta http-equiv='REFRESH' content='0 ; url=".$url."'>
							<script>
								alert('ERROR!!!! Al Eliminar Plan.');
							</script>
						</head>
					</html>";
			}
	}else{
		$elim2 = 1;
	}


	if ($modf2 == 1 OR $elim2 == 1) {
	echo "<html>
			<head>
				<meta http-equiv='REFRESH' content='0 ; url=".$url."'>
				<script>
					alert('ERROR!!!! Planes=NULL, Nuevo Costo=NULL.');
				</script>
			</head>
		</html>";
	}

}



 ?>