<?php
include_once ("../../configuracion.php");
   $objSession= new Session();
   
   
/*if ($objSession->activa()){
  $objUsuario = $objSession->getUsuario();
 }else{
  echo "El usuario no este logeado";
 }*/
 /*<?echo $objUsuario->getIdUsuario()?>*/
?>

<!-- Crea un modal con un formulaario modificar contraseña de los usuarios -->
<div class="modal fade" id="modalCambiarContra" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cambiar contraseña</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form name="formCambiarContra" id="formCambiarContra" method="POST"  action="../accionesDeCuenta/contrasenias/actualizarContra.php" class="needs-validation" novalidate>
           <div hidden class="contenedor-dato ">
            <input  type="text" class="form-control" id="idusuario" name="idusuario" value="3">
          </div>
          <div class="contenedor-dato">
            <label for="uspass" class="form-label"> Nueva Contraseña</label>
            <input type="password" class="form-control" id="uspass" name="uspass">
          </div>

          <br>
          <div class="d-grid mb-3 gap-2">
            <button type="submit" name="botonActualizarContra" id="botonActualizarContra" class="btn text-white  btn-dark">ACTUALIZAR</button>
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