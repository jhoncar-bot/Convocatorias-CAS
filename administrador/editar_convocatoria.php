<div class="modal fade" id="Modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edite una Convocatoria:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="convocatoriaEvalua.php" method="GET" id="enviar" >
                 <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">N° de Convocatoria:</label>
                  <input type="text" class="form-control" name="numConvocatoria" value="<?php echo $numConvocatoria; ?>" placeholder="N° de Convocatoria">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Cargo:</label>
                  <input type="text" class="form-control" name="cargo" value="<?php echo $cargo; ?>"  placeholder="Cargo">
                </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Estado:</label>
                <input type="text" class="form-control" name="estado" value="<?php echo $estado; ?>" placeholder="Estado">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Bases:</label>
                <input type="text" class="form-control" name="base" value="<?php echo $bases; ?>" placeholder="Link">
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