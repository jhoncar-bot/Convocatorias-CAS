
<?php
include("conexion.php");
$sql="SELECT * FROM convocatoria";
$resultado=$conn->query($sql);
$id=(isset($_GET['id']))?$_GET['id']:'';
$numConvocatoria='';
$cargo='';
$estado='';
$bases='';
$cancelado='';
if($id!=''){
  $sql="SELECT * FROM convocatoria WHERE id=$id";
  $result=$conn->query($sql);
  $fila=$result->fetch_row();
  $id=$fila[0];
  $numConvocatoria=$fila[1];
  $cargo=$fila[2];
  $estado=$fila[3];
  $bases=$fila[4];
  $cancelado=($fila[5]==1)?'checked':'';
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
	// funciones
function estado($id,$bases,$cancelar){
  include("conexion.php");
  $sql3="SELECT * FROM resultado_final WHERE id_resultado=$id";
  $queryResultado=$conn->query($sql3);
  $numFilas=$queryResultado->num_rows;
  $sql4="SELECT * FROM evaluacion_curricular WHERE id_convocatoria=$id";
  $queryEvaluacion=$conn->query($sql4);
  $numFilasEvaluacion=$queryEvaluacion->num_rows;
  if($cancelar==1){
   echo "CANCELADO";
 }elseif($numFilas>0 && $bases){
   echo "FINALIZADO";
 }elseif($numFilasEvaluacion>0){
   echo "EN PROCESO";
 }else{
   echo "EN CONVOCATORIA";
 }
}
function mostrarEtapas($id,$nombreTabla,$columnaTabla,$nombreModal,$nombreEvalua){
  include("conexion.php");
  $sql="SELECT * FROM $nombreTabla WHERE $columnaTabla=$id";
  $query=$conn->query($sql);
  while($fila=$query->fetch_row()){
    echo($fila[1]!='')?'
    <div class="pdf">
    <div>
    <a href="'.$fila[1].'" target="_blank" class="p-2 py-6"><i class="bi bi-file-earmark-pdf-fill icono"></i></a>
    </div>
    <div class="contenedorPunto">
    <a href="index.php?'.$nombreModal.'='.$fila[0].'"><i class="bi bi-pencil-fill punto1"></i></a> 
    <a href="'.$nombreEvalua.'?op=eliminar&id='.$fila[0].'" class="confirmarEliminar"><i class="bi bi-x-circle-fill punto2"></i></a>
    </div>
    </div>':'';
  }
}
function agregarPdfLimite($id,$nombreTabla,$columnaTabla,$nombreModal){
 include("conexion.php");
 $sql3="SELECT * FROM $nombreTabla WHERE $columnaTabla=$id";
 $queryResultado=$conn->query($sql3);
 $sql="SELECT cancelado FROM convocatoria WHERE id=$id";
 $query=$conn->query($sql);
 $cancelado=$query->fetch_row();
 $numFilas=$queryResultado->num_rows;
 if($cancelado[0]==0 && $numFilas!=2){
  echo'
  <div class="button_add">
  <a href="index.php?'.$nombreModal.'='.$id.'" class="icono2"><i class="bi bi-plus-circle icono2"></i></a>
  </div>';
}
}
?>
