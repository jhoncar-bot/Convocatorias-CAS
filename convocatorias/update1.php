<?php
	
	require 'conexion.php';
	session_start();
	error_reporting(0);
	$varsesion = $_SESSION['usuario'];
	if($varsesion == null || $varsesion = ''){
		header("location:index.html");
	}
	$id = $_POST['id'];
    
    $evaluacion = $_POST['evaluacion'];


   
    
    $estado = $_POST['estado']; 
    $info1 = $_POST['info1'];
    $categoria1 = $_POST['categoria1'];

	
	$sql = "UPDATE persona SET estado='$estado', nombre_archivo1='$evaluacion' , INFO1='$info1', categoria1='$categoria1' WHERE id = '$id'";
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

