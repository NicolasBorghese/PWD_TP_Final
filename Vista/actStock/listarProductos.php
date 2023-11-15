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
    include_once '../../Control/AbmProducto.php';
    include_once '../../Modelo/Conector/BaseDatos.php';
    include_once '../../Modelo/Producto.php';
   
    $objProducto = new AbmProducto();
    $colProductos = $objProducto->buscar("");

    echo "<table border='1'>";
    echo "<th>ID de producto</th>
    <th>Descripción</th>
    <th>Cantidad de stock</th>
    <th>Acción</th>";

    foreach($colProductos as $producto){
        echo "<tr>
        <td>".$producto->getIdProducto()."</td>
        <td>".$producto->getProNombre()."</td>
        <td>".$producto->getProCantstock()."</td>
        <td><a href='formActualizar.php?idproducto=" . $producto->getIdProducto()."'>Actualizar</a></td>>
        </tr>";
    }

    ?>
</body>
</html>