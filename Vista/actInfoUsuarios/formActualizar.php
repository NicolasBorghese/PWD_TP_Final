<?php
include_once ('../../configuracion.php');
$idUsuario = data_submitted();
$objUsuario = new AbmUsuario();
$usuario = $objUsuario->buscar($idUsuario);
?>
<form method="POST" action="accionActualizar.php">
    <p>ACTUALIZAR DATOS DE USUARIO
        <?php echo "ID usuario:".$idUsuario['idusuario'];?>
    </p>
    <label>ID de usuario</label>
    <input type="text" name="idusuario" id="idusuario" value="<?php echo $usuario[0]->getIdUsuario() ?>"
        readonly></input><br>

    <label>Nombre de usuario</label>
    <input type="text" name="usnombre" id="usnombre" value="<?php echo $usuario[0]->getUsNombre() ?>"></input><br>

    <label>Email</label>
    <input type="text" name="usmail" id="usmail" value="<?php echo $usuario[0]->getUsNombre() ?>"></input><br>

    <label>Contraseña</label>
    <input type="text" name="uspass" id="uspass" value="<?php echo $usuario[0]->getUsPass() ?>"></input><br>
    <input type="submit" value="Enviar"></input>
</form>