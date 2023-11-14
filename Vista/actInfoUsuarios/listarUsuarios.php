<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once '../../Control/AbmUsuario.php';
    include_once '../../Modelo/Conector/BaseDatos.php';
    include_once '../../Modelo/Usuario.php';
   
    $objUsuario = new AbmUsuario();
    $colUsuarios = $objUsuario->buscar("");

    echo "<table border='1'>";
    echo "<th>ID de Usuario</th>
    <th>Nombre de Usuario</th>
    <th>Acción</th>";

    foreach($colUsuarios as $usuario){
        echo "<tr>
        <td>".$usuario->getIdUsuario()."</td>
        <td>".$usuario->getUsNombre()."</td>
        <td><a href='formActualizar.php?idusuario=" . $usuario->getIdusuario() . "'>Actualizar</a></td>>
        </tr>";
    }

    ?>
</body>
</html>