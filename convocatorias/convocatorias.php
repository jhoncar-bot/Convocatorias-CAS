
<?php
	require 'conexion.php';
	
	
	
	$sql = "SELECT * FROM persona WHERE estado='Fase 1' ";
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
		        	"columnDefs": [
            {
		                "targets": [ 0,6,7,8,9 ],
		                "visible": false,
		                "searchable": false
		            },

		        ],
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
	
	<body >
		
		<div class="container">
			<div class="row">
				<h2 style="text-align:center">Convocatorias CAS DREPUNO</h2>
			</div>
			<div style="text-align:center"  class="container">
  			<a href="convocatorias.php" role="button"><button type="button" class="btn btn-outline-warning">En convocatorias</button></a>
			<a href="evaluacion.php" role="button"><button type="button" class="btn btn-outline-warning">Evaluacion Curricular</button></a>
			<a href="conocimientos.php" role="button"><button type="button" class="btn btn-outline-warning">Conocimientos y Aptitudes</button></a>
			<a href="entrevista.php" role="button"><button type="button" class="btn btn-outline-warning">Entrevista Personal</button></a>
			<a href="resultado.php" role="button"><button type="button" class="btn btn-outline-warning">Resultados finales</button></a>
			<a href="cancelado.php" role="button"><button type="button" class="btn btn-outline-warning">Cancelados</button></a>
			<a href="ver.php" role="button"><button type="button" class="btn btn-outline-warning">Historial</button></a>
</div>

			
			
			<br>
			
			<div >
				<table class="cell-border display compact small " aria-describedby="example_info" id="mitabla" style="width:100%" >
					<thead>
						<tr>
							<th rowspan="2">ID</th>
							<th  rowspan="2" > Codigo </th>
							<th rowspan="2" class="col-md-4">Cargo</th>
							<th rowspan="2">Vigencia</th>
							
							<th rowspan="2">Estado</th>
							
							<th colspan="1">Fase 1</th>
							<th colspan="1">Fase 2</th>
							<th colspan="1">Fase 3</th>
							<th colspan="1">Fase 4</th>
							<th colspan="1">Fase 5</th>

							
						</tr>
						<tr>
							
							<th >En convocatorias</th>
							<th>Evaluacion Curricular</th>
							<th>Conocimientos y aptitud</th>
							<th>Entrevista Personal</th>
							<th>Resultados Finales</th>

							
						</tr>
					</thead>
					
					<tbody>
						<?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['titulo']; ?></td>
								<td><?php echo $row['descripcion']; ?></td>
								<td class="text-center"><?php echo $row['fecha_ini']; ?></td>
								
								<td><?php echo $row['estado']; ?></td>
							
								<td class="text-center"><a target="_black" href="<?php echo $row['nombre_archivo']; ?>"><H4><?php echo $row['INFO']; ?></H4></a></td>
								<td class="text-center"><a target="_black" href="<?php echo $row['nombre_archivo1']; ?>"><H4><?php echo $row['INFO1']; ?></H4></a></td>
								<td class="text-center"><a target="_black" href="<?php echo $row['nombre_archivo2']; ?>"><H4><?php echo $row['INFO2']; ?></H4></a></td>
								<td class="text-center"><a target="_black" href="<?php echo $row['nombre_archivo3']; ?>"><H4><?php echo $row['INFO3']; ?></H4></a></td>
								<td class="text-center"><a target="_black" href="<?php echo $row['nombre_archivo4']; ?>"><H4><?php echo $row['INFO4']; ?></H4></a></td>

								
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
						<h4 class="modal-title" id="myModalLabel"><?php echo $row['estado']; ?></h4>
					</div>
					
					<div class="modal-body">
						<TABLE BORDER>
							<TR><TH>Head1</TH>
								<TD>Item 1</TD> </TR>
							<TR><TH>Head2</TH>
								<TD>Item 4</TD> </TR>
							<TR><TH>Head3</TH>
								<TD>Item 7</TD> </TR>
						</TABLE>
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
