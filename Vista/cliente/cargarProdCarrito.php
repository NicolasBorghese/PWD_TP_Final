<?php
include_once("../../configuracion.php");
include_once("../estructura/headSeguro.php");
include_once("../estructura/navSeguro.php");


$datos = data_submitted();


//print_r($datos);
 $param['idproducto']=$datos['id'];
 $objAbmProducto = new AbmProducto(); 
 $arregloProd=$objAbmProducto-> buscar($param["idproducto"]);


 $parametros["idusuario"] = $_SESSION['idusuario'];

 $objUsuario = new AbmUsuario(); 
 $usuario =$objUsuario->buscar($parametros);

 $objetoCompra = new AbmCompra($param);
 $comprActiva = $objetoCompra->buscarCarritoAbierto($parametros);

 $paramIte['idusuario']=$datos['id'];
 $paramIte['idcompra']=$comprActiva;
 $paramIte['cicantidad']=$datos['cantidad'];

  if(  $comprActiva != null){
    $objItem = new AbmCompraItem();
    $altaItem =$objItem->alta($paramIte);
  }else{

      $fechaAlta = date('Y-m-d H:i:s');
      $param['idusuario']=$datos['id'];
      $param["cofecha"] =$fechaAlta;
      $objetoCompra->alta($param);

     $compra= $objetoCompra->buscar($param); 
     print_r(
      $compra);

     $param['idcompra']=$compra['idcompra']; 

     $objItem = new AbmCompraItem();
     $objItem->alta($param);

  }

  include_once("../estructura/footer.php");
?>

