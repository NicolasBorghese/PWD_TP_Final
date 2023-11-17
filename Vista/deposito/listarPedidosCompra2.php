<?php
include_once '../../configuracion.php';

//CREO EL ABM COMPRA ESTADO
$objAbmCompraEstado = new AbmCompraEstado();

//LISTO TODAS LAS COMPRAS QUE SU FECHA FIN SEA NULA
$param["cefechafin"] = "NULL";
$colComprasEstado = $objAbmCompraEstado->buscar($param);

for($i=0; $i < count($colComprasEstado); $i++){
    $idCompra = $colComprasEstado[$i]->getObjCompra()->getIdCompra();
    $colIdCompra[] = $idCompra;
    echo "Las compras sin finalizar tienen el id: ".$idCompra."<br>";
}
echo "<br><br>";

//CREO UN ARREGLO POR CADA ID COMPRA DE LOS OBJ COMPRAITEM QUE TODAVÍA NO FINALIZARON
$objAbmCompraItem = new AbmCompraItem();

for($i= 0; $i < count($colIdCompra); $i++){
    $colComprasItems[] = $colComprasEstado[$i]->getObjCompra();
}

echo "Colección de compras sin finalizar";
echo "<br><br>";
print_r($colCompras);
echo "<br><br>";

//CREO EL ABM COMPRA ITEM 
$objAbmCompraItem = new AbmCompraItem();

//POR CADA ID COMPRA BUSCO LOS ELEMENTOS COMPRA ITEM Y LO GUARDO EN UN ARREGLO
for($i=0; $i < count($colCompras); $i++){

    $idCompra = $colCompras[$i]->getIdCompra();
    $param2["idcompra"] = $idCompra;
    $colCompraItem[] = $objAbmCompraItem->buscar($param2);
}


echo "Colección de colecciones de compra items";
echo "<br><br>";
print_r($colCompraItem);
echo "<br><br>";

for($i=0; $i < count($colCompraItem); $i++){

    echo "Para la compra número ".$i." se compraron los siguientes productos";
    echo "<br>";

    for($j=0; $j < count($colCompraItem[$i]); $j++){
        $nombreProducto = $colCompraItem[$i][$j]->getObjProducto()->getProNombre();
        echo $nombreProducto."<br>";

        echo "<br><br>";
        print_r($colCompraItem);
        echo "<br><br>";

    }
    echo "<br><br>";
}







