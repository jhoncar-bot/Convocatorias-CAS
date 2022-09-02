<?php 
	include("./administrador/conexion.php");
	$sql="SELECT * FROM convocatoria";
$resultado=$conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SISTitulos DREP</title>
	
	
    
    <link rel="stylesheet" href="./estilos/bootstrap.min.css" />
    <link rel="stylesheet" href="./estilos/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	
</head>
<body >
	
	
	<div class="card card-lg contenedor1">
		<a href="https://www.drepuno.gob.pe/" target="_blank"><img class="img-responsivo logoPrincipal" src="./logos/logogrdrep.png" /></a>
		<div class="container titulos">
			<h2 class="subtitulo">Dirección Regional de Educación Puno</h2>
			<h1 class="titulo">Convocatorias CAS </h1>
		</div>
		<a href="https://www.drepuno.gob.pe/" target="_blank"><img class="img-responsivo logoPrincipal" src="./logos/logochacana.png" /></a>
	</div>
	
	<div class="card container contenedor2"  >
		<div class="table-responsive">
    <table class="table table-bordered  table-sm ">
      <thead class="align-middle">
        <tr class="table-dark cabecera ">
          <th >#</th>
          <th >N° de Convocatoria</th>
          <th >Cargo</th>
          <th >Estado</th>
          <th >Bases</th>
          <th>Evaluacion Curricular</th>
          <th>Conocimientos y Aptitudes</th>
          <th>Entrevista Personal</th>
          <th>Resultado Final</th>
          <th>Editar</th>
          <th >Elimnar</th>
        </tr>
      </thead>
      <tbody class="align-middle">
        <?php while($fila=$resultado->fetch_row()) {?>
          <tr >
            <td><?php echo $fila[0]?></td>
            <td><?php echo $fila[1]?></td>
            <td><?php echo $fila[2]?></td>
            <td>
               <?php
                $sql3="SELECT * FROM resultado_final WHERE id_resultado=$fila[0]";
                $queryResultado=$conn->query($sql3);
                $numFilas=$queryResultado->num_rows;
                echo($numFilas>0?"FINALIZADO":"EN PROCESO")
                ?>   
            </td>
            <td><?php echo($fila[4]!='')?'<a href="'.$fila[4].'" target="_blank" class="p-3 py-6"><i class="bi bi-file-earmark-pdf-fill icono"></i></a>':'';?></td>
            <td><div class="box"><div class="pdfRow">
              <?php
                $sql="SELECT * FROM evaluacion_curricular WHERE id_convocatoria=$fila[0]";
                $query=$conn->query($sql);
                while($filaEvaluacion=$query->fetch_row()){
                    echo($filaEvaluacion[1]!='')?'
                          <div class="pdf">
                            <div>
                              <a href="'.$filaEvaluacion[1].'" target="_blank" class="p-3 py-6"><i class="bi bi-file-earmark-pdf-fill icono"></i></a>
                            </div>
                            <div class="contenedorPunto">
                              <a href="index.php?idEvaluacionEditar='.$filaEvaluacion[0].'"><i class="bi bi-pencil-fill punto1"></i></a> 
                              <a href="evaluacion_evalua.php?op=eliminar&id='.$filaEvaluacion[0].'"><i class="bi bi-x-circle-fill punto2"></i></a>
                            </div>
                          </div>':'';
                  }
                ?>                  
            </div>
            <div>
              <a href="index.php?idEvaluacion=<?php echo $fila[0]?>" ><i class="bi bi-plus-circle icono2"></i></a>
            </div>
          </div></td>
          <td><div class="box"><div class="pdfRow">
              <?php
                $sql1="SELECT * FROM conocimientos_aptitudes WHERE id_conocimientos=$fila[0]";
                $query=$conn->query($sql1);
                while($filaConocimientos=$query->fetch_row()){
                    echo($filaConocimientos[1]!='')?'
                          <div class="pdf">
                            <div>
                              <a href="'.$filaConocimientos[1].'" target="_blank" class="p-3 py-6"><i class="bi bi-file-earmark-pdf-fill icono"></i></a>
                            </div>
                            <div class="contenedorPunto">
                              <a href="index.php?idConocimientosEditar='.$filaConocimientos[0].'"><i class="bi bi-pencil-fill punto1"></i></a> 
                              <a href="conocimientos_evalua.php?op=eliminar&id='.$filaConocimientos[0].'"><i class="bi bi-x-circle-fill punto2"></i></a>
                            </div>
                          </div>':'';
                  }
                ?>                  
            </div>
            <div>
              <a href="index.php?idConocimientos=<?php echo $fila[0]?>" ><i class="bi bi-plus-circle icono2"></i></a>
            </div>
          </div></td>
          <td><div class="box"><div class="pdfRow">
              <?php
                $sql2="SELECT * FROM entrevista_personal WHERE id_entrevista=$fila[0]";
                $query=$conn->query($sql2);
                while($filaEntevista=$query->fetch_row()){
                    echo($filaEntevista[1]!='')?'
                          <div class="pdf">
                            <div>
                              <a href="'.$filaEntevista[1].'" target="_blank" class="p-3 py-6"><i class="bi bi-file-earmark-pdf-fill icono"></i></a>
                            </div>
                            <div class="contenedorPunto">
                              <a href="index.php?idEntrevistaEditar='.$filaEntevista[0].'"><i class="bi bi-pencil-fill punto1"></i></a> 
                              <a href="entrevista_evalua.php?op=eliminar&id='.$filaEntevista[0].'"><i class="bi bi-x-circle-fill punto2"></i></a>
                            </div>
                          </div>':'';
                  }
                ?>                  
            </div>
            <div>
              <a href="index.php?idEntrevista=<?php echo $fila[0]?>" ><i class="bi bi-plus-circle icono2 "></i></a>
            </div>
          </div></td>
          <td><div class="box"><div class="pdfRow">
              <?php
                while($filaResultado=$queryResultado->fetch_row()){
                    echo($filaResultado[1]!='')?'
                          <div class="pdf">
                            <div>
                              <a href="'.$filaResultado[1].'" target="_blank" class="p-3 py-6"><i class="bi bi-file-earmark-pdf-fill icono"></i></a>
                            </div>
                            <div class="contenedorPunto">
                              <a href="index.php?idResultadoEditar='.$filaResultado[0].'"><i class="bi bi-pencil-fill punto1"></i></a> 
                              <a href="resultado_evalua.php?op=eliminar&id='.$filaResultado[0].'"><i class="bi bi-x-circle-fill punto2"></i></a>
                            </div>
                          </div>':'';
                  }
                ?>                  
            </div>
            <div>
              <a href="index.php?idResultado=<?php echo $fila[0]?>" ><i class="bi bi-plus-circle icono2 "></i></a>
            </div>
          </div></td>
          <td><a href="index.php?id=<?php echo $fila[0]?>" class="p-3 py-6" ><i class="bi bi-pencil-square icono1"></i></a></td>
          <td><a href="convocatoriaEvalua.php?op=eliminar&id=<?php echo $fila[0]?>" class="p-3 py-6"><i class="bi bi-trash3  icono " ></a></i></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

</div>
	</div>

	<div class="container">
		</br></br>			<footer class="footer-07 card">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <h2 class="footer-heading " style="text-align: center ;"><a href="https://www.drepuno.gob.pe/" target="_blank" class="logo">Dirección Regional de Educación Puno</a></h2>
                    <ul class="ftco-footer-social p-0">
                      <li class="ftco-animate"><a href="https://twitter.com/drepuno" data-toggle="tooltip" data-placement="top" target="_blank" title="Twitter"><span class="bi bi-twitter"></span></a></li>
                      <li class="ftco-animate"><a href="https://www.facebook.com/DREPuno" data-toggle="tooltip" data-placement="top" target="_blank" title="Facebook"><span class="bi bi-facebook"></span></a></li>
                      <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="bi bi-instagram"></span></a></li>
                  </ul>
              </div>
          </div>
            <div class="row mt-5 " >
                <div class="col-md-12 text-center">
                  <p class="menu">
                     <b> Dirección:</b> Jr. Bustamante Dueñas 881 - Urb II Etapa Chanu Chanu - Puno <br/><b>Teléfono:</b> (51) 366170 - 357005 | <b>E-Mail:</b> yachay@drepuno.gob.pe
                 </p>
                 <p class="copyright">
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> >Todo los derechos reservados | Direccion Regional de Educación Puno - Oficina de Informática
                 </p>
                </div>
             </div>
        </footer>
        </div>
		</body>
	</div>
	</html>
