<?php
include_once("../../configuracion.php");
include_once '../../Control/AbmUsuario.php';
include_once '../../Modelo/Conector/BaseDatos.php';
include_once '../../Modelo/Usuario.php';

$tituloPagina = "TechnoMate | Administrador";
include_once '../estructura/secciones/head.php';

$objSesion = new Session();

if ($objSesion->validar()){
    if($_SESSION['rol'] == 1){
        include_once '../estructura/secciones/nav-bar-2.php';
    } else {
        header('Location: home.php');
    }
} else {
    header('Location: home.php');
}

$objUsuario = new AbmUsuario();
$colUsuarios = $objUsuario->buscar("");
?>

<div class="container-fluid" style="padding: 50px;">

<?php
if (!empty($colUsuarios)){
    echo "<h4>Listado de usuarios</h4>";
    echo "<table class='table table-striped table-hover'>";
    echo "<th>#</th>
    <th>Nombre de Usuario</th>
    <th>Acción</th>";

    foreach($colUsuarios as $usuario){
        echo "<tr>
        <td>".$usuario->getIdUsuario()."</td>
        <td>".$usuario->getUsNombre()."</td>
        <td><button class='btn text-white btn-dark'><a style='text-decoration: none;' href='formActualizar.php?idusuario=" . $usuario->getIdusuario() . "'>Actualizar</a></button></td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "<h4>No hay usuarios cargados en la Base de Datos";
}
?>

</div>

<?php
include_once '../estructura/secciones/footer.php';
?>