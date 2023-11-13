<?php

include_once "../../configuracion.php";
$datos = data_submitted();

$captcha = sha1($datos["captchaCrearCuenta"]);
$cookieCapcha = $_COOKIE["captchaCrearCuenta"];

if ($captcha == $cookieCapcha ){
  $respuesta = array("validacion" => "exito");
  
} else {
  $respuesta = array("validacion" => "captcha", "error" => "Captcha incorrecto");
    
}

echo json_encode($respuesta);

?>