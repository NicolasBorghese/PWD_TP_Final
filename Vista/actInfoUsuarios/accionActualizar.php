<?php
    include_once '../../configuracion.php';
    $datos = data_submitted();

    // print_r($datos);

    $objUsuario = new AbmUsuario();

    $passEncriptada= md5($datos['uspass']);
    $datos['uspass'] = $passEncriptada;
    $datos['usdeshabilitado'] = null;
        
    $listaUsuarios= $objUsuario->buscar($datos);
    $exito = false;

    if (empty($listaUsuarios)){
        if ($objUsuario->modificar($datos)){
            echo "si";
        }
    } else {
        echo "No es posible modificar datos";
    }
?>