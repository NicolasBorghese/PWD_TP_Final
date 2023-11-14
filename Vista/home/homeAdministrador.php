<?php
$tituloPagina = "TechnoMate | Administrador";
include_once '../estructura/secciones/head.php';
include("../estructura/secciones/nav-bar-1.php");
require_once("../../Modelo/Conector/BaseDatos.php");
include_once("../../configuracion.php");

?>
<div class ="contenido-pagina">
    <div class="contenedor-acciones">
        <div class="accion-admin">
            <img class="imagen-accion" src="../../Archivos/Imagenes/accionAdmin1.png" alt="Crear nuevo usuario">
            <div class="informacion-accion">
                <p>NUEVOS USUARIOS</p>
                <button>Crear</button>
            </div>
        </div>
        <div class="accion-admin">
            <img class="imagen-accion" src="../../Archivos/Imagenes/accionAdmin2.png" alt="Actualizar información de usuario">
            <div class="informacion-accion">
                <p>INFORMACIÓN DE USUARIOS</p>
                <button>Actualizar</button>
            </div>
        </div>

        <div class="accion-admin">
            <img class="imagen-accion" src="../../Archivos/Imagenes/accionAdmin3.png" alt="Administrar roles">
            <div class="informacion-accion">
                <p>ROLES DE USUARIOS</p>
                <button>Administrar</button>
            </div>
        </div>

        <div class="accion-admin">
            <img class="imagen-accion" src="../../Archivos/Imagenes/accionAdmin4.png" alt="Crear nuevo rol">
            <div class="informacion-accion">
                <p>NUEVOS ROLES E ÍTEMS DE MENÚ</p>
                <button>Crear</button>
            </div>
        </div>
    </div>
</div>


<?php
include_once '../estructura/secciones/footer.php';
?>
