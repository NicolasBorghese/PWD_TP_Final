<?php
    include_once("../../configuracion.php");
    

    $objSession= new Session();
   // $rol=$_SESSION['rol'];
       /* $menuRoles = [];
    if ($objSession->activa()){
    $idRol = $objSession->getRol();*/

    /* $objMenuRol = new AbmMenuRol();
    $objRol = new AbmRol();*/

    $menu = new AbmMenu();
    $param['idpadre']= 3;/* el 3corresponde a clientes,2 a deposito,1 a administrador*/
    $listaMenu= $menu->buscar($param);
    //print_r($listaMenu);
    require_once("cargarMenues.php");

//}
?>







