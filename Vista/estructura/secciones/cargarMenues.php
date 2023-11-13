
<header class="header">
    <div class="menu-opciones">
      <div class="logo-nav">
            <img src="../../Archivos/Imagenes/logoBlanco.png">
       </div>
        <?php
            
            for($i=0; $i<count($listaMenu);$i++){
                if ($listaMenu[$i]->getMeDeshabilitado() == null){

                    $ruta=$listaMenu[$i]->getMeDescripcion();
                    $nombre=$listaMenu[$i]->getMeNombre();
                       if($nombre == 'iconoCarrito'){
                        $nombre= "<i class='bi bi-cart-plus-fill '></i>";
                       }
    
                    echo '<div class="navbar"> <a class="nav-link"  href='.$ruta.' class="nav-link">'.$nombre.'</a> </div>';
     
                }
            }
           /* bi bi-cart-plus-fill text-start*/
        ?>   
    </div>
</header>


