<!-- ____________________________________ NAV BAR 1 ________________________________ -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-Toggler" aria-controls="navbar-Toggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse menuUsuario" id="navbar-Toggler">
            <div class="navbar-brand">
                <img src="../../Archivos/Imagenes/logoBlanco.png" alt="Logo de la empresa" onload="actualizarNombreUsuarioCuenta()" width="110">
            </div>
            <ul class="navbar-nav d-flex justify-content-center align-items-center">
                <?php
                for ($i = 0; $i < count($listaMenu); $i++) {
                    if ($listaMenu[$i]->getMeDeshabilitado() == null) {

                        /*lee los datos de los menues cargados*/
                        $ruta = $listaMenu[$i]->getMeDescripcion();
                        $nombre = $listaMenu[$i]->getMeNombre();

                        if ($nombre == 'iconoCarrito') {/*espara que coloque el icono carrito*/
                            $nombre = "<i class='bi bi-cart-plus-fill '></i>";
                        }
                        echo '<li class="nav-item"> <a class="nav-link" aria-current="page" href=' . $ruta . '>' . $nombre . '</a> </li>'; // acomoda los menues en lista
                    }
                }
                ?>
                <ul class="nav menuUsuario2">
                    <li class="dropdown row">

                        <a href="#" class="text-white text-decoration-none nav-link nav-item" data-bs-toggle="dropdown">
                            <div>
                                <span id="nombreUsuarioCuenta" ><?php //echo $_SESSION['usnombre'] ?></span>
                                <i class="bi bi-person-fill fa-3x zoom-icon "></i>
                                <i class="dropdown-toggle"></i>
                            </div>
                        </a>

                        <ul class=" dropdown-menu dropdown-menu-down">
                            <li><a class="text-black text-decoration-none " data-bs-toggle="modal" data-bs-target="#modalConfiguracion" tabindex="-1" onclick="actualizarDatosUsuario()">Configuración</a></li>
                            <li><a class="text-black text-decoration-none " data-bs-toggle="modal" data-bs-target="#modalCambiarRol" tabindex="-1">Cambiar Rol</a></li>
                            <hr class="dropdown-divider">
                            <li><a class="text-black text-decoration-none " href="../accionesDeCuenta/cerrarSession.php">Cerrar Sesion</a></li>
                        </ul>
                    </li>
                </ul>

            </ul>
        </div>
    </div>
</nav>

<script>
    function actualizarNombreUsuarioCuenta(){
    var nombreUsuarioCuentaElem = document.getElementById("nombreUsuarioCuenta");

    $.ajax({ 
        url: "../../Control/Ajax/actualizarNombreUsuarioCuenta.php",
        type: "POST",
        dataType: "json",
        //data: formData,
        async: false,

        complete: function(xhr, textStatus) {
            //se llama cuando se recibe la respuesta (no importa si es error o éxito)
            console.log("La respuesta regreso");
        },
        success: function(respuesta, textStatus, xhr) {
            console.log("El nombre es: " +respuesta.nombre);
            nombreUsuarioCuentaElem.innerHTML = respuesta.nombre;
        },
        error: function(xhr, textStatus, errorThrown) {
            //called when there is an error
            console.error("Error en la solicitud Ajax: " + textStatus + " - " + errorThrown);
            console.error(xhr.responseText);
        }
    });
    window.onload = actualizarNombreUsuarioCuenta;
}
</script>