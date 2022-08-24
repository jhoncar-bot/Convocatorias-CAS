<?php
	
	$mysqli = new mysqli('localhost', 'root', '', 'convocatorias');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
?>