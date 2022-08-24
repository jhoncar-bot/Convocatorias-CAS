<?php
 include("conexion.php");
 $numConvocatoria=$_GET['numConvocatoria'];
 $cargo=$_GET['cargo'];
 $estado=$_GET['estado'];
 $base=$_GET['base'];
 print($numConvocatoria." ".$cargo." ".$estado." ".$base."<br>");

 $sql="INSERT INTO convocatoria(numConvocatoria,cargo,estado,bases) VALUES ('numConvocatoria','$cargo','$estado','$base')";
 print($sql);
 if($conn->query($sql)){
 	header("location: index.php");
 }else{
 	print("<br>");
 	echo "No se pudo guardar la convocatorias porque ".$conn->error;
 }

?>