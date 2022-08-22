<?php
		require 'conexion.php';
		$convocatorias = $_POST['convocatorias'];

		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];
		$fecha_ini = $_POST['fecha_ini'];
        
		$estado = $_POST['estado'];
        $info = $_POST['info'];
		
	

	
	$sql = "INSERT INTO persona (titulo, descripcion, fecha_ini,  estado,nombre_archivo,INFO) VALUES ('$titulo', '$descripcion', '$fecha_ini',  '$estado', '$convocatorias', '$info')";
    $query = mysqli_query($mysqli, $sql);
    
    if($query){

           echo "<script> alert('correcto');
            location.href = 'panel.php';
           </script>";
        
        }else{
            echo "Error: " . "<br>" . mysqli_error($mysqli);
        }

	
    	 
    
?>
