
<!-- Crea un modal con un formulaario para iniciar sesion-->

<div class="modal fade" id="modalLogin" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ">Iniciar sesión</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form name="inicioSesion" id="inicioSesion" method="POST" class="needs-validation" novalidate>

          <div class="contenedor-dato">
            <label for="usnombre" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="usnombre" name="usnombre">
          </div>
          <br>
          <div class="contenedor-dato">
            <label for="uspass" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="uspass" name="uspass">
          </div>
          <br>
          <div class="contenedor-dato">
            <label for="captcha" class="form-label">Captcha</label>
            <input type="text" class="form-control" id="captcha" name="captcha">
          </div>
          <br>
          <div class="contenedor-dato input-group mb-3">
            <img src="../../Control/captcha.php" id="imgcaptcha" alt="Imagen de captcha" class="img-fluid rounded-start" style="width: 75%;">
            <button class="btn btn-secondary" type="button" id="actualizarCaptcha" name="actualizarCaptcha" style="width: 25%;"><i class="bi bi-arrow-clockwise"></i></button>
          </div>
          <br>
          <div class="d-grid mb-3 gap-2">
            <button type="submit" id="btn" class="btn btn-dark" name="btn">INGRESAR</button>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <div class="d-grid gap-2 col-6 mx-auto">
          <a class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalCrearCuenta" tabindex="-1" data-bs-toggle="modal">Crear Cuenta</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="../estructura/js/validacionLogin.js"></script>
