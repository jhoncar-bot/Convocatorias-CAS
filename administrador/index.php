<?php 
include("options.php");
include("conexion.php");
$sql="SELECT * FROM convocatoria";
$resultado=$conn->query($sql);

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <?php 
  /*$sql="INSERT INTO convocatoria(numConvocatoria,cargo,estado,bases) VALUES ('CAS 039-2022','EXPERTO(A) DE COMUNICACIONES','EN PROCESO','https://talento.sunedu.gob.pe/')";*/
  $sql="DELETE FROM convocatorias WHERE id=3";
  $eliminar=$conn->query($sql);
  if ($eliminar) {
    echo "Se borro el dato correctamente";
  }else{
    echo "no se borro el dato";
  }
  print($sql);
  print("<br>");
  print($resultado->num_rows);
  print("<br>");
/*while ($fila=$resultado->fetch_row()) {
      $num=$fila[0];
    echo $num." ".$fila[1]." ".$fila[2];
    print("<br>");
  // code...
  }*/
/*  $row = $resultado->fetch_row();
 foreach ($resultado->lengths as $i => $val) {
        printf("El campo %2d tiene por Largo %2d\n", $i+1, $val);
        print("<br>");
      }*/

      ?>

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Launch demo modal
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregue una Convocatoria:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="convocatoriaEvalua.php" method="GET" id="enviar" >
                 <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">N° de Convocatoria:</label>
                  <input type="text" class="form-control" name="numConvocatoria" placeholder="N° de Convocatoria">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Cargo:</label>
                  <input type="text" class="form-control" name="cargo"  placeholder="Cargo">
                </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Estado:</label>
                <input type="text" class="form-control" name="estado" placeholder="Estado">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Bases:</label>
                <input type="text" class="form-control" name="base" placeholder="Link">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" form="enviar">Guardar</button>
          </div>
        </div>
      </div>
    </div>

  </div>

  <h2>Section title</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead >
        <tr>
          <th >#</th>
          <th >N° de Convocatoria</th>
          <th >Cargo</th>
          <th >Estado</th>
          <th >Bases</th>
          <th>Editar</th>
          <th >Elimnar</th>
        </tr>
      </thead>
      <tbody>
        <?php while($fila=$resultado->fetch_row()) {?>
          <tr >
            <td><?php echo $fila[0]?></td>
            <td><?php echo $fila[1]?></td>
            <td><?php echo $fila[2]?></td>
            <td><?php echo $fila[3]?></td>
            <td><?php echo $fila[4]?></td>
            <td class="icono"><a href=" "><i class="bi bi-plus-square"></i></a></td>
            <td><a href=" "><i class="bi bi-trash3"></a></i></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

  </div>

</main>



<style type="text/css">
.icono{
  background-color: red;
  }
/*  thead{
    background-color: red;
  }*/
</style>
