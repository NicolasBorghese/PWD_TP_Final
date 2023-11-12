$(document).ready(function () {

    $("#inicioSesion").validate({
        rules: {
            usnombre: {
                required: true
            },
            uspass: {
                required: true
            },
            captcha: {
                required: true,
                captchaValido: {captchaValido: true}
            }
        },
        messages: {
            usnombre: {
                required: "Ingrese su usuario"
            },
            uspass: {
                required: "Ingrese su contraseña"
            },
            captcha: {
                required: "Complete el captcha"
            }
        },
        errorElement: "span",

        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(".contenedor-dato").append(error);
        },
        highlight: function (element) {
            $(element).addClass("is-invalid")/*.removeClass("is-valid")*/;
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid")/*.addClass("is-valid")*/;
        }
    });

    /*Función que valida si los datos son correctos, en caso de serlo
    el usuario ingresará a su cuenta */
    $("#inicioSesion").submit(function(event) {

        //event.preventDefault();

        var formData = $("#inicioSesion").serialize();
        var ruta = "../../Control/Ajax/ajaxLogin.php";

        $.ajax({
          url: ruta,
          type: "POST",
          data: formData,
          dataType: "json",
  
          success: function(respuesta) {

            if (respuesta.validacion == "exito"){

                window.location.href = "../html/home.php";

            } else if (respuesta.validacion == "captcha") {

            }
          }
        });
    });

    $("#actualizarCaptcha").on("click", function() {
        $("#imgcaptcha").attr("src", "../../Control/captcha.php?r=" + Math.random());
    });
});

jQuery.validator.addMethod("captchaValido", function (value, element) {
    return this.optional(element) || validarCaptcha(value, element);
}, "Captcha incorrecto");

function validarCaptcha(value, element){

    var formData = {'captcha': value};
    var ruta = "../../Control/Ajax/ajaxCaptcha.php";

    $.ajax({
      url: ruta,
      type: "POST",
      data: formData,
      dataType: "json",

      success: function(respuesta) {

        if (respuesta.validacion == "exito"){

            var elementosRepetidos = document.querySelectorAll(".captcha-correcto");
            elementosRepetidos.forEach(function(elemento) {
                elemento.remove();
            });

            var contenedorMensaje = document.createElement("span");
            mensaje = "Captcha ingresado correctamente";
            contenedorMensaje.textContent = mensaje;
            $(contenedorMensaje).addClass("valid-feedback");
            $(contenedorMensaje).addClass("captcha-correcto");
            $(element).removeClass("is-invalid").addClass("is-valid");
            element.closest(".contenedor-dato").append(contenedorMensaje);

        } else {

            var elementosRepetidos = document.querySelectorAll(".captcha-correcto");
            elementosRepetidos.forEach(function(elemento) {
                elemento.remove();
            });

        }
      }
    });
}

