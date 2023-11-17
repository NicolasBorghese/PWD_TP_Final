<?php
    include_once '../../../configuracion.php';
    //session_start();
    $datos = data_submitted();
    verEstructura($datos);

    $objUsuario = new AbmUsuario();
    $objUsuarioRol = new AbmUsuarioRol();

    //$passEncriptada= md5($datos['uspass']);
    //$datos['uspass'] = $passEncriptada;
    //$datos['usdeshabilitado'] = null;

    $param['idusuario'] = $datos['idusuario'];

    $usuario = $objUsuario->buscar($param);
    verEstructura($usuario);
    $usuarioRol = $objUsuarioRol->buscar($param);
    verEstructura($usuarioRol);

    $arrayDatos['idusuario'] = $datos['idusuario'];//este no se modifica
    $arrayDatos['usnombre'] =$datos['usnombre'];
    $arrayDatos['uspass'] = $usuario[0]->getUsPass();//este no se modifica
    $arrayDatos['usmail'] = $datos['usmail'];
    $arrayDatos['usdeshabilitado'] = null;
    verEstructura($arrayDatos);

    if (!empty($usuario)){
        if ($objUsuario->modificar($arrayDatos)){
            $_SESSION['usnombre'] = $datos['usnombre'];
            $paramUsuarioRol['idusuario'] = $param['idusuario'];//id de usuario
            //
            if(array_key_exists('Cliente', $datos)){
    
                $paramUsuarioRol['idrol'] = 3;
                $objUsuarioRol->alta($paramUsuarioRol);
            }
            if(array_key_exists('Deposito', $datos)){
                $paramUsuarioRol['idrol'] = 2;
                $objUsuarioRol->alta($paramUsuarioRol);
            }
            if(array_key_exists('Admin', $datos)){
                $paramUsuarioRol['idrol'] = 1;
                $objUsuarioRol->alta($paramUsuarioRol);
            }
            if(array_key_exists('quitarCliente', $datos)){
    
                $paramUsuarioRol['idrol'] = 3;
                $objUsuarioRol->baja($paramUsuarioRol);
            }
            if(array_key_exists('quitarDeposito', $datos)){
                $paramUsuarioRol['idrol'] = 2;
                $objUsuarioRol->baja($paramUsuarioRol);
            }
            if(array_key_exists('quitarAdmin', $datos)){
                $paramUsuarioRol['idrol'] = 1;
                $objUsuarioRol->baja($paramUsuarioRol);
            }
            echo "si";
            //header ('Location: ../actInfoUsuarios/listarUsuarios.php?exito='.$datos['usnombre']);
        }
    } 


    /* if (!empty($usuario)){
        if ($objUsuario->modificar($datos)){
            $_SESSION['usnombre'] = $datos['usnombre'];
            //echo "si";
            header ('Location: ../actInfoUsuarios/listarUsuarios.php?exito='.$datos['usnombre']);
        }
    } else {
        //echo "no";
        header ('Location: ../actInfoUsuarios/formActualizar.php?idusuario='.$datos['idusuario']);
    } */
?>