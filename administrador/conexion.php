<?php 
	$servername="localhost";
	$username="root";
	$password="";
	$db="convocatorias";
	$conn=new mysqli($servername,$username,$password,$db);
	if($conn->connect_error){
		die("conecion faliida: " .$conn->connect_error);
	}
?>