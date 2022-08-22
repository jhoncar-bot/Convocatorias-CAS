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
