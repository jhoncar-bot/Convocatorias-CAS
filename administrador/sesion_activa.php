<?php
session_start();
$nombre=$_SESSION['nombre'];
if(!isset($_SESSION['id'])){
	header("Location: login.php");
}
?>