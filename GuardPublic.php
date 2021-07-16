<?php 
require('conexion1.php');

$categorias = $_POST['categorias'];
$nom_articulo = $_POST['nom_articulo'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$plan = $_POST['plan'];
$disponible = $_POST['cantid'];
$forma_pago = $_POST['forma_pago'];
$cuenta = $_POST['cuenta'];
$estado = "EN_PROCESO";
$fecha = date("j/n/Y");

$ruta1="imgPosgrestql";
$archivo1=$_FILES['imagen']['tmp_name'];
$nombreArchivo1=$_FILES['imagen']['name'];
move_uploaded_file($archivo1,$ruta1."/".$nombreArchivo1);
$ruta1=$ruta1."/".$nombreArchivo1;

$ruta2="imgPosgrestql";
$archivo2=$_FILES['imagen1']['tmp_name'];
$nombreArchivo2=$_FILES['imagen1']['name'];
move_uploaded_file($archivo2,$ruta2."/".$nombreArchivo2);
$ruta2=$ruta2."/".$nombreArchivo2;

$ruta3="imgPosgrestql";
$archivo3=$_FILES['imagen2']['tmp_name'];
$nombreArchivo3=$_FILES['imagen2']['name'];
move_uploaded_file($archivo3,$ruta3."/".$nombreArchivo3);
$ruta3=$ruta3."/".$nombreArchivo3;

$ruta4="imgPosgrestql";
$archivo4=$_FILES['imagen3']['tmp_name'];
$nombreArchivo4=$_FILES['imagen3']['name'];
move_uploaded_file($archivo4,$ruta4."/".$nombreArchivo4);
$ruta4=$ruta4."/".$nombreArchivo4;

$ruta5="imgPosgrestql";
$archivo5=$_FILES['imagen4']['tmp_name'];
$nombreArchivo5=$_FILES['imagen4']['name'];
move_uploaded_file($archivo5,$ruta5."/".$nombreArchivo5);
$ruta5=$ruta5."/".$nombreArchivo5;

$ruta6="imgPosgrestql";
$archivo6=$_FILES['imagen5']['tmp_name'];
$nombreArchivo6=$_FILES['imagen5']['name'];
move_uploaded_file($archivo6,$ruta6."/".$nombreArchivo6);
$ruta6=$ruta6."/".$nombreArchivo6;

$ruta7="imgPosgrestql";
$archivo7=$_FILES['imagen6']['tmp_name'];
$nombreArchivo7=$_FILES['imagen6']['name'];
move_uploaded_file($archivo7,$ruta7."/".$nombreArchivo7);
$ruta7=$ruta7."/".$nombreArchivo7;

///// Guardando articulo en venta

if ($disponible <=0) {
	echo "<html>
				<head>
					<meta http-equiv='REFRESH' content='0 ; url=SesionVend.php'>
					<script>
						alert('ERROR!!!! Cantidad A Vender <= 0');
					</script>
				</head>
		</html>
	";
}else{

$inserVenta = pg_query("INSERT INTO ventas(categorias, nom_articulo, precio, descripcion, imagen, imagen1, 
            imagen2, imagen3, imagen4, imagen5, imagen6, disponible, estado, forma_pago, cuenta)

    VALUES ('$categorias', '$nom_articulo', '$precio', '$descripcion', '$ruta1', 
    '$ruta2', 
    '$ruta3', 
    '$ruta4', 
    '$ruta5', 
    '$ruta6', 
    '$ruta7', 
    $disponible, 
    '$estado', 
    '$forma_pago', 
    '$cuenta')");



if ($inserVenta) {
	
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
		$id = $row_ODUC['id'];
		$host = $row_ODUC['hostname'];

		/*  Buscamos Id del ultimo articulo guardado para hacer la relacion
		   con la tabla realiza */
		   $obtenerID = pg_query("SELECT *FROM ventas");

		   		while ($row=pg_fetch_array($obtenerID, null, PGSQL_ASSOC)) {
		   			$idVenta=$row['id'];
		   		}

		   	$relacionRealiza = pg_query("INSERT INTO realiza(id_uu, hostname_uu, id_vent, 
		   		fecha_venta, tipo_plan) VALUES ('$id', '$host', '$idVenta', '$fecha', '$plan');");

		   	if ($relacionRealiza) {
		   		echo "<html>
						<head>
							<meta http-equiv='REFRESH' content='0 ; url=SesionVend.php'>
							<script>
								alert('REGISTRO Sastifactorio!!!!');
							</script>
						</head>
					</html>
				";
		   	}else{
		   		echo "<html>
						<head>
							<meta http-equiv='REFRESH' content='0 ; url=SesionVend.php'>
							<script>
								alert('1ERROR!!!! Al Guardar Datos A La BD');
							</script>
						</head>
					</html>
				";
		   	}


}else{

echo "<html>
			<head>
				<meta http-equiv='REFRESH' content='0 ; url=SesionVend.php'>
				<script>
					alert('2ERROR!!!! Al Guardar Datos A La BD');
				</script>
			</head>
		</html>
";

}

}
 ?>