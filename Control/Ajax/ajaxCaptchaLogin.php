<?php

include_once "../../configuracion.php";
$datos = data_submitted();

$captcha = sha1($datos["captchaLogin"]);
$cookieCaptcha = $_COOKIE["captchaLogin"];

if ($captcha == $cookieCaptcha ){
  $respuesta = array("validacion" => "exito");

} else {
  $respuesta = array("validacion" => "captcha", "error" => "Captcha incorrecto");
    
}

echo json_encode($respuesta);

?>