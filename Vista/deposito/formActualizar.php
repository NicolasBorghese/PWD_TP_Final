<?php
include_once ('../../configuracion.php');
$idProducto = data_submitted();
$objProducto = new AbmProducto();
$producto = $objProducto->buscar($idProducto);
?>
<form method="POST" action="accionActualizar.php">
    <p>ACTUALIZAR STOCK DE PRODUCTO</p>
    <label>ID de producto</label>
    <input type="text" name="idproducto" id="idproducto" value="<?php echo $producto[0]->getIdProducto() ?>"
        readonly></input><br>

    <label>Nombre</label>
    <input type="text" name="pronombre" id="pronombre" value="<?php echo $producto[0]->getProNombre() ?>"
        readonly></input><br>

    <label>Precio</label>
    <input type="text" name="prodetalle" id="prodetalle" value="<?php echo $producto[0]->getProDetalle() ?>"
        readonly></input><br>

    <label>Cantidad de stock</label>
    <input type="text" name="procantstock" id="procantstock" value="<?php echo $producto[0]->getProCantstock() ?>"></input><br>

    <label>Tipo</label>
    <input type="text" name="tipo" id="tipo" value="<?php echo $producto[0]->getTipo() ?>"
    readonly></input><br>

    <label>Imagen</label>
    <input type="text" name="imagenproducto" id="imagenproducto" value="<?php echo $producto[0]->getImagenProducto() ?>"
    readonly></input><br>

    <input type="submit" value="Enviar"></input>
</form>