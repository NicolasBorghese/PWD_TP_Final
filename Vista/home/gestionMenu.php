<?php
$tituloPagina = "TechnoMate | Administrador";
include_once '../estructura/secciones/head.php';
include("../estructura/secciones/nav-bar-1.php");
require_once("../../Modelo/Conector/BaseDatos.php");
include_once("../../configuracion.php");

$objMenu = new AbmMenu();
$listMenu = $objMenu->buscar(null);
?>
<div class="contenido-pagina">
    <strong>Menus</strong>
    <?php 
    if (count($listMenu)>0){
        echo '<table class="table">
        <thead >
            <tr>  
              <th><strong>IdMenu</strong></th>
              <th><strong>menombre</strong></th>
              <th><strong>medescripcion</strong></th>
              <th><strong>idPadre Nacimiento</strong></th>
              <th><strong>meDesabhilitado</strong></th>
              <th><strong>Acciones</strong></th>
        
            </tr>
        </thead>
        <tbody>';
        foreach($listMenu as $objM){
            $idMenuPadre = 'null';
            $deshabilitado = 'null';
            $idmenu = $objM->getIdMenu();
            if ($objM->getMenuPadre() != NULL){
                $idMenuPadre = $objM->getMenuPadre()->getIdMenu();
            }
            if ($objM->getMeDeshabilitado() != NULL){
                $deshabilitado = $objM->getMeDeshabilitado();
            }
            echo '<tr>';
            echo '<td>'.$idmenu.'</td>';
            echo '<td>'.$objM->getMeNombre().'</td>';
            echo '<td>'.$objM->getMeDescripcion().'</td>';
            echo '<td>'.$idMenuPadre.'</td>';
            echo '<td>'.$deshabilitado.'</td>';
            echo '<td>'.'<button class="btn text-white btn-dark"><a href="formEditarMenu.php?idmenu='.$idmenu.'">Editar</a></button>'.
            '<button class="btn text-white btn-dark"><a href="deshabilitarMenu.php?idmenu='.$idmenu.'">Borrar</a></button>'
            .'</td>';
            echo '</tr>'; 
        }
        echo'</tbody>
        </table>';      
    }else{
        echo '<h4>No se han cargado menus.</h4>';  
        }
    ?>
 
</div>

<?php
include_once '../estructura/secciones/footer.php';
?>