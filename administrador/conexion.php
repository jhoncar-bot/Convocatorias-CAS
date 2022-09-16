<?php
	$servername="localhost";
	$username="root";
	$password="";
	$db="convocatoriasv2";
	$conn=new mysqli($servername,$username,$password,$db);
	$conn->set_charset("utf8");
	if($conn->connect_error){
		die("conecion faliida: " .$conn->connect_error);
	}
?>