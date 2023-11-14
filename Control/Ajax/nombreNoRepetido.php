<?php

include_once "../../configuracion.php";
$datos = data_submitted();

$usnombreCrearCuenta = $datos["usnombreCrearCuenta"];

$parametros['usnombre'] = $usnombreCrearCuenta;

$objUsuario = new AbmUsuario();
$colUsuarios = $objUsuario->buscar($parametros);

if (count($colUsuarios) == 0){
    $respuesta = array("validacion" => "exito");
    
} else {
    $respuesta = array("validacion" => "error", "error" => "Nombre de usuario en uso");
    
}

echo json_encode($respuesta);

?>