<?php 
     include("conexion.php");
     $id=isset($_GET['id'])?$_GET['id']:'';
     $op=isset($_GET['op'])?$_GET['op']:'editar';
     $idConocimientos=isset($_GET['idConocimientos'])?$_GET['idConocimientos']:'';
    if($op=="eliminar"){
        $sql="DELETE FROM conocimientos_aptitudes WHERE id=$id";
        $resultado= $conn->query($sql);
        if (!$resultado = $conn->query($sql)) die("no se borro el dato porque: ".$conn->error);
    }else if($op=="editar" && $id!=''){
    	echo "editar";
        $conocimientos=$_GET['conocimientos'];
        $sql="UPDATE conocimientos_aptitudes SET nom_conocimientos='$conocimientos'WHERE id=$id";
        $resultado=$conn->query($sql);
        if (!$resultado = $conn->query($sql)) die("no se editar el dato porque: ".$conn->error);
    }else{
    	$conocimientos=$_GET['conocimientos'];
    	$sql="INSERT INTO conocimientos_aptitudes(nom_conocimientos,id_conocimientos) VALUES ('$conocimientos',$idConocimientos)";
    	if (!$resultado = $conn->query($sql)) die("no se agregar el dato porque: ".$conn->error);
    }
     header("location: index.php");
?>