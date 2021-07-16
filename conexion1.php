
<?php 

$dbconn = pg_connect("host=localhost port=5432 dbname='mercado_jos_ros' user='postgres' 
	password='20131425'");

	if(!$dbconn){

		echo "<center><h3 style=color:red>ERROR AL CONECTARSE A LA BASE DE DATOS</h3></center>";
		exit();
	}

?>