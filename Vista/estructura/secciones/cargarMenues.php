<!-- ____________________________________ NAV BAR 1 ________________________________ -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-Toggler" aria-controls="navbar-Toggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse menuUsuario" id="navbar-Toggler">
            <div class="navbar-brand">
                <img src="../../Archivos/Imagenes/logoBlanco.png" alt="Logo de la empresa" width="110">
            </div>
        <ul class="navbar-nav d-flex justify-content-center align-items-center">
                <?php
            for($i=0; $i<count($listaMenu);$i++){
                if ($listaMenu[$i]->getMeDeshabilitado() == null){

                    /*lee los datos de los menues cargados*/
                    $ruta=$listaMenu[$i]->getMeDescripcion();
                    $nombre=$listaMenu[$i]->getMeNombre();

                       if($nombre == 'iconoCarrito'){/*espara que coloque el icono carrito*/
                        $nombre= "<i class='bi bi-cart-plus-fill '></i>";
                       }
                    echo '<li class="nav-item"> <a class="nav-link" aria-current="page" href='.$ruta.'>'.$nombre.'</a> </li>';// acomoda los menues en lista
            }
        }
        ?> 
        <ul class="nav">
           <li class="dropdown">
             <a href="#" class="dropdown-toggle text-white text-decoration-none nav-link nav-item " data-bs-toggle="dropdown"> Mi cuenta</a>
              <ul class=" dropdown-menu dropdown-menu-down">
                <li><a class="text-black text-decoration-none " data-bs-toggle="modal" data-bs-target="#modalCambiarUsuario" tabindex="-1">Cambiar Usuario</a></li>
                <li><a class="text-black text-decoration-none " data-bs-toggle="modal" data-bs-target="#modalCambiarContra" tabindex="-1">Cambiar Contraseña</a></li>
                <hr class="dropdown-divider">
                <li><a  class="text-black text-decoration-none " href="home.php" >Cerrar Sesion</a></li>
              </ul>
           </li>
        </ul> 

      </ul>

    </div>
</div>
</nav>
