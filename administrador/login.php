<?php
require "conexion.php";
session_start();
if(isset($_SESSION['id'])){
    header("Location: index.php");
  }
if($_POST){
  $usuario = $_POST['usuario'];
  $password= $_POST['password'];
  $sql= "select id,usuario,password,nombre from administrador where usuario='$usuario'";
  $resultado= $conn->query($sql);
  $num=$resultado->num_rows;
  if ($num>0){
    $row=$resultado->fetch_assoc();
    $pass_bd=$row['password'];
    $pass_c=sha1($password);
    if ($pass_bd==$pass_c) {
      $_SESSION['nombre']=$row['nombre'];
      $_SESSION['id']=$row['id'];
      header("Location: index.php");
    }else{
      echo "<script type='text/javascript'>alert('la contraseña no es correcta')</script>";
    }
  }else{
    echo "<script type='text/javascript'>alert('Este usuario no existe')</script>";
  }
}
?>
<!doctype html>
<html lang="en"  class="html">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISConvocatorias DREP</title>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" href="../estilos/bootstrap.min.css" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">


    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <div class="loginCaja">
  <div class="text-center card bg-white bodyLogin">
    
<main class="form-signin w-100 m-auto">
  <form action="login.php" method="POST">
    <img class="mb-4" src="../logos/logogrdrep.png" alt="Logo de la DREP" >
    <h1 class="h3 mb-3 fw-normal">Login <br>SISConvocatorias</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput"placeholder="Usuario" name="usuario">
      <label for="floatingInput">Usuario</label>
    </div>
    
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Contraseña</label>
    </div>

    
    <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
  </form>
</main>


    
  </div>
  </div>
</html>
