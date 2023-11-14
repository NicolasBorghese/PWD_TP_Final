<?php
$texto = $_GET["nombre"];
$tituloPagina = "TechnoMate | ". $texto;
include_once '../estructura/secciones/head.php';
include("../estructura/secciones/nav-bar-1.php");
require_once("../../Modelo/Conector/BaseDatos.php");
include_once("../../configuracion.php");
require_once("../../Control/AbmProducto.php"); 

$objProduc = new AbmProducto();

// Obtener los elementos de navegación
// Obtiene el nombre del textO DEL MENU SELECCIONADO
   

    $tipoDeProduc= $texto;
    $param['tipo']=  $tipoDeProduc;
    $listaProd= $objProduc->buscar($param);
    //print_r( $listaProd); 
    echo"<div class='contenido-pagina'>";
    echo"<div class='container'>";
    echo "<div class='row '>";


    for($i=0; $i<count($listaProd);$i++){
    echo "<div class='col'>";
    echo "<div class='p-3 d-flex justify-content-center align-items-center'>";
        echo "<div class='card text-center sombraCarta' style='width: 18rem;'>";
        echo "<img class='card-img-top' style='height: 16rem;' src='". $listaProd[$i]->getImagenProducto()."' alt='" . $listaProd[$i]->getProNombre() . "'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" .$listaProd[$i]->getProNombre() . "</h5>";
        echo "<p class='card-text'>Precio: $" . $listaProd[$i]->getProDetalle() . "</p>";
        echo "<a href='#' class='btn'><i class='bi bi-cart-plus-fill text-start'></i></a>";
        echo "</div>";
        echo "</div>";
   echo "</div>";
   echo "</div>";
    }
 
    echo "</div>";
    echo "</div>";
    echo "</div>";
    
 include_once '../estructura/secciones/footer.php';
 require_once("../login/login.php");
 require_once("../crearCuenta/formCrearCuenta.php"); 
?>