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
            </tr>
        </thead>
        <tbody>';
        foreach($listMenu as $objM){
            $idMenuPadre = 'null';
            if ($objM->getMenuPadre() != NULL){
                $idMenuPadre = $objM->getMenuPadre()->getIdMenu();
            }
            echo '<tr>';
            echo '<td>'.$objM->getIdMenu().'</td>';
            echo '<td>'.$objM->getMeNombre().'</td>';
            echo '<td>'.$objM->getMeDescripcion().'</td>';
            echo '<td>'.$idMenuPadre.'</td>';
            echo '<td>'.$objM->getMeDeshabilitado().'</td>';
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