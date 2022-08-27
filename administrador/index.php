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
// funciones para evaluacion curricular
$idConocimientos=(isset($_GET['idConocimientos']))?$_GET['idConocimientos']:'';
$idConocimientosEditar=(isset($_GET['idConocimientosEditar']))?$_GET['idConocimientosEditar']:'';

$nom_conocimientos='';
if($idConocimientosEditar!=''){
  $sql="SELECT * FROM conocimientos_aptitudes WHERE id=$idConocimientosEditar";
  $result=$conn->query($sql);
  $fila=$result->fetch_row();
  $nom_conocimientos=$fila[1];
}
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <?php 
  print($id);
  $sql="DELETE FROM convocatorias WHERE id=3";
  $eliminar=$conn->query($sql);
  if ($eliminar) {
    echo "Se borro el dato correctamente";
  }else{
    echo "no se borro el dato";
  }
  print($sql);
  print("<br>");
  print($resultado->num_rows);
  print("<br>");
  ?>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">SISConvocatorias</h1>
    <!-- Button trigger modal -->
    <a href="" id="pressConocimientosEditar"  data-bs-toggle="modal" data-bs-target="#ModalConocimientosEditar"></a> 
    <a href="" id="pressConocimientos"  data-bs-toggle="modal" data-bs-target="#ModalConocimientos">hola</a> 
    <a href="" id="pressEvaluacionEditar"  data-bs-toggle="modal" data-bs-target="#ModalEvalucionCurricularEditar"></a> 
    <a href="" id="pressEvaluacion"  data-bs-toggle="modal" data-bs-target="#ModalEvalucionCurricular"></a> 
    <a href="" id="press"  data-bs-toggle="modal" data-bs-target="#Modal2"></a> 
    <a href="./" class="btn btn-danger">Actualizar Datos</a> 
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal1">
      Agregar Datos
    </button>
  </div>

  <div class="pdf">
    <div>
      <a href="'.$filaEvaluacion[1].'" target="_blank" class="p-3 py-6"><i class="bi bi-file-earmark-pdf-fill icono"></i></a>
    </div>
    <div class="contenedorPunto">
      <a href=""><i class="bi bi-circle-fill punto1"></i></a> <a href=""><i class="bi bi-circle-fill punto2"></i></a>
    </div>
  </div>

  <h2>Panel de Control</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead >
        <tr>
          <th >#</th>
          <th >N° de Convocatoria</th>
          <th >Cargo</th>
          <th >Estado</th>
          <th >Bases</th>
          <th>Evaluacion Curricular</th>
          <th>Conocimientos y aptitudes</th>
          <th>Editar</th>
          <th >Elimnar</th>
        </tr>
      </thead>
      <tbody>
        <?php while($fila=$resultado->fetch_row()) {?>
          <tr >
            <td><?php echo $fila[0]?></td>
            <td><?php echo $fila[1]?></td>
            <td><?php echo $fila[2]?></td>
            <td><?php echo $fila[3]?></td>
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
              <a href="index.php?idEvaluacion=<?php echo $fila[0]?>" ><i class="bi bi-file-earmark-plus icono2 box"></i></a>
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
              <a href="index.php?idConocimientos=<?php echo $fila[0]?>" ><i class="bi bi-file-earmark-plus icono2 box"></i></a>
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




<style type="text/css">
/*  *{
   outline: 1px red solid;
}*/
  .pdfRow{
    display: flex;
  flex-direction:  row;
  
  align-items: center;
  }
  .pdf{
    display: flex;
  flex-direction:  column;
  
  align-items: center;

  }
  .pdf .contenedorPunto{
      display: flex;
  flex-direction:  row;
  justify-content: space-between;
  align-items: center;
    height: 10px;
    width: 20px;
   
 

  }
   .pdf .contenedorPunto .punto1{
  
  font-size: 7px;
  color: #ffc107;

  }
  .pdf .contenedorPunto .punto2{
  font-size: 7px;
  color: black;

  }

 .icono{
  font-size: 25px;
  color: red;
}
.icono2{
  font-size: 25px;

}
.icono1{
  font-size: 25px;
  color: #ffc107;
}
.box {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
}
/*  thead{
    background-color: red;
  }*/

</style>
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
?>
