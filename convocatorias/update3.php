<?php
	
	require 'conexion.php';
	session_start();
	error_reporting(0);
	$varsesion = $_SESSION['usuario'];
	if($varsesion == null || $varsesion = ''){
		header("location:index.html");
	}
	$id = $_POST['id'];
    
    $entrevista = $_POST['entrevista'];


   
    
    $estado = $_POST['estado']; 
    $info3 = $_POST['info3'];
	$categoria3 = $_POST['categoria3'];

	$sql = "UPDATE persona SET estado='$estado', nombre_archivo3='$entrevista' , INFO3='$info3', categoria3='$categoria3' WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
    $id_insert = $id;
	
    if($resultado){

           echo "<script> alert('correcto');
            location.href = 'panel.php';
           </script>";
        
        }else{
            echo "Error: " . "<br>" . mysqli_error($mysqli);
        } 
	
?>

