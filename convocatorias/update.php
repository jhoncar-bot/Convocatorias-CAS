<?php
	
	require 'conexion.php';
	session_start();
	error_reporting(0);
	$varsesion = $_SESSION['usuario'];
	if($varsesion == null || $varsesion = ''){
		header("location:index.html");
	}
	$id = $_POST['id'];
    $convocatorias = $_POST['convocatorias'];
 
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha_ini = $_POST['fecha_ini'];
    
    $estado = $_POST['estado']; 


	
	$sql = "UPDATE persona SET titulo='$titulo', descripcion='$descripcion', fecha_ini='$fecha_ini', estado='$estado', nombre_archivo='$convocatorias' WHERE id = '$id'";
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


