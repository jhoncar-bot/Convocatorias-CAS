<?php 
 include("conexion.php");
 $id=isset($_GET['id'])?$_GET['id']:'';
 $op=isset($_GET['op'])?$_GET['op']:'editar';
 $idResultado=isset($_GET['idResultado'])?$_GET['idResultado']:'';

if($op=="eliminar"){
    $sql="DELETE FROM resultado_final WHERE id=$id";
    $resultado= $conn->query($sql);
    if (!$resultado = $conn->query($sql)) die("no se borro el dato porque: ".$conn->error);
}else if($op=="editar" && $id!=''){
    $resultado=$_GET['resultado'];
    $sql="UPDATE resultado_final SET nom_resultado='$resultado'WHERE id=$id";
    $resultado=$conn->query($sql);
    if (!$resultado = $conn->query($sql)) die("no se editar el dato porque: ".$conn->error);
}else{
	$resultado=$_GET['resultado'];
	$sql="INSERT INTO resultado_final(nom_resultado,id_resultado) VALUES ('$resultado',$idResultado)";
	if (!$resultado = $conn->query($sql)) die("no se agregar el dato porque: ".$conn->error);
}
header("location: index.php");

?>