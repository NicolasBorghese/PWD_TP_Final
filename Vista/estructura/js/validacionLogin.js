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
                required: true,
                captchaLoginValido: {captchaLoginValido: true}
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
            error.addClass("invalid-feedback");
            element.closest(".contenedor-dato").append(error);
        },
        highlight: function (element) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid")/*.addClass("is-valid")*/;
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

jQuery.validator.addMethod("captchaLoginValido", function (value, element) {
    return this.optional(element) || validarCaptchaLogin(value, element);
}, "Captcha incorrecto");

function validarCaptchaLogin(value, element){

    var formData = {'captchaLogin': value};
    var ruta = "../../Control/Ajax/ajaxCaptchaLogin.php";
    
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

