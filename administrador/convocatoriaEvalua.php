<?php
 include("conexion.php");
 $id=isset($_GET['id'])?$_GET['id']:'';
 $op=isset($_GET['op'])?$_GET['op']:'editar';;

if($op=="eliminar"){
    $sql="DELETE FROM convocatoria WHERE id=$id";
    $resultado= $conn->query($sql);
    if (!$resultado = $conn->query($sql)) die("no se borro el dato porque: ".$conn->error);
}else if($op=="editar" && $id!=''){
    $numConvocatoria=$_GET['numConvocatoria'];
    $cargo=$_GET['cargo'];
    $estado=$_GET['estado'];
    $base=$_GET['base'];
    $sql="UPDATE convocatoria SET numConvocatoria='$numConvocatoria',cargo='$cargo',estado='$estado',bases='$base' WHERE id=$id";
    $resultado=$conn->query($sql);
    if (!$resultado = $conn->query($sql)) die("no se editar el dato porque: ".$conn->error);
}else{
     $numConvocatoria=$_GET['numConvocatoria'];
     $cargo=$_GET['cargo'];
     $estado=$_GET['estado'];
     $base=$_GET['base'];
     print($numConvocatoria." ".$cargo." ".$estado." ".$base."<br>");
     $sql="INSERT INTO convocatoria(numConvocatoria,cargo,estado,bases) VALUES ('$numConvocatoria','$cargo','$estado','$base')";
     if(!$resultado=$conn->query($sql)) die("no se pudo guardar el dato porque: ".$conn->error);
}
header("location: index.php");
?>