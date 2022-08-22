<?php
	require 'conexion.php';
	session_start();
	error_reporting(0);
	$varsesion = $_SESSION['usuario'];
	if($varsesion == null || $varsesion = ''){
		header("location:index.html");
	}



	
	
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
				<h3 style="text-align:center">NUEVO REGISTRO</h3>
				<br>
			</div>
			
			<form class="form-horizontal" method="POST" action="guardar.php"  enctype="multipart/form-data" autocomplete="off">
				<div class="form-group">
					<label for="titulo" class="col-sm-2 control-label">N° de Convocatoria</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Codigo" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="descripcion" class="col-sm-2 control-label">Cargo</label>
					<div class="col-sm-10">
						<input type="descripcion" class="form-control" id="descripcion" name="descripcion" placeholder="Cargo" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="fecha_ini" class="col-sm-2 control-label">Vigencia</label>
					<div class="col-sm-10">
						<input type="fecha_ini" class="form-control" id="fecha_ini" name="fecha_ini" placeholder="00/00/0000 AL 00/00/0000">
					</div>
				</div>

				
				<div style="display: none"  class="form-group">
					<label for="estado" class="col-sm-2 control-label">Estado </label>
					<div class="col-sm-10">
						<select class="form-control" id="estado" name="estado">
							<option value="Fase 1">Fase 1</option>
							<option value="Fase 2">Fase 2 </option>
							<option value="Fase 3">Fase 3 </option>
                            <option value="Fase 4">Fase 4 </option>
							<option value="Fase 5">Fase 5</option>
							<option value="Terminado">Terminado</option>
                            <option value="Cancelado">Cancelado</option>
						</select>
					</div>
				</div>
				
				

				<div class="form-group">
					<label for="archivo" class="col-sm-2 control-label">En convocatorias</label>
					<div class="col-sm-10">
						<input type="convocatorias" class="form-control" id="convocatorias" name="convocatorias" placeholder="Inserte el link del drive">
					</div>

				</div>
				
				<div style="display: none" class="form-group">
					<label for="info" class="col-sm-2 control-label">Estado </label>
					<div class="col-sm-10">
						<select class="form-control" id="info" name="info">
							<option value="📄">INFO</option>
							<option value="Fase 2">Fase 2 </option>
							<option value="Fase 3">Fase 3 </option>
                            <option value="Fase 4">Fase 4 </option>
							<option value="Fase 5">Fase 5</option>
							<option value="Terminado">Terminado</option>
                            <option value="Cancelado">Cancelado</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>