<?php 
require('conexion1.php');
$cedElim = $_GET['ced'];

$eliminando = pg_query("DELETE FROM usuarios WHERE cedula_rif='1234567'");

echo "<html>
			<head>
				<meta http-equiv='REFRESH' content='0 ; url=SesionUser.php'>
				<script>
					alert('BORRADO Usuario con CI ".$cedElim."');
				</script>
			</head>
	</html>
";

 ?>