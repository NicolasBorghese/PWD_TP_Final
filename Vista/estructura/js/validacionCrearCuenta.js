$(document).ready(function () {

    $("#formCrearCuenta").validate({
        rules: {
            usnombreCrearCuenta: {
                required: true,
                nombreNoRepetido: {nombreNoRpetido: true}
            },
            usmailCrearCuenta: {
                required: true,
                mailValido: {mailValido: true}
            },
            captchaCrearCuenta: {
                required: true,
                captchaCrearCuentaValido: {captchaCrearCuentaValido: true}
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
    $("#formCrearCuenta").submit(function(event) {

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
    });

    $("#actualizarCaptchaCrearCuenta").on("click", function() {
        $("#imgCaptchaCrearCuenta").attr("src", "../../Control/captchaCrearCuenta.php?r=" + Math.random());
    });
});

jQuery.validator.addMethod("captchaCrearCuentaValido", function (value, element) {
    return this.optional(element) || validarCaptchaCrearCuenta(value, element);
}, "Captcha incorrecto");

jQuery.validator.addMethod("nombreNoRepetido", function (value, element) {
    return this.optional(element) || validarNombre(value, element);
}, "Nombre de usuario en uso");

jQuery.validator.addMethod("mailValido", function (value, element) {
    return this.optional(element) || (/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(value));
}, "Mail ingresado no válido");

function validarCaptchaCrearCuenta(value, element){

    var formData = {'captchaCrearCuenta': value};
    var ruta = "../../Control/Ajax/ajaxCaptchaCrearCuenta.php";

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

function validarNombre(value, element){

    var formData = {'usnombre': value};
    var ruta = "../../Control/Ajax/ajaxValidarNombre.php";

    $.ajax({
      url: ruta,
      type: "POST",
      data: formData,
      dataType: "json",

      success: function(respuesta) {

        if (respuesta.validacion == "exito"){

            var elementosRepetidos = document.querySelectorAll(".nombre-disponible");
            elementosRepetidos.forEach(function(elemento) {
                elemento.remove();
            });

            var contenedorMensaje = document.createElement("span");
            mensaje = "Nombre de usuario disponible";
            contenedorMensaje.textContent = mensaje;
            $(contenedorMensaje).addClass("valid-feedback");
            $(contenedorMensaje).addClass("nombre-disponible");
            $(element).removeClass("is-invalid").addClass("is-valid");
            element.closest(".contenedor-dato").append(contenedorMensaje);

        } else {

            var elementosRepetidos = document.querySelectorAll(".nombre-disponible");
            elementosRepetidos.forEach(function(elemento) {
                elemento.remove();
            });

        }
      }
    });
}

