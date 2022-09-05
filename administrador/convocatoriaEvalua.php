<?php
 include("conexion.php");
 $id=isset($_GET['id'])?$_GET['id']:'';
 $op=isset($_GET['op'])?$_GET['op']:'editar';;

if($op=="eliminar"){
    $sql="DELETE FROM conocimientos_aptitudes WHERE id_conocimientos=$id;
          DELETE FROM entrevista_personal WHERE id_entrevista=$id;
          DELETE FROM resultado_final WHERE id_resultado=$id;
          DELETE FROM evaluacion_curricular WHERE id_convocatoria=$id;
          DELETE FROM convocatoria WHERE id=$id";
    if (!$resultado = $conn->multi_query($sql)) die("no se eliminar el dato porque: ".$conn->error);

    
    
}else if($op=="editar" && $id!=''){
    $numConvocatoria=$_GET['numConvocatoria'];
    $cargo=$_GET['cargo'];
    $estado=$_GET['estado'];
    $base=$_GET['base'];
    $cancelado=(isset($_GET['cancelado']))?'1':'0';
    $sql="UPDATE convocatoria SET numConvocatoria='$numConvocatoria',cargo='$cargo',estado='$estado',bases='$base',cancelado=$cancelado WHERE id=$id";
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
die();
?>