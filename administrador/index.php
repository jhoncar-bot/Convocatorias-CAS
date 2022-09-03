<?php 
include("options.php");
include("conexion.php");

$sql="SELECT * FROM convocatoria";
$resultado=$conn->query($sql);

$id=(isset($_GET['id']))?$_GET['id']:'';


$numConvocatoria='';
$cargo='';
$estado='';
$bases='';
if($id!=''){
  $sql="SELECT * FROM convocatoria WHERE id=$id";
  $result=$conn->query($sql);
  $fila=$result->fetch_row();
  $id=$fila[0];
  $numConvocatoria=$fila[1];
  $cargo=$fila[2];
  $estado=$fila[3];
  $bases=$fila[4];
}

// funciones para evaluacion curricular
$idEvaluacion=(isset($_GET['idEvaluacion']))?$_GET['idEvaluacion']:'';
$idEvaluacionEditar=(isset($_GET['idEvaluacionEditar']))?$_GET['idEvaluacionEditar']:'';
$nom_evaluacion='';
if($idEvaluacionEditar!=''){
  $sql="SELECT * FROM evaluacion_curricular WHERE id=$idEvaluacionEditar";
  $result=$conn->query($sql);
  $fila=$result->fetch_row();
  $nom_evaluacion=$fila[1];
}
// funciones para conocimientos y aptitudes
$idConocimientos=(isset($_GET['idConocimientos']))?$_GET['idConocimientos']:'';
$idConocimientosEditar=(isset($_GET['idConocimientosEditar']))?$_GET['idConocimientosEditar']:'';

$nom_conocimientos='';
if($idConocimientosEditar!=''){
  $sql="SELECT * FROM conocimientos_aptitudes WHERE id=$idConocimientosEditar";
  $result=$conn->query($sql);
  $fila=$result->fetch_row();
  $nom_conocimientos=$fila[1];
}
// funciones para conocimientos y aptitudes
$idEntrevista=(isset($_GET['idEntrevista']))?$_GET['idEntrevista']:'';
$idEntrevistaEditar=(isset($_GET['idEntrevistaEditar']))?$_GET['idEntrevistaEditar']:'';

$nom_entrevista='';
if($idEntrevistaEditar!=''){
  $sql="SELECT * FROM entrevista_personal WHERE id=$idEntrevistaEditar";
  $result=$conn->query($sql);
  $fila=$result->fetch_row();
  $nom_entrevista=$fila[1];
}

// funciones para resultado final
$idResultado=(isset($_GET['idResultado']))?$_GET['idResultado']:'';
$idResultadoEditar=(isset($_GET['idResultadoEditar']))?$_GET['idResultadoEditar']:'';

$nom_resultado='';
if($idResultadoEditar!=''){
  $sql="SELECT * FROM resultado_final WHERE id=$idResultadoEditar";
  $result=$conn->query($sql);
  $fila=$result->fetch_row();
  $nom_resultado=$fila[1];
}
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">SISConvocatorias</h1>
    <!-- Modales -->
    <a href="" id="pressResultadoEditar"  data-bs-toggle="modal" data-bs-target="#ModalResultadoEditar"></a> 
    <a href="" id="pressResultado"  data-bs-toggle="modal" data-bs-target="#ModalResultado"></a> 

    <a href="" id="pressEntrevistaEditar"  data-bs-toggle="modal" data-bs-target="#ModalEntrevistaEditar"></a> 
    <a href="" id="pressEntrevista"  data-bs-toggle="modal" data-bs-target="#ModalEntrevista"></a> 

    <a href="" id="pressConocimientosEditar"  data-bs-toggle="modal" data-bs-target="#ModalConocimientosEditar"></a> 
    <a href="" id="pressConocimientos"  data-bs-toggle="modal" data-bs-target="#ModalConocimientos"></a> 

    <a href="" id="pressEvaluacionEditar"  data-bs-toggle="modal" data-bs-target="#ModalEvalucionCurricularEditar"></a> 
    <a href="" id="pressEvaluacion"  data-bs-toggle="modal" data-bs-target="#ModalEvalucionCurricular"></a> 

    <a href="" id="press"  data-bs-toggle="modal" data-bs-target="#Modal2"></a> 

    <div>
      <a href="./" class="btn btn-danger">Actualizar Datos</a> 
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal1">
      Agregar Datos
    </button> 
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    </div>
    
  </div>



  <h2>Panel de Control:</h2>
  <br>
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

</main>
<!-- modal guardar -->
<div class="modal fade" id="Modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregue una Convocatoria:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="convocatoriaEvalua.php" method="GET" id="enviar" >
         <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">N° de Convocatoria:</label>
          <input type="text" class="form-control" name="numConvocatoria"  placeholder="N° de Convocatoria">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Cargo:</label>
          <textarea class="form-control" name="cargo"  placeholder="Cargo"></textarea>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Estado:</label>
          <input type="text" class="form-control" name="estado" placeholder="Estado">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Bases:</label>
          <textarea class="form-control" name="base"  placeholder="Link"></textarea>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      <button type="submit" class="btn btn-primary" form="enviar">Guardar</button>
    </div>
  </div>
</div>
</div>
<!-- modal editar -->
<div class="modal fade" id="Modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edite una Convocatoria:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="convocatoriaEvalua.php" method="GET" id="enviarEditar" >
          <input type="text" name="id" value="<?php echo $id; ?>" hidden>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">N° de Convocatoria:</label>
            <input type="text" class="form-control" name="numConvocatoria" value="<?php echo $numConvocatoria; ?>" placeholder="N° de Convocatoria">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Cargo:</label>
            <textarea class="form-control" name="cargo"  placeholder="Cargo"><?php echo $cargo;?></textarea>

          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Estado:</label>
            <input type="text" class="form-control" name="estado" value="<?php echo $estado; ?>" placeholder="Estado">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Bases:</label>
            <textarea class="form-control" name="base"  placeholder="Link"><?php echo $bases;?></textarea>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" form="enviarEditar">Editar</button>
      </div>
    </div>
  </div>
</div>

<!-- Evaluacion curricular agregar -->
<div class="modal fade" id="ModalEvalucionCurricular" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Evaluacion Curricular</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="evaluacion_evalua.php" method="GET" id="enviarEvaluacion" >
          <input type="text" name="idEvaluacion" value="<?php echo $idEvaluacion; ?>" hidden>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Evaluacion Curricular</label>
            <textarea class="form-control" name="evaluacion"  placeholder="Ingrese el link"></textarea>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" form="enviarEvaluacion">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Evaluacion curricular editar -->
<div class="modal fade" id="ModalEvalucionCurricularEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Evaluacion Curricular</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="evaluacion_evalua.php" method="GET" id="editarEvaluacion" >
          <input type="text" name="id" value="<?php echo $idEvaluacionEditar; ?>" hidden>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Evaluacion Curricular</label>
            <textarea class="form-control" name="evaluacion"  placeholder="Ingrese el link"><?php echo $nom_evaluacion;?></textarea>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" form="editarEvaluacion">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Conocimientos y aptitudes  agregar -->
<div class="modal fade" id="ModalConocimientos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Conocimientos y aptititudes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="conocimientos_evalua.php" method="GET" id="enviarConocimientos" >
          <input type="text" name="idConocimientos" value="<?php echo $idConocimientos; ?>" hidden>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Conocimientos y aptititudes</label>
            <textarea class="form-control" name="conocimientos"  placeholder="Ingrese el link"></textarea>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" form="enviarConocimientos">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Conocimientos y aptitudes  editar -->
<div class="modal fade" id="ModalConocimientosEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Conocimientos y aptititudes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="conocimientos_evalua.php" method="GET" id="enviarConocimientosEditar" >
          <input type="text" name="id" value="<?php echo $idConocimientosEditar; ?>" >
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Conocimientos y aptititudes</label>
            <textarea class="form-control" name="conocimientos"  placeholder="Ingrese el link"><?php echo $nom_conocimientos;?></textarea>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Editar</button>
        <button type="submit" class="btn btn-primary" form="enviarConocimientosEditar">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!--MODAL Entrevista personal  agregar -->
<div class="modal fade" id="ModalEntrevista" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Entrevista personal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="entrevista_evalua.php" method="GET" id="enviarEntrevista" >
          <input type="text" name="idEntrevista" value="<?php echo $idEntrevista; ?>" hidden>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Entrevista Personal:</label>
            <textarea class="form-control" name="entrevista"  placeholder="Ingrese el link"></textarea>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" form="enviarEntrevista">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!--MODAL Entrevista personal   editar -->
<div class="modal fade" id="ModalEntrevistaEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Entrevista personal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="entrevista_evalua.php" method="GET" id="enviarEntrevistaEditar" >
          <input type="text" name="id" value="<?php echo $idEntrevistaEditar; ?>" hidden >
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Entrevista Personal:</label>
            <textarea class="form-control" name="entrevista"  placeholder="Ingrese el link"><?php echo $nom_entrevista;?></textarea>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Editar</button>
        <button type="submit" class="btn btn-primary" form="enviarEntrevistaEditar">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!--MODAL Resultado Final agregar -->
<div class="modal fade" id="ModalResultado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Resultado Final </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="resultado_evalua.php" method="GET" id="enviarResultado" >
          <input type="text" name="idResultado" value="<?php echo $idResultado; ?>" hidden>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Resultado Final :</label>
            <textarea class="form-control" name="resultado"  placeholder="Ingrese el link"></textarea>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" form="enviarResultado">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!--MODAL Resultado Final    editar -->
<div class="modal fade" id="ModalResultadoEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Resultado final</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="resultado_evalua.php" method="GET" id="enviarResultadoEditar" >
          <input type="text" name="id" value="<?php echo $idResultadoEditar; ?>"  hidden>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Resultado Final:</label>
            <textarea class="form-control" name="resultado"  placeholder="Ingrese el link"><?php echo $nom_resultado;?></textarea>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Editar</button>
        <button type="submit" class="btn btn-primary" form="enviarResultadoEditar">Guardar</button>
      </div>
    </div>
  </div>
</div>



<?php 
if($id!=''){
  echo '<script type="text/javascript">
  document.getElementById("press").click();
  </script>';
}
if($idEvaluacion!=''){
  echo '<script type="text/javascript">
  document.getElementById("pressEvaluacion").click();
  </script>';
}
if($idEvaluacionEditar!=''){
  echo '<script type="text/javascript">
  document.getElementById("pressEvaluacionEditar").click();
  </script>';
}
if($idConocimientos!=''){
  echo '<script type="text/javascript">
  document.getElementById("pressConocimientos").click();
  </script>';
}
if($idConocimientosEditar!=''){
  echo '<script type="text/javascript">
  document.getElementById("pressConocimientosEditar").click();
  </script>';
}

if($idEntrevista!=''){
  echo '<script type="text/javascript">
  document.getElementById("pressEntrevista").click();
  </script>';
}
if($idEntrevistaEditar!=''){
  echo '<script type="text/javascript">
  document.getElementById("pressEntrevistaEditar").click();
  </script>';
}
if($idEntrevista!=''){
  echo '<script type="text/javascript">
  document.getElementById("pressEntrevista").click();
  </script>';
}
if($idEntrevistaEditar!=''){
  echo '<script type="text/javascript">
  document.getElementById("pressEntrevistaEditar").click();
  </script>';
}
if($idResultado!=''){
  echo '<script type="text/javascript">
  document.getElementById("pressResultado").click();
  </script>';
}
if($idResultadoEditar!=''){
  echo '<script type="text/javascript">
  document.getElementById("pressResultadoEditar").click();
  </script>';
}
?>
