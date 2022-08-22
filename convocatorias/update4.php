<?php
	
	require 'conexion.php';
	session_start();
	error_reporting(0);
	$varsesion = $_SESSION['usuario'];
	if($varsesion == null || $varsesion = ''){
		header("location:index.html");
	}
	$id = $_POST['id'];
    
    $resultados = $_POST['resultados'];



    $estado = $_POST['estado']; 
    $info4 = $_POST['info4'];
    $categoria4 = $_POST['categoria4'];
	
	$sql = "UPDATE persona SET estado='$estado', nombre_archivo4='$resultados' , INFO4='$info4', categoria4='$categoria4' WHERE id = '$id'";
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


