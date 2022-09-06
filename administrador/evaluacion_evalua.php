<?php 
 include("conexion.php");
 $id=isset($_GET['id'])?$_GET['id']:'';
 $op=isset($_GET['op'])?$_GET['op']:'editar';
 $idEvaluacion=isset($_GET['idEvaluacion'])?$_GET['idEvaluacion']:'';
if($op=="eliminar"){
    $sql="DELETE FROM evaluacion_curricular WHERE id=$id";
    $resultado= $conn->query($sql);
    if (!$resultado = $conn->query($sql)) die("no se borro el dato porque: ".$conn->error);
}else if($op=="editar" && $id!=''){
	echo "editar";
    $evaluacion=$_GET['evaluacion'];
    $sql="UPDATE evaluacion_curricular SET nom_evaluacion='$evaluacion'WHERE id=$id";
    $resultado=$conn->query($sql);
    if (!$resultado = $conn->query($sql)) die("no se editar el dato porque: ".$conn->error);
}else{
	$evaluacion=$_GET['evaluacion'];
    $estado=isset($_GET['estado'])?"Preliminar":"Final";
	$sql="INSERT INTO evaluacion_curricular(nom_evaluacion,id_convocatoria,estado) VALUES ('$evaluacion',$idEvaluacion,'$estado')";
	if (!$resultado = $conn->query($sql)) die("no se agregar el dato porque: ".$conn->error);
    
}
header("location: index.php");
?>