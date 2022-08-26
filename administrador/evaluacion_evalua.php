<?php  
include("conexion.php");
$evaluacion=$_GET['evaluacion'];
$id=$_GET['id'];
echo $id."->".$evaluacion;
$sql="INSERT INTO evaluacion_curricular(nom_evaluacion,id_convocatoria) VALUES ('$evaluacion',$id) ";
echo "<br>".$sql;
$resultado=$conn->query($sql);
if(!$resultado){
	echo "No se pudo Agregar el dato porque: ".$conn->error;
}else{
	header("location:index.php");
}
?>