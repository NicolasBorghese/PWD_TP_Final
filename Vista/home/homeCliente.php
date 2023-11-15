<?php 
$tituloPagina = "TechnoMate | Inicio";
include_once '../estructura/secciones/head.php';
include_once '../estructura/secciones/cargarMenues.php';
?>

<div class="contenido-pagina">
   <div class="contenedorPrueba">
   </div>
</div>

<?php include_once '../accionesDeCuenta/contrasenias/cambiarContra.php';
 include_once '../accionesDeCuenta/nombreUsuario/cambiarUsuario.php';
 include_once("../accionesDeCuenta/cerrarSession.php");
 include_once '../estructura/secciones/footer.php'?>