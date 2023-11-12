<!-- Crea un modal con un formulaario para crear una cuenta -->

<div class="modal fade"  id="mimodal" data-bs-backdrop="static">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Crear una Cuenta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
       <form name="formCuenta" id="formCuenta" action="Vista/crearCuenta/accionVerifDatos.php" method="POST" class="needs-validation" novalidate >
         <div class="contenedor-dato">
            <label for="usuario" class="form-label">Nombre usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="moni74" required>
            <div class="valid-feedback">
                bien!
            </div>
            <div class="invalid-feedback">
                EL campo no puede estar vacio!
            </div>
         </div>
     <br>
         <div class="contenedor-dato">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" pattern="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/" required>
          <div class="valid-feedback">
            bien!
          </div>
          <div class="invalid-feedback">
            Ingrese un mail valido!
        </div>
     </div>
     <br>
        <div class="contenedor-dato">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="password" name="password" required >
          <div class="valid-feedback">
            bien!
          </div>
          <div class="invalid-feedback">
            Ingrese una contraseña valida!
        </div>
     </div>
     <br>
     <div class="contenedor-dato">
       <label for="password" class="form-label">Repita Contraseña</label>
       <input type="password" class="form-control" id="password" name="password"  required>
       <div class="valid-feedback">
            bien!
          </div>
          <div class="invalid-feedback">
          Ingrese una contraseña valida!
        </div>
     </div>
     <br>
     <div class="d-grid mb-3 gap-2">
        <button type="submit" name="btn" id="btn" class="btn text-white  btn-dark" >Registrarme</button>
     </div>   
    </form> 
 </div>
      <div class="modal-footer">
      <div class="d-grid gap-2 col-6 mx-auto" >
          <a class="btn btn-outline-secondary"  data-bs-toggle="modal" data-bs-target="#mimodal2" tabindex="-1" data-bs-toggle="modal">Iniciar sesion</a>
     </div>
      </div>
    </div>
  </div>
</div>

<script >

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