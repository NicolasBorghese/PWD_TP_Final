<?php
include_once("../../configuracion.php");

$tituloPagina = "TechnoMate | Deposito";
include_once '../estructura/secciones/head.php';

include_once("../estructura/secciones/nav-bar-2.php");
?>

<div class ="contenido-pagina">
    <div class="contenedor-acciones">
        <div class="accion">
            <img class="imagen-accion" src="../../Archivos/Imagenes/accionDeposito1.png" alt="Crear nuevo usuario">
            <div class="informacion-accion">
                <p>NUEVOS PRODUCTOS</p>
                <button data-bs-target="#modalNuevoProducto" type="submit" tabindex="-1" data-bs-toggle="modal">Crear</button>
            </div>
        </div>
        <div class="accion">
            <img class="imagen-accion" src="../../Archivos/Imagenes/accionDeposito2.png" alt="Actualizar información de usuario">
            <div class="informacion-accion">
                <p>ESTADOS DE COMPRAS</p>
                <button><a class="nav-link" href="../deposito/admComprasphp">Administrar</a></button>
            </div>
        </div>

        <div class="accion">
            <img class="imagen-accion" src="../../Archivos/Imagenes/accionDeposito3.png" alt="Administrar roles">
            <div class="informacion-accion">
                <p>PRODUCTOS EXISTENTES</p>
                <button><a class="btn  text-decoration-none" href="../actStock/listarProductos.php">MODIFICAR</a> </button>
            </div>
        </div>
    </div>

</div>

<?php
include_once '../accionesDeCuenta/configuracionCuenta.php';
include_once("../deposito/cargarProduc.php");
include_once '../estructura/secciones/footer.php';
?>