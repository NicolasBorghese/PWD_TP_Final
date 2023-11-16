<?php
    include_once '../../configuracion.php';
    $datos = data_submitted();

    $objUsuario = new AbmUsuario();

    $passEncriptada= md5($datos['uspass']);
    $datos['uspass'] = $passEncriptada;
    $datos['usdeshabilitado'] = null;

    $param['idusuario'] = $datos['idusuario'];

    $usuario = $objUsuario->buscar($param);
    // print_r($usuario);

    if (!empty($usuario)){
        if ($objUsuario->modificar($datos)){
            echo "si";
            // header ('Location:listarUsuarios.php?error=0');
        }
    } else {
        echo "no";
        // header ('Location:./formActualizar.php?idusuario='.$datos['idusuario']);
    }
?>