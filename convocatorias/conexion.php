<?php
	
	$mysqli = new mysqli('localhost', 'etebes_joomleteb', 'joomla2021et', 'etebes_prueba');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
?>