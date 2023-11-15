<?php
    include_once("../../configuracion.php");
    

    $objSession= new Session();
    $rol=$_SESSION['rol'];
       /* $menuRoles = [];
    if ($objSession->activa()){
    $idRol = $objSession->getRol();*/

    /* $objMenuRol = new AbmMenuRol();
    $objRol = new AbmRol();*/

    $menu = new AbmMenu();
    $param['idpadre']= $rol;/* el 2 corresponde a clientes,3 a deposito,4 a administrador*/
    $listaMenu= $menu->buscar($param);
    //print_r($listaMenu);
    require_once("cargarMenues.php");

//}
?>







