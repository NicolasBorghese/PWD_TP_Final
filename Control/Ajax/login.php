<?php

include_once "../../configuracion.php";
$datos = data_submitted();

$usnombre = $datos['usnombreLogin'];
$uspass = $datos['uspassLogin'];

$param['usnombre'] = $usnombre;

$objUsuario = new AbmUsuario();
$colUsuarios = $objUsuario->buscar($param);

if (count($colUsuarios) == 1){
    
    $param['uspass'] = $uspass;
    $colUsuarios = $objUsuario->buscar($param);

    if (count($colUsuarios) == 1){

        $objSesion = new Session();
        $respuesta = array("resultado" => "exito", "mensaje" => "Inicio de sesión exitoso");
        $objSesion->iniciar($usnombre, $uspass);
       /* if($objSesion ->validar()){
            $respuesta = array("resultado" => "exito", "mensaje" => "Inicio de sesión exitoso");
        }else{
            $respuesta = array("resultado" => "error", "mensaje" => "Esta cuenta aun no tiene roles asignados.");
        }*/

    } else {
        $respuesta = array("resultado" => "error", "mensaje" => "El nombre de usuario y contraseña no coinciden");
    }
    
} else {
    $respuesta = array("resultado" => "error", "mensaje" => "El nombre de usuario no existe");
    
}

echo json_encode($respuesta);
?>