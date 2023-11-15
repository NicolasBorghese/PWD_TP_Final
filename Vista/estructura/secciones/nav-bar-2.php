<?php
    include_once("../../configuracion.php");
    

    $objSession= new Session();
<<<<<<< HEAD
   // $rol=$_SESSION['rol'];
=======
    $rol = $_SESSION['rol'];
>>>>>>> 5e7c3e2f5d807dd5c7e812849f5cc3acfa9ef458
       /* $menuRoles = [];
    if ($objSession->activa()){
    $idRol = $objSession->getRol();*/

    /* $objMenuRol = new AbmMenuRol();
    $objRol = new AbmRol();*/

    $menu = new AbmMenu();
<<<<<<< HEAD
    $param['idpadre']= 3;/* el 3corresponde a clientes,2 a deposito,1 a administrador*/
=======
    $param['idpadre'] = $rol;/* el 2 corresponde a clientes,3 a deposito,4 a administrador*/
>>>>>>> 5e7c3e2f5d807dd5c7e812849f5cc3acfa9ef458
    $listaMenu= $menu->buscar($param);
    //print_r($listaMenu);
    require_once("cargarMenues.php");

//}
?>







