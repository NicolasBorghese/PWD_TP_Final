<!-- Crea un modal con un formulaario para iniciar sesion-->

<div class="modal fade" id="mimodal2" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ">Iniciar sesion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form name="inicioSesion" id="inicioSesion" action="Vista/login/accionLogin.php" method="POST" class="needs-validation" novalidate>

          <div class="contenedor-dato">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Moni74" required>
            <div class="valid-feedback">
              bien!
            </div>
            <div class="invalid-feedback">
              Ingrese un usuario correcto!
            </div>
          </div>
          <br>
          <div class="contenedor-dato">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <div class="valid-feedback">
              bien!
            </div>
            <div class="invalid-feedback">
              Ingrese una contraseña valida!
            </div>
          </div>
          <br>
          <div class="d-grid mb-3 gap-2">
            <button type="submit" id="btn" class="btn btn-dark" name="btn">Login</button>
          </div>
        </form>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>
</div>
<script>
  // colocolo aca este js porque no me esta tomando la validacion poniendo el escrip en el encabezado
  (() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  })();
</script>