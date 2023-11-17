<?php
include_once("../../configuracion.php");
include_once '../../Control/AbmUsuarioRol.php';
include_once '../../Modelo/Conector/BaseDatos.php';
include_once '../../Modelo/UsuarioRol.php';
include_once ('../../configuracion.php');

$tituloPagina = "TechnoMate | Administrador";
include_once '../estructura/headSeguro.php';
include_once '../estructura/navSeguro.php';

$datos = data_submitted();

$objUsuarioRol = new AbmUsuarioRol();
$usuarioRol = $objUsuarioRol->buscar($datos);
$colUsuarioRol = $objUsuarioRol->buscar("");
$idUsuario['idusuario'] = $usuarioRol;

// $colRoles = [];
// foreach ($usuarioRol as $usuario){
//     if ($usuario->getObjUsuario()->getIdUsuario() == $idUsuario);
//     $colRoles = $usuario->getObjRol()->getIdRol();
// }
// $n = $colRoles;
// echo $n;

?>

<div class="container" style="padding: 50px;">
    <form name="actualizarUsuario" id="actualizarUsuario" method="POST" action="Accion/modificarRol.php"
        class="needs-validation" novalidate>
        <h3>Usuario seleccionado</h3>
        <br>

        <div class="contenedor-dato">
            <label for="idusuario" class="form-label">ID de usuario</label>
            <input type="text" name="idusuario" id="idusuario" class="form-control"
                value="<?php echo $usuarioRol[0]->getObjUsuario()->getIdUsuario() ?>" readonly></input>
        </div>
        <br>

        <div class="contenedor-dato">
            <label for="usnombre" class="form-label">Nombre de usuario</label>
            <input type="text" name="usnombre" id="usnombre" class="form-control"
                value="<?php echo $usuarioRol[0]->getObjUsuario()->getUsNombre() ?>" readonly></input>
        </div>
        <br>

        <div class="contenedor-dato">
            <label for="rolActual" class="form-label">Actual rol de usuario</label>
            <input type="text" name="rolActual" id="rolActual" class="form-control"
                value="<?php echo $usuarioRol[0]->getObjRol()->getRolDescripcion() ?>" readonly></input>
        </div>
        <br>

        <h4>Elegir roles</h4>
        <div class="contenedor-dato">
            <label for="usnombre" class="form-label">Administrador</label>
            <input type="checkbox" id="agregarRol1" name="opciones[]" value="agregarRol1">
            <label for="usnombre" class="form-label">Depósito</label>
            <input type="checkbox" id="agregarRol2" name="opciones[]" value="agregarRol2">
            <label for="usnombre" class="form-label">Cliente</label>
            <input type="checkbox" id="agregarRol3" name="opciones[]" value="agregarRol3">
        </div>
        <br>

        <div class="d-grid mb-3 gap-2">
            <input type="submit" value="Editar" class="btn text-white  btn-dark"></input>
        </div>
    </form>
    <a href="./listarUsuarios.php"><input type="submit" value="Cancelar" class="btn text- white btn-danger">
        </input></a>

</div>

<?php
include_once '../estructura/footer.php';
?>