<?php
include_once "../../configuracion.php";
$sesion= new Session();
if ($sesion->activa()) {
    $listaUsuarioRol = new AbmUsuarioRol();// el buscar devuelve objetos UsuarioRol
    $listaUsuarioRol = $sesion->getRol();// lista(array) de obj UsuarioRol
    verEstructura($listaUsuarioRol);
    $idRol=$listaUsuarioRol['idrol'];
    $menuRol= new AbmMenuRol();
    $buscaMenu['idmenu']= $menuRol->buscar($idRol);//bucsamos el menu por el id del rol
    $listaIdMenu= $buscaMenu['idmenu'];
    $objMenu = new AbmMenu();
    $menu = $objMenu->buscar($listaIdMenu);// lista de menus

    
}
?>