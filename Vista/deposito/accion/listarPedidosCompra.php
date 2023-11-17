<?php
include_once '../../configuracion.php';

// Creo objeto usuario y los listo
$objUsuario = new AbmUsuario();
$colUsuarios = $objUsuario->buscar("");

// Guardo id del primer usuario (Moya) para ver sus compras
$idUsuario = $colUsuarios[0]->getIdUsuario();
$param = ['idusuario' => $idUsuario]; 

// Creo objeto compra y las listo
$objCompra = new AbmCompra();

// Busco las compras vinculadas a Moya
$colCompras = $objCompra->buscar($param);

// Cuento la cantidad de compras que devolvió la búsqueda
$n = count($colCompras);

if ($n >= 1){
    echo "Tiene ".$n." compras.";
} else {
    echo "No tiene ninguna compra.";
}

// Guardo id de la compra de Moya
$idCompra = $colCompras[0]->getIdCompra();
$param = ['idcompraitem' => $idCompra];

// Creo objeto producto y los listo
$objProducto = new AbmProducto();
$colProductos = $objProducto->buscar("");

// Creo objeto compraitem para buscar la compra vinculada a Moya
$objCompraItem = new AbmCompraItem();
$colCompraItem = $objCompraItem->buscar($param);
print_r($colCompraItem);

