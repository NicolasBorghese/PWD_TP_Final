<?php
         include_once ('../../configuracion.php');
         $datos= data_submitted();
         $objUsuario = new AbmUsuario();
         $listaUsuario=$Usuario->buscar($datos);
        
        if (count($listaUsuario) == 1 ){
            if ($objPersona-> modificar($datos)){
                $mensaje = "Datos modificados correctamente";
            }else{
                $mensaje= "No fue posible modificar datos.";
            }
        
        }else{
            $mensaje = "Datos NO modificados";
        }
?>
<div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">mensaje</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p> <?php echo $mensaje ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>