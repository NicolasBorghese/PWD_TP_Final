$(document).ready(function () {

    $("#formLogin").validate({
        rules: {
            usnombreLogin: {
                required: true
            },
            uspassLogin: {
                required: true
            },
            captchaLogin: {
                captchaLoginSinExpirar: {captchaLoginSinExpirar: true},
                required: true,
                captchaLoginCorrecto: {captchaLoginCorrecto: true}
            }
        },
        messages: {
            usnombreLogin: {
                required: "Ingrese su usuario"
            },
            uspassLogin: {
                required: "Ingrese su contraseña"
            },
            captchaLogin: {
                required: "Complete el captcha"
            }
        },
        errorElement: "span",

        errorPlacement: function (error, element) {

            var elementosRepetidos2 = document.querySelectorAll(".captcha-incorrecto");
            elementosRepetidos2.forEach(function(elemento2) {
                elemento2.remove();
            });

            error.addClass("invalid-feedback");
            element.closest(".contenedor-dato").append(error);
        },
        highlight: function (element) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid").addClass("is-valid");
        }
    });

    /*Función que valida si los datos son correctos, en caso de serlo
    el usuario ingresará a su cuenta */
    $("#formLogin").submit(function(event) {

        //event.preventDefault();

        var formData = $("#formLogin").serialize();
        var ruta = "../../Control/Ajax/ajaxLogin.php";

        $.ajax({
          url: ruta,
          type: "POST",
          data: formData,
          dataType: "json",
  
          success: function(respuesta) {

            if (respuesta.validacion == "exito"){

                //Resultado de loguearse correctamente
                window.location.href = "../home/home.php";

            } else if (respuesta.validacion == "captcha") {

            }
          }
        });
    });

    $("#actualizarCaptchaLogin").on("click", function() {
        $("#imgCaptchaLogin").attr("src", "../../Control/captchaLogin.php?r=" + Math.random());
    });
});

jQuery.validator.addMethod("captchaLoginSinExpirar", function (value, element) {
    return this.optional(element) || captchaLoginSinExpirar(value);
}, "El captcha ha expirado, por favor actualícelo");

jQuery.validator.addMethod("captchaLoginCorrecto", function (value, element) {
    return this.optional(element) || captchaLoginCorrecto(value);
}, "El captcha ingresado es incorrecto");

function captchaLoginSinExpirar(value){

    var formData = {'captchaLogin': value};
    var ruta = "../../Control/Ajax/captchaLoginSinExpirar.php";
    var resultado = false;
        
        $.ajax({

        url: ruta,
        type: "POST",
        data: formData,
        dataType: "json",
        async: false,

        success: function(respuesta) {

            if (respuesta.validacion == "exito"){
                resultado = true;
            }
        }

        });

    return resultado;
}

function captchaLoginCorrecto(value){

    var formData = {'captchaLogin': value};
    var ruta = "../../Control/Ajax/captchaLoginCorrecto.php";
    var resultado = false;
        
        $.ajax({

        url: ruta,
        type: "POST",
        data: formData,
        dataType: "json",
        async: false,

        success: function(respuesta) {

            if (respuesta.validacion == "exito"){
                resultado = true;
            }
        }

        });

    return resultado;
}

