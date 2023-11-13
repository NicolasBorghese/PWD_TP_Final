<?php
    include_once("../../configuracion.php");
    

 $objSession= new Session();
      $menuRoles = [];
if ($objSession->activa()){
  $idRol = $objSession->getRol();


 /* $objMenuRol = new AbmMenuRol();
  $objRol = new AbmRol();*/

    $menu = new AbmMenu();
    $param['idpadre']= $idRol;
    $listaMenu= $menu->buscar($param);
    //print_r($listaMenu);
    require_once("cargarMenues.php");
}
?>







