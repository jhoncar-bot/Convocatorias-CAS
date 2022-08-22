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
					
					<a href="modificar.php" class="btn btn-primary">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>
