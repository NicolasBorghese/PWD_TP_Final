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
        <a data-bs-target="#modalNuevoUsuario" tabindex="-1" data-bs-toggle="modal">
            <img class="imagen-accion" src="../../Archivos/Imagenes/accionAdmin1.png" alt="Crear nuevo usuario">
            <div class="informacion-accion">
                <p>CREAR NUEVOS USUARIOS</p>
            </div>
            </a>
        </div>
        <div class="accion-admin">
            <img class="imagen-accion" src="../../Archivos/Imagenes/accionAdmin2.png" alt="Actualizar información de usuario">
            <div class="informacion-accion">
                <p>ACTUALIZAR INFORMACIÓN DE USUARIOS</p>
            </div>
        </div>

        <div class="accion-admin">
            <img class="imagen-accion" src="../../Archivos/Imagenes/accionAdmin3.png" alt="Administrar roles">
            <div class="informacion-accion">
                <p>ADMINISTRAR ROLES DE USUARIOS</p>
            </div>
        </div>

        <div class="accion-admin">
            <img class="imagen-accion" src="../../Archivos/Imagenes/accionAdmin4.png" alt="Crear nuevo rol">
            <div class="informacion-accion">
                <p>CREAR NUEVOS ROLES E ÍTEMS DE MENÚ</p>
            </div>
        </div>
    </div>
</div>

<?php
include_once("../nuevoUsuario/formNuevoUsuario.php");
include_once '../estructura/secciones/footer.php';
?>
