<?php
include_once("../../configuracion.php");
include_once '../../Control/AbmUsuario.php';
include_once '../../Modelo/Conector/BaseDatos.php';
include_once '../../Modelo/Usuario.php';

$tituloPagina = "TechnoMate | Administrador";
include_once '../estructura/secciones/head.php';

$objSesion = new Session();

if ($objSesion->validar()){
    if($_SESSION['rol'] == 2){
        include_once '../estructura/secciones/nav-bar-2.php';
    } else {
        header('Location: homeDeposito.php');
    }
} else {
    header('Location: home.php');
}


    $objProducto = new AbmProducto();
    $colProductos = $objProducto->buscar("");

?>

<div class="container-fluid" style="padding: 50px;">

<?php

if (!empty($colProductos)){
    echo "<h4 class='text-center text-white bg-dark'>Listado de productos</h4>";
    echo "<table class='table table-striped table-hover' >";
    echo "<tr>";
    echo "<th>ID de producto</th>
     <th>Descripción</th>
    <th>Cantidad de stock</th>
    <th>Acción</th>";
     
    foreach($colProductos as $producto){
       
        echo "<tr>
        <td>".$producto->getIdProducto()."</td>
        <td>".$producto->getProNombre()."</td>
        <td>".$producto->getProCantstock()."</td>
        <td><a class='btn text-white btn-dark href='formActualizar.php?idproducto=" . $producto->getIdProducto()."'>Actualizar</a></td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "<h4>No hay productos cargados en la Base de Datos</h4>h";
}
  
?>
</div>

<?php
include_once '../estructura/secciones/footer.php';
?>
