$(document).ready(function () {

    $("#formCrearCuenta").validate({
        rules: {
            usnombreCrearCuenta: {
                required: true,
                nombreNoRepetido: {nombreNoRepetido: true}
            },
            usmailCrearCuenta: {
                required: true,
                mailValido: {mailValido: true}
            },
            captchaCrearCuenta: {
                captchaCrearCuentaSinExpirar: {captchaCrearCuentaSinExpirar: true},
                required: true,
                captchaCrearCuentaCorrecto: {captchaCrearCuentaCorrecto: true}
            }
        },
        messages: {
            usnombreCrearCuenta: {
                required: "Ingrese su usuario"
            },
            usmailCrearCuenta: {
                required: "Ingrese su dirección de mail"
            },
            captchaCrearCuenta: {
                required: "Complete el captcha"
            }
        },
        errorElement: "span",

        errorPlacement: function (error, element) {
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
    se creara una cuenta de usuario sin rol que deberá asignar un admin */
    /*$("#formCrearCuenta").submit(function(event) {

        //event.preventDefault();

        var formData = $("#formCrearCuenta").serialize();
        var ruta = "../../Control/Ajax/ajaxCrearCuenta.php";

        $.ajax({
          url: ruta,
          type: "POST",
          data: formData,
          dataType: "json",
  
          success: function(respuesta) {

            if (respuesta.validacion == "exito"){

                //Resultado de crear la cuenta correctamente
                window.location.href = "../home/home.php";

            } else if (respuesta.validacion == "captcha") {

            }
          }
        });
    });*/

    $("#actualizarCaptchaCrearCuenta").on("click", function() {
        $("#imgCaptchaCrearCuenta").attr("src", "../../Control/captchaCrearCuenta.php?r=" + Math.random());
    });
});

jQuery.validator.addMethod("nombreNoRepetido", function (value, element) {
    return this.optional(element) || nombreNoRepetido(value);
}, "Nombre de usuario en uso");

jQuery.validator.addMethod("mailValido", function (value, element) {
    return this.optional(element) || (/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(value));
}, "Mail ingresado no válido");

jQuery.validator.addMethod("captchaCrearCuentaSinExpirar", function (value, element) {
    return this.optional(element) || captchaCrearCuentaSinExpirar(value);
}, "El captcha ha expirado, por favor actualícelo");

jQuery.validator.addMethod("captchaCrearCuentaCorrecto", function (value, element) {
    return this.optional(element) || captchaCrearCuentaCorrecto(value);
}, "El captcha ingresado es incorrecto");


function nombreNoRepetido(value){

    var formData = {'usnombreCrearCuenta': value};
    var ruta = "../../Control/Ajax/nombreNoRepetido.php";
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

/**
 * GUARDAR ESTA FUNCIÓN, DEVUELVE LOS ERRORES
 */
function nombreNoRepetido2(value) {

    var formData = {'usnombreCrearCuenta': value};
    var ruta = "../../Control/Ajax/nombreNoRepetido.php";

    console.log("Previo al Ajax");

    return $.ajax({
        url: ruta,
        type: "POST",
        data: formData,
        dataType: "json"
    }).then(function(respuesta) {
        console.log("Hubo éxito en la consulta Ajax");
        console.log(respuesta.validacion);
        return respuesta.validacion === "exito";
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.error("Error en la solicitud Ajax: " + textStatus + " - " + errorThrown);
        return false;
    });
}

// Ejemplo de uso
nombreNoRepetido("nombreUsuario").then(function(resultado) {
    console.log(resultado);
});

function captchaCrearCuentaSinExpirar(value){

    var formData = {'captchaCrearCuenta': value};
    var ruta = "../../Control/Ajax/captchaCrearCuentaSinExpirar.php";
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

function captchaCrearCuentaCorrecto(value){

    var formData = {'captchaCrearCuenta': value};
    var ruta = "../../Control/Ajax/captchaCrearCuentaCorrecto.php";
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

