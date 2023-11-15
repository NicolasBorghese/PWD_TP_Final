<?php
    include_once("../../configuracion.php");
    

    /* $objSession= new Session();
        $menuRoles = [];
    if ($objSession->activa()){
    $idRol = $objSession->getRol();*/

    /* $objMenuRol = new AbmMenuRol();
    $objRol = new AbmRol();*/

    $menu = new AbmMenu();
    $param['idpadre']= 4;/* el 2 corresponde a clientes,3 a deposito,4 a administrador*/
    $listaMenu= $menu->buscar($param);
    //print_r($listaMenu);
    require_once("cargarMenues.php");

//}
?>







