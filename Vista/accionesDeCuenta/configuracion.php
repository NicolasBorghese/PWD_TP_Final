<!-- Crea un modal con un formulaario modificar datos de cuenta -->
<div class="modal fade" id="modalConfiguracion" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ingrese el dato a modificar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form name="formConfigCuenta" id="formConfigCuenta" method="POST"  action="ActualizarDatosUsuario.php" class="needs-validation" novalidate>
          
          <div class="contenedor-dato">
            <label for="usnombre" class="form-label">Nuevo Nombre usuario</label>
            <input type="text" class="form-control" id="usnombre" name="usnombre">
          </div>
          <br>

          <div class="contenedor-dato">
            <label for="uspass" class="form-label"> Nueva Contraseña</label>
            <input type="password" class="form-control" id="uspass" name="uspass">
          </div>

          <br>
          <div class="d-grid mb-3 gap-2">
            <button type="submit" name="botonActualizar" id="botonActualizar" class="btn text-white  btn-dark">ACTUALIZAR</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="d-grid gap-2 col-6 mx-auto">
        </div>
      </div>
    </div>
  </div>
</div>