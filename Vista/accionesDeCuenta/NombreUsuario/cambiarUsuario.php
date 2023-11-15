<?php
include_once ("../../configuracion.php");
   $objSession= new Session();
 /*  
if ($objSession->activa()){
  $idRol = $objSession->getRol();
  }*/
?>


<!-- Crea un modal con un formulaario modificar nombres de los usuarios -->
<div class="modal fade" id="modalCambiarUsuario" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cambiar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form name="formCambiarContra" id="formCambiarContra" method="POST"  action="../accionesDeCuenta/nombreUsuario/actualizarUsuario.php" class="needs-validation" novalidate>
        <div hidden class="contenedor-dato ">
            <input  type="text" class="form-control" id="idusuario" name="idusuario" value="3">
          </div>
        
          <div class="contenedor-dato">
            <label for="uspass" class="form-label"> Nuevo Usuario</label>
            <input type="text" class="form-control" id="usnombre" name="usnombre">
          </div>

          <br>
          <div class="d-grid mb-3 gap-2">
            <button type="submit" class="btn text-white  btn-dark">ACTUALIZAR</button>
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