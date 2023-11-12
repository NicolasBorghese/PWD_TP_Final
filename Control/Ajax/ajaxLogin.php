<?php
if (isset ($_POST)){

    $email = $_POST["direccionMail"];
    $contrasenia = $_POST["contrasenia"];
    $captcha = sha1($_POST["captcha"]);
    $cookieCapcha = $_COOKIE["captchaLogin"];
    $tiempoCaptcha = $_COOKIE["tiempoCaptchaLogin"];

    $respuesta = array();

    $objSesion = new Session();
    $objCuenta->iniciar($email, $contrasenia);
    $sesionValida = $objCuenta->validar(); 

    if ($captcha == $cookieCapcha ) {
        $respuesta["validacionCaptcha"] = "correcto";

        if ($sesonValida) {
            $respuesta["sesionValida"] = "correcto";
            setcookie("captchaLogin",'', time()-3600);
        } else {
            $respuesta["sesionValida"] = "incorrecto";
        }
    } else {
        $respuesta["validacionCaptcha"] = "incorrecto";
    }

    echo json_encode($respuesta);

}
