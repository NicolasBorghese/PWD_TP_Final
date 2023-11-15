<?php
include_once ("../../configuracion.php");
   $objSession= new Session();
   
if ($objSession->activa()){
   $resp = $objSession->cerrar();
  }
  if(  $resp == true){
    header('Location: ../home/home.php');
  }
    echo "entre a cerrar sesion";

?>