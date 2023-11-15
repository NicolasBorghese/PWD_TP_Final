<?php
include_once '../../configuracion.php';
include_once '../estructura/secciones/head.php';
$cod=$_REQUEST['codigo'];

$param['idproducto']=$cod;

//echo $cod;
$objProducto= new AbmProducto();

$listaProd=$objProducto->buscar($param);
//print_r($listaProd);
 
    $nombre=$listaProd[0]->getProNombre();
    $precio=$listaProd[0]->getProDetalle();
    $imagen=$listaProd [0]->getImagenProducto();

?>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?php echo $imagen?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"> <?php echo $nombre?></h5>
        <p class="card-text">$<?php echo $precio?> </p>
        <label for="customRange3" class="form-label">Example range</label>
        <input type="range" class="form-range" min="1" max="100" step="0.5" id="customRange3">
        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
        <imput>
        <button class="btn btn-primary" type="button">Agregar al carrito</button>
      </div>
    </div>
  </div>
</div>

