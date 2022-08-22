<?php

include('conexion.php');

$USUARIO=$_POST['usuario'];
$PASSWORD=$_POST['password'];

session_start();
$_SESSION['usuario']=$USUARIO;

$consulta = "SELECT* FROM usuarios where usuario = '$USUARIO' and password ='$PASSWORD' ";
$resultado= mysqli_query($mysqli, $consulta);


$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:panel.php");
 
}else{
    include("index.html");
    ?>
    <h1>ERROR DE AUTENTIFICACION</h1>
    <?php
    
}
mysqli_free_result($resultado);
mysqli_close($mysqli);





?>