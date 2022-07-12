<?php 

try {

	
	$bd =  new PDO ( "pgsql:host=localhost dbname=bdescolar user=postgres password=Culiacan10");

} catch (Exception $e) {
	echo "Problema con la conexion: ".$e->getMessage();
}
?>