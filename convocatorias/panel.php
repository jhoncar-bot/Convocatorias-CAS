<?php
	require 'conexion.php';
	session_start();
	error_reporting(0);
	$varsesion = $_SESSION['usuario'];
	if($varsesion == null || $varsesion = ''){
		header("location:index.html");
	}



	$sql = "SELECT * FROM persona   ";
	$resultado = $mysqli->query($sql);
	
?>
<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		<link href="css/jquery.dataTables.min.css" rel="stylesheet">	
		<script src="js/jquery.dataTables.min.js"></script>
		
		
		<script>
				$(document).ready(function(){
				$('#mitabla').DataTable({
					"order": [[0, "desc"]],
					"language":{
						"lengthMenu": "Mostrar _MENU_ registros por pagina",
						"info": "Mostrando pagina _PAGE_ de _PAGES_",
						"infoEmpty": "No hay registros disponibles",
						"infoFiltered": "(filtrada de _MAX_ registros)",
						"loadingRecords": "Cargando...",
						"processing":     "Procesando...",
						"search": "Buscar:",
						"zeroRecords":    "No se encontraron registros coincidentes",
						"paginate": {
							"next":       "Siguiente",
							"previous":   "Anterior"
						},					
					}
				});	
			});		
		</script>	
	</head>
	
	<body>
		
		<div class="container">
			<div class="row">
				<h2 style="text-align:center">Convocatorias</h2>
			</div>
			
			<div class="row" style="text-align:center" >
				<a href="nuevo.php" class="btn btn-primary">Nuevo Registro</a>
				<a target="_black" href="convocatorias.php" class="btn btn-primary">Ver</a>
				<a target="_black" href="cerrar_sesion.php"  style="text-align:right" class="btn btn-primary">Cerrar sesion</a>
				
				
			</div>
			
			<br>
			
			<div class="row table-responsive">
				<table class="display compact small " id="mitabla" style="width:100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>Codigo</th>
							<th>Cargo</th>
							<th>Vigencia</th>
							
							<th>Estado</th>
							<th>En convocatorias</th>
							<th>Evaluacion Curricular</th>
							<th>Conocimientos y aptitud</th>
							<th>Entrevista Personal</th>
							<th>Resultados Finales</th>

							<th></th>
							<th></th>
						</tr>
					</thead>
					
					<tbody>
						<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['titulo']; ?></td>
								<td><?php echo $row['descripcion']; ?></td>
								<td><?php echo $row['fecha_ini']; ?></td>
								
								<td><?php echo $row['estado']; ?></td>
								<td><a target="_black" href="<?php echo $row['nombre_archivo']; ?>"><?php echo $row['INFO']; ?></a></td>
								<td><a target="_black" href="<?php echo $row['nombre_archivo1']; ?>"><?php echo $row['INFO1']; ?></a></td>
								<td><a target="_black" href="<?php echo $row['nombre_archivo2']; ?>"><?php echo $row['INFO2']; ?></a></td>
								<td><a target="_black" href="<?php echo $row['nombre_archivo3']; ?>"><?php echo $row['INFO3']; ?></a></td>
								<td><a target="_black" href="<?php echo $row['nombre_archivo4']; ?>"><?php echo $row['INFO4']; ?></a></td>
								<td><a  href="modificar.php?id=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
								<td><a  href="#" data-href="eliminar.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>
					
					<div class="modal-body">
						¿Desea eliminar este registro?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<a class="btn btn-danger btn-ok">Delete</a>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	
		
	</body>
</html>	
