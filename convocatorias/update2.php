<?php
	
	require 'conexion.php';
	session_start();
	error_reporting(0);
	$varsesion = $_SESSION['usuario'];
	if($varsesion == null || $varsesion = ''){
		header("location:index.html");
	}
	$id = $_POST['id'];
    
    $conocimientos = $_POST['conocimientos'];


   
    
    $estado = $_POST['estado']; 
    $info2 = $_POST['info2'];
    $categoria2 = $_POST['categoria2'];
	
	$sql = "UPDATE persona SET estado='$estado', nombre_archivo2='$conocimientos' , INFO2='$info2', categoria2='$categoria2' WHERE id = '$id'";
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


