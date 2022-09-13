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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./estilos/jquery.dataTables.min.css">
  <link rel="stylesheet" href="./estilos/estilos.css">
</head>
<body >
	<div class="card card-lg contenedor1">
    <div class="container contenedor1">
      <div> 
        <a href="https://www.drepuno.gob.pe/" target="_blank"><img class="img-responsivo logoPrincipal" src="./logos/logogrdrep.png" /></a>
      </div>
      <div class="">
       <h2 class="subtitulo">Dirección Regional de Educación Puno</h2>
       <h1 class="titulo">Convocatorias CAS </h1>
     </div>
     <div> 
      <a href="https://www.drepuno.gob.pe/" target="_blank"><img class="img-responsivo logoPrincipal" src="./logos/logochacana.png" /></a>
    </div>
  </div>
</div>
<div class="card container contenedor2"  >
  <div class="table-responsive tablaPrincipal">
    <table class="cell-border display compact small " id="convocatoriasTable">
      <thead class="align-middle">
        <tr >
          <th >N° de Convocatoria</th>
          <th >Descripción</th>
          <th >⠀Vigencia⠀</th>
          <th >Estado</th>
          <th >Bases/ <br>TDR</th>
          <th>Etapas</th>
        </tr>
      </thead>
      <tbody class="align-middle ">
        <?php while($fila=$resultado->fetch_row()) {?>
          <tr >
            <td><?php echo $fila[1]?></td>
            <td><?php echo $fila[2]?></td>
            <td class="text-center" ><?php echo $fila[7]." al <br>".$fila[3]?></td>
            <td>
             <?php
             $sql3="SELECT * FROM resultado_final WHERE id_resultado=$fila[0]";
             $queryResultado=$conn->query($sql3);
             $numFilas=$queryResultado->num_rows;
             $sql4="SELECT * FROM evaluacion_curricular WHERE id_convocatoria=$fila[0]";
             $queryEvaluacion=$conn->query($sql4);
             $numFilasEvaluacion=$queryEvaluacion->num_rows;
             if($fila[6]==1){
              echo "CANCELADO";
            }elseif($numFilas>0 && $fila[5]){
              echo "FINALIZADO";
            }elseif($numFilasEvaluacion>0){
              echo "EN PROCESO";
            }else{
              echo "EN CONVOCATORIA";
            }
            ?>  
          </td>
          <td class="text-center"><?php echo($fila[5]!='')?'<a href="'.$fila[5].'" target="_blank" class="p-3 py-6"><i class="bi bi-file-earmark-pdf-fill icono"></i></a>':'';?></td>
          <td class="text-center">
            <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#modal<?php echo $fila[0]; ?>">
             <i class="fs-4 bi bi-file-earmark-text"></i>
           </button>
           <div class="modal fade" id="modal<?php echo $fila[0]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header ">
                  <h6 class="modal-title modalTitulo" id="exampleModalLabel">CONCURSO: <?php echo $fila[2] ?> </h6>
                  <button type="button" class="btn-close "  data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <table class=" table table-striped table-bordered  " id="convocatoriasTable">
                    <thead>
                      <tr>
                        <th >ETAPA</th>
                        <th >PUBLICACIÓN</th>
                      </tr>
                    </thead>
                    <tbody class="align-middle text-start fw-bold">
                     <tr>
                      <td class="tdModal">⠀⠀Evaluación Curricilar</td>
                      <td class="text-center ">
                        <div class="pdfs">
                          <?php
                          $sql="SELECT * FROM evaluacion_curricular WHERE id_convocatoria=$fila[0]";
                          $query=$conn->query($sql);
                          while($filaEvaluacion=$query->fetch_row()){
                            echo($filaEvaluacion[1]!='')?'
                            <a href="'.$filaEvaluacion[1].'" target="_blank" class="m-3"><i class="bi bi-file-earmark-pdf-fill icono"></i></a>
                            ':'';
                          }
                          ?> 
                        </div>
                        <p class="text-start preliminar"></p>
                      </td>
                    </tr>
                    <tr>
                      <td class="tdModal">⠀⠀Conocimientos y Aptitudes</td>
                      <td class="text-center">
                        <div class="pdfs">                         
                          <?php
                          $sql1="SELECT * FROM conocimientos_aptitudes WHERE id_conocimientos=$fila[0]";
                          $query=$conn->query($sql1);
                          while($filaConocimientos=$query->fetch_row()){
                            echo($filaConocimientos[1]!='')?'
                            <a href="'.$filaConocimientos[1].'" target="_blank" class="m-3"><i class="bi bi-file-earmark-pdf-fill icono"></i></a>
                            ':'';
                          }
                          ?>
                        </div> 
                        <p class="text-start preliminar"></p>
                      </td>
                    </tr>
                    <tr>
                      <td class="tdModal">⠀⠀Entrevista Personal</td>
                      <td class="text-center">
                        <div class="pdfs">                         
                         <?php
                         $sql2="SELECT * FROM entrevista_personal WHERE id_entrevista=$fila[0]";
                         $query=$conn->query($sql2);
                         while($filaEntevista=$query->fetch_row()){
                          echo($filaEntevista[1]!='')?'
                          <a href="'.$filaEntevista[1].'" target="_blank" class="m-3"><i class="bi bi-file-earmark-pdf-fill icono"></i></a>
                          ':'';
                        }
                        ?> 
                      </div> 
                      <p class="text-start preliminar"></p>
                    </td>
                  </tr>
                  <tr>
                    <td class="tdModal">⠀⠀Resultado Final</td>
                    <td class="text-center">
                      <div class="pdfs">                         
                        <?php
                        $sql3="SELECT * FROM resultado_final WHERE id_resultado=$fila[0]";
                        $queryResultado=$conn->query($sql3);
                        while($filaResultado=$queryResultado->fetch_row()){
                          echo($filaResultado[1]!='')?'
                          <a href="'.$filaResultado[1].'" target="_blank" class="m-3"><i class="bi bi-file-earmark-pdf-fill icono"></i></a>
                          ':'';
                        }
                        ?> 
                      </div> 
                      <p class="text-start preliminar"></p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </td>               
  </tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</br></br>			
<footer class="footer-07 card container">
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
  <div class="row " >
    <div class="col-md-12 text-center">
      <p class="menu">
       <b> Dirección:</b> Jr. Bustamante Dueñas 881 - Urb II Etapa Chanu Chanu - Puno <br/><b>Teléfono:</b> (51) 366170 - 357005 | <b>E-Mail:</b> yachay@drepuno.gob.pe
     </p>
     <p class="copyright">
      Copyright &copy;<script>document.write(new Date().getFullYear());</script> >Todo los derechos reservados | Direccion Regional de Educación Puno - Oficina de Informática
    </p>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="./js/jquery-3.5.1.js"> </script>
<script src="./js/jquery.dataTables.min.js"> </script>
<script src="./js/javascript.js"> </script>
</footer>
</div>
</body>
</div>
</html>
