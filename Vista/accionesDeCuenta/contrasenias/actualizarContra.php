<?php
    include_once "../../../configuracion.php";
    $datos = data_submitted();
 
    
    $objUsuario = new AbmUsuario(); 
    $param["idusuario"] = $_SESSION['idusuario'];

    $listaUsuarios = $objUsuario->buscar($param);
    $param["usnombre"] = $listaUsuarios[0]->getUsNombre(); 
    $param["uspass"] = md5($datos["uspass"]); 
    $param["usmail"] =  $listaUsuarios[0]->getUsMail();
    $param["usdeshabilitado"] = null;
  

        $repuesta=$objUsuario->modificar($param);
        if($repuesta == true){
          $mensaje = "Datos modificados correctamente";
          header('Location: ../../home/home.php');
        } else {
          $mensaje= "No fue posible modificar datos.";
          header('Location: ../../home/home.php');
        } 
    //}
 
?>
     
<div class="modal" id="modal_id" tabindex="-1">
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

<script>
    $(document).ready(function() {
      $('#modal_id').modal('show');
    });
</script>
