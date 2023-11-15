<?php
$tituloPagina = "TechnoMate | Administrador";
include_once '../estructura/secciones/head.php';
include("../estructura/secciones/cargarMenues.php");
require_once("../../Modelo/Conector/BaseDatos.php");
include_once("../../configuracion.php");

?>
<div class ="contenido-pagina">
    <div class="contenedor-acciones">
        <div class="accion">
            <img class="imagen-accion" src="../../Archivos/Imagenes/accionDeposito1.png" alt="Crear nuevo usuario">
            <div class="informacion-accion">
                <p>NUEVOS PRODUCTOS</p>
                <button>Crear</button>
            </div>
        </div>
        <div class="accion">
            <img class="imagen-accion" src="../../Archivos/Imagenes/accionDeposito2.png" alt="Actualizar información de usuario">
            <div class="informacion-accion">
                <p>PRODUCTOS EXISTENTES</p>
                <button>Administrar</button>
            </div>
        </div>

        <div class="accion">
            <img class="imagen-accion" src="../../Archivos/Imagenes/accionDeposito3.png" alt="Administrar roles">
            <div class="informacion-accion">
                <p>STOCK DE PRODUCTOS</p>
                <button>Modificar</button>
            </div>
        </div>
    </div>
    <?php include_once '../accionesDeCuenta/contrasenias/cambiarContra.php';
    include_once '../accionesDeCuenta/nombreUsuario/cambiarUsuario.php';
    ?>
</div>


<?php

include_once '../estructura/secciones/footer.php';
?>