
<!-- Crea un modal con un formulaario para crear una cuenta -->

<div class="modal fade" id="modalNuevoUsuario" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Complete los campos para crear un nuevo usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form name="formCrearUsuario" id="formCrearUsuario" method="POST" class="needs-validation" novalidate>
          
          <div class="contenedor-dato">
            <label for="nombreCrearUsuario" class="form-label">Nombre usuario</label>
            <input type="text" class="form-control" id="usnombreCrearUsuario" name="usnombreCrearUsuario">
          </div>
          <br>

          <div class="contenedor-dato">
            <label for="emailCrearUsuario" class="form-label">Email</label>
            <input type="text" class="form-control" id="emailCrearUsuario" name="emailCrearUsuario" placeholder="nombre@mail.com">
          </div>
          <br>
          
          <div class="contenedor-dato">
            <label for="passCrearUsuario" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="passCrearUsuario" name="passCrearUsuario">
          </div>
          <br>

          <div class="contenedor-dato">
            <label for="passCrearUsuario" class="form-label">Repita la contraseña</label>
            <input type="password" class="form-control" id="pass2CrearUsuario" name="pass2CrearUsuario">
          </div>
          <br>

          <div class="d-grid mb-3 gap-2">
            <button type="submit" name="botonCrearUsuario" id="botonCrearUsuario" class="btn text-white  btn-dark">CREAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="../estructura/js/validacionCrearCuenta.js"></script>
