<?php 
     include("conexion.php");
     $id=isset($_GET['id'])?$_GET['id']:'';
     $op=isset($_GET['op'])?$_GET['op']:'editar';
     $idEntrevista=isset($_GET['idEntrevista'])?$_GET['idEntrevista']:'';
    if($op=="eliminar"){
        $sql="DELETE FROM entrevista_personal WHERE id=$id";
        $resultado= $conn->query($sql);
        if (!$resultado = $conn->query($sql)) die("no se borro el dato porque: ".$conn->error);
    }else if($op=="editar" && $id!=''){
    	echo "editar";
        $entrevista=$_GET['entrevista'];
        $sql="UPDATE entrevista_personal SET nom_entrevista='$entrevista'WHERE id=$id";
        $resultado=$conn->query($sql);
        if (!$resultado = $conn->query($sql)) die("no se editar el dato porque: ".$conn->error);
    }else{
    	$entrevista=$_GET['entrevista'];
    	$sql="INSERT INTO entrevista_personal(nom_entrevista,id_entrevista) VALUES ('$entrevista',$idEntrevista)";
    	if (!$resultado = $conn->query($sql)) die("no se agregar el dato porque: ".$conn->error);
    }
    header("location: index.php");
?>