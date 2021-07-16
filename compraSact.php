<?php 
require('conexion1.php');

$fecha = date("j/n/Y");

$id = $_GET['id'];
$valor = $_GET['valor'];
$arti = $_GET['arti'];
$cantA = $_GET['cantA'];
$prect = $_GET['prect'];
$formPag = $_GET['formPag'];
$categ = $_GET['categ'];


//// Actualizando articulos disponibles

$actualizando = pg_query("SELECT activar_estado($id,$valor)");

///// Guardando articulo en venta

$insertCompra = pg_query("INSERT INTO compra(id_art, art_comprado, cantidad, prec_total, forma_pago, categoria)
    					VALUES ($id, '$arti', $cantA, $prect, '$formPag', '$categ')");

if ($insertCompra) {
	/* Guardar relacion de usuario en sesion y venta en Realiza */

		/* Buscanndo cedula del Usuario que inicio sesion de compra
			 para luego buscar Hostname y id  */

			$cedulaSesion = pg_query("SELECT *FROM sesion_on_off ");
			$row_cedulaSesion = pg_fetch_array($cedulaSesion, null, PGSQL_ASSOC);
			$cedula = $row_cedulaSesion['cedula_rif'];
			
			/* Obencion del hostname y id */
			$ObenerDatosUC = pg_query("SELECT *FROM user_compra 
			WHERE cedula_rif='$cedula'");
			$row_ODUC = pg_fetch_array($ObenerDatosUC, null, PGSQL_ASSOC);
			$id2 = $row_ODUC['id'];
			$host = $row_ODUC['hostname'];

			/*  Buscamos Id del ultimo articulo Comprado para hacer la relacion
		   con la tabla efectua */

			   $obtenerID = pg_query("SELECT *FROM compra");

			   		while ($row=pg_fetch_array($obtenerID, null, PGSQL_ASSOC)) {
			   			$idComp=$row['id'];
			   		}

			   	$relaEfect = pg_query("INSERT INTO efectua(id_uu, hostname_uu, id_comp, fecha_comp, confirmacion)
    							VALUES ($id2, '$host', $idComp, '$fecha', 'SASTIFACTORIA')");

			   	if ($relaEfect) {
			   		echo "<html>
							<head>
								<meta http-equiv='REFRESH' content='0 ; url=SesionComp.php'>
								<script>
									alert('Gracias Por La Compra!!!!');
								</script>
							</head>
						</html>
					";
			   	}else{
			   		echo "<html>
							<head>
								<meta http-equiv='REFRESH' content='0 ; url=SesionComp.php'>
								<script>
									alert('ERROR!!!! Al Guardar Datos A La BD');
								</script>
							</head>
						</html>
					";
			   	}
}else{

echo "<html>
			<head>
				<meta http-equiv='REFRESH' content='0 ; url=SesionComp.php'>
				<script>
					alert('ERROR!!!! Al Guardar Datos A La BD');
				</script>
			</head>
		</html>
";

}

 ?>