<?php
require_once "../../configuracion.php";

$datos = data_submitted();

$usnombre = $datos["usnombreCrearCuenta"];
$param['usnombre'] = $usnombre;

$objUsuario = new AbmUsuario();
//$colUsuarios = $objUsuario->buscar($param);

if (count($objUsuario->darValor($param)) == 1){
    $respuesta = array("validacion" => "exito");
    
} else {
    $respuesta = array("validacion" => "error", "error" => "Nombre de usuario en uso");
    
}

echo json_encode($respuesta);
?>