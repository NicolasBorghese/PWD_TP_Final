<?php
include_once '../../../configuracion.php';

// Encapsulo los datos para crear usuario nuevo
$datos = data_submitted();
print_r($datos);

// Extraigo datos necesarios para la creación de usuario
$usuario = $datos['nombreUsuario'];
$email = $datos['emailUsuario'];
$passEncriptada= md5($datos['passUsuario']);
$rol = $datos['checkroladmin'];


//creo los objetos Usuario 
$objUsuario = new AbmUsuario();


//Guardo los parametros del Usuario
$paramUsuario['usnombre'] = $usuario;
$paramUsuario['uspass'] = $passEncriptada;
$paramUsuario['usmail'] = $email;

//Lo cargo a la base de datos
$exito = $objUsuario->alta($paramUsuario);


if($exito){
 
    
    echo "<p>PUDISTE</p>";
    
    

}else{
    echo "<p>no pudistexd</p>";
}


include_once '../../estructura/secciones/footer.php';