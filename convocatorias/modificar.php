<?php
	require 'conexion.php';
	
	session_start();
	error_reporting(0);
	$varsesion = $_SESSION['usuario'];
	if($varsesion == null || $varsesion = ''){
		header("location:index.html");
	}
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM persona WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
?>
<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		<script type="text/javascript">
			$(document).ready(function(){
				$('.delete').click(function(){
					var parent = $(this).parent().attr('id');
					var service = $(this).parent().attr('data');
					var datString = 'id='+service;
					$.ajax({
						type: "POST",
						url:"del_file.php",
						data: datString,
						success: function(){
							location.reload();
						}
					})
				});
			});
		</script>
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<h3 style="text-align:center">MODIFICAR O AGREGAR</h3>
			</div>
			<div class="row">
				<h4 style="text-align:center">FASE 1</h4>
			</div>
			
			<form class="form-horizontal" method="POST" action="update.php" enctype="multipart/form-data" autocomplete="off">
			<div class="form-group">
					<label for="titulo" class="col-sm-2 control-label">N° de Convocatoria</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="titulo" name="titulo" placeholder="titulo" value="<?php echo $row['titulo']; ?>" required>
					</div>
				</div>
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
				<div class="form-group">
					<label for="descripcion" class="col-sm-2 control-label">Cargo</label>
					<div class="col-sm-10">
						<input type="descripcion" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion" value="<?php echo $row['descripcion']; ?>" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="fecha_ini" class="col-sm-2 control-label">Vigencia</label>
					<div class="col-sm-10">
						<input type="fecha_ini" class="form-control" id="fecha_ini" name="fecha_ini" placeholder="Fecha de inicio" value="<?php echo $row['fecha_ini']; ?>">
					</div>
				</div>


				
				<div class="form-group">
					<label for="estado" class="col-sm-2 control-label">Estado </label>
					<div class="col-sm-10">
						<select class="form-control" id="estado" name="estado">
							<option value="Fase 1" <?php if($row['estado']=='Fase 1') echo 'selected'; ?>>Fase 1</option>
							<option value="Fase 2" <?php if($row['estado']=='Fase 2') echo 'selected'; ?>>Fase 2 </option>
							<option value="Fase 3" <?php if($row['estado']=='Fase 3') echo 'selected'; ?>>Fase 3 </option>
                            <option value="Fase 4" <?php if($row['estado']=='Fase 4') echo 'selected'; ?>>Fase 4 </option>
							<option value="Fase 5" <?php if($row['estado']=='Fase 5') echo 'selected'; ?>>Fase 5</option>
							<option value="Terminado" <?php if($row['estado']=='Terminado') echo 'selected'; ?>>Terminado</option>
                            <option value="Cancelado" <?php if($row['estado']=='Cancelado') echo 'selected'; ?>>Cancelado</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="archivo" class="col-sm-2 control-label">En convocatorias</label>
					<div class="col-sm-10">
						<input type="convocatorias" class="form-control" id="convocatorias" name="convocatorias" placeholder="Inserte el link" value="<?php echo $row['nombre_archivo']; ?>">
					</div>

				</div>


						
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="panel.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>




			<div class="row">
				<h4 style="text-align:center">FASE 2</h4>
			</div>
			
			<form class="form-horizontal" method="POST" action="update1.php" enctype="multipart/form-data" autocomplete="off">
			
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
				<div style="display: none" class="form-group">
					<label for="estado" class="col-sm-2 control-label">Estado </label>
					<div class="col-sm-10">
						<select class="form-control" id="estado" name="estado">
							<option value="Fase 2" <?php if($row['estado']=='Fase 1') echo 'selected'; ?>>Fase 1</option>
							<option value="Fase 2" <?php if($row['estado']=='Fase 2') echo 'selected'; ?>>Fase 2 </option>
							<option value="Fase 3" <?php if($row['estado']=='Fase 3') echo 'selected'; ?>>Fase 3 </option>
                            <option value="Fase 4" <?php if($row['estado']=='Fase 4') echo 'selected'; ?>>Fase 4 </option>
							<option value="Fase 5" <?php if($row['estado']=='Fase 5') echo 'selected'; ?>>Fase 5</option>
							<option value="Terminado" <?php if($row['estado']=='Terminado') echo 'selected'; ?>>Terminado</option>
                            <option value="Cancelado" <?php if($row['estado']=='Cancelado') echo 'selected'; ?>>Cancelado</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="archivo" class="col-sm-2 control-label">Evaluacion Curricular</label>
					<div class="col-sm-10">
						<input type="evaluacion" class="form-control" id="evaluacion" name="evaluacion" placeholder="Inserte el link" value="<?php echo $row['nombre_archivo1']; ?>">
					</div>

				</div>
				<div class="form-group">
					<label for="categoria1" class="col-sm-2 control-label">Estado </label>
					<div class="col-sm-10">
						<select class="form-control" id="categoria1" name="categoria1">
							<option value="" <?php if($row['categoria1']=='') echo 'selected'; ?>>Final </option>
							<option value="Preliminar" <?php if($row['categoria1']=='Preliminar') echo 'selected'; ?>>Preliminar</option>
							
							
						</select>
					</div>
				</div>
					<div  style="display: none" class="form-group">
					<label for="info1" class="col-sm-2 control-label">Estado </label>
					<div class="col-sm-10">
						<select class="form-control" id="info1" name="info1">
							<option value="📄">📁</option>
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
						<a href="panel.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>


			<div class="row">
				<h4 style="text-align:center">FASE 3</h4>
			</div>
			 
			<form class="form-horizontal" method="POST" action="update2.php" enctype="multipart/form-data" autocomplete="off">
			
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
				<div  style="display: none" class="form-group">
					<label for="estado" class="col-sm-2 control-label">Estado </label>
					<div class="col-sm-10">
						<select class="form-control" id="estado" name="estado">
							<option value="Fase 2" <?php if($row['estado']=='Fase 1') echo 'selected'; ?>>Fase 1</option>
							<option value="Fase 3" <?php if($row['estado']=='Fase 2') echo 'selected'; ?>>Fase 2 </option>
							<option value="Fase 3" <?php if($row['estado']=='Fase 3') echo 'selected'; ?>>Fase 3 </option>
                            <option value="Fase 4" <?php if($row['estado']=='Fase 4') echo 'selected'; ?>>Fase 4 </option>
							<option value="Fase 5" <?php if($row['estado']=='Fase 5') echo 'selected'; ?>>Fase 5</option>
							<option value="Terminado" <?php if($row['estado']=='Terminado') echo 'selected'; ?>>Terminado</option>
                            <option value="Cancelado" <?php if($row['estado']=='Cancelado') echo 'selected'; ?>>Cancelado</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="archivo" class="col-sm-2 control-label">Conocimientos y aptitud</label>
					<div class="col-sm-10">
						<input type="conocimientos" class="form-control" id="conocimientos" name="conocimientos" placeholder="Inserte el link" value="<?php echo $row['nombre_archivo2']; ?>">
					</div>

				</div>
				<div class="form-group">
					<label for="categoria2" class="col-sm-2 control-label">Estado </label>
					<div class="col-sm-10">
						<select class="form-control" id="categoria2" name="categoria2">
							<option value="" <?php if($row['categoria2']=='') echo 'selected'; ?>>Final </option>
							<option value="Preliminar" <?php if($row['categoria2']=='Preliminar') echo 'selected'; ?>>Preliminar</option>
							
							
						</select>
					</div>
				</div>
					<div style="display: none" class="form-group">
					<label for="info2" class="col-sm-2 control-label">Estado </label>
					<div class="col-sm-10">
						<select class="form-control" id="info2" name="info2">
							<option value="📄">📁</option>
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
						<a href="panel.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
			<div class="row">
				<h4 style="text-align:center">FASE 4</h4>
			</div>
			 
			<form class="form-horizontal" method="POST" action="update3.php" enctype="multipart/form-data" autocomplete="off">
			
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
				<div style="display: none" class="form-group">
					<label for="estado" class="col-sm-2 control-label">Estado </label>
					<div class="col-sm-10">
						<select class="form-control" id="estado" name="estado">
							<option value="Fase 2" <?php if($row['estado']=='Fase 1') echo 'selected'; ?>>Fase 1</option>
							<option value="Fase 3" <?php if($row['estado']=='Fase 2') echo 'selected'; ?>>Fase 2 </option>
							<option value="Fase 4" <?php if($row['estado']=='Fase 3') echo 'selected'; ?>>Fase 3 </option>
                            <option value="Fase 4" <?php if($row['estado']=='Fase 4') echo 'selected'; ?>>Fase 4 </option>
							<option value="Fase 5" <?php if($row['estado']=='Fase 5') echo 'selected'; ?>>Fase 5</option>
							<option value="Terminado" <?php if($row['estado']=='Terminado') echo 'selected'; ?>>Terminado</option>
                            <option value="Cancelado" <?php if($row['estado']=='Cancelado') echo 'selected'; ?>>Cancelado</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="archivo" class="col-sm-2 control-label">Entrevista Personal</label>
					<div class="col-sm-10">
						<input type="entrevista" class="form-control" id="entrevista" name="entrevista" placeholder="Inserte el link" value="<?php echo $row['nombre_archivo3']; ?>">
					</div>

				</div >
				<div class="form-group">
					<label for="categoria3" class="col-sm-2 control-label">Estado </label>
					<div class="col-sm-10">
						<select class="form-control" id="categoria3" name="categoria3">
							<option value="" <?php if($row['categoria3']=='') echo 'selected'; ?>>Final </option>
							<option value="Preliminar" <?php if($row['categoria3']=='Preliminar') echo 'selected'; ?>>Preliminar</option>
							
							
						</select>
					</div>
				</div>
					<div  style="display: none" class="form-group">
					<label for="info3" class="col-sm-2 control-label">Estado </label>
					<div class="col-sm-10">
						<select class="form-control" id="info3" name="info3">
							<option value="📄">📁</option>
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
						<a href="panel.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
			<div class="row">
				<h4 style="text-align:center">FASE 5</h4>
			</div>
			 
			<form class="form-horizontal" method="POST" action="update4.php" enctype="multipart/form-data" autocomplete="off">
			
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
				<div style="display: none" class="form-group">
					<label for="estado" class="col-sm-2 control-label">Estado </label>
					<div class="col-sm-10">
						<select class="form-control" id="estado" name="estado">
							<option value="Fase 2" <?php if($row['estado']=='Fase 1') echo 'selected'; ?>>Fase 1</option>
							<option value="Fase 3" <?php if($row['estado']=='Fase 2') echo 'selected'; ?>>Fase 2 </option>
							<option value="Fase 4" <?php if($row['estado']=='Fase 3') echo 'selected'; ?>>Fase 3 </option>
                            <option value="Fase 5" <?php if($row['estado']=='Fase 4') echo 'selected'; ?>>Fase 4 </option>
							<option value="Fase 5" <?php if($row['estado']=='Fase 5') echo 'selected'; ?>>Fase 5</option>
							<option value="Terminado" <?php if($row['estado']=='Terminado') echo 'selected'; ?>>Terminado</option>
                            <option value="Cancelado" <?php if($row['estado']=='Cancelado') echo 'selected'; ?>>Cancelado</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="archivo" class="col-sm-2 control-label">Resultados Finales</label>
					<div class="col-sm-10">
						<input type="resultados" class="form-control" id="resultados" name="resultados" placeholder="Inserte el link" value="<?php echo $row['nombre_archivo4']; ?>">
					</div>

				</div>
				<div class="form-group">
					<label for="categoria4" class="col-sm-2 control-label">Estado </label>
					<div class="col-sm-10">
						<select class="form-control" id="categoria4" name="categoria4">
							<option value="" <?php if($row['categoria4']=='') echo 'selected'; ?>>Final </option>
							<option value="Preliminar" <?php if($row['categoria4']=='Preliminar') echo 'selected'; ?>>Preliminar</option>
							
							
						</select>
					</div>
				</div>
					<div style="display: none" class="form-group">
					<label for="info4" class="col-sm-2 control-label">EstadoS </label>
					<div class="col-sm-10">
						<select type="hidden" class="form-control" id="info4" name="info4">
							<option value="📄">📁</option>
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
						<a href="panel.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>