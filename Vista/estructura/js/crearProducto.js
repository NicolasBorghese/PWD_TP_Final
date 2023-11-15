function crearProducto(value){

    var formData = {'': value};//llenar con el id del formulario?
    var ruta = "../../Control/Ajax/crearNuevoProducto.php";
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