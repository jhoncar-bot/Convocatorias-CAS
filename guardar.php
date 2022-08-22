<?php
		require 'conexion.php';
		$convocatorias = $_POST['convocatorias'];

		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];
		$fecha_ini = $_POST['fecha_ini'];
        
		$estado = $_POST['estado'];
        $info = $_POST['info'];
		
	

	
	$sql = "INSERT INTO persona (titulo, descripcion, fecha_ini,  estado,nombre_archivo,INFO) VALUES ('$titulo', '$descripcion', '$fecha_ini',  '$estado', '$convocatorias', '$info')";
	$resultado = $mysqli->query($sql);
    $id_insert = $mysqli->insert_id;
	
    	 
    
?>
<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { 
						
					header("location:panel.php");?>
						<?php } else { ?>
						<h3>Vuelva a Registrar nuevamente</h3>
					<?php } ?>
					
					<a href="nuevo.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>