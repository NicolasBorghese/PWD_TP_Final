
<header class="header">
    <div class="menu-opciones">
      <div class="logo-nav">
            <img src="../../Archivos/Imagenes/logoBlanco.png">
       </div>
        <?php
        include_once("../../configuracion.php");
         $menu = new AbmMenu();
         $param['idpadre']= 3;/* el 2 corresponde a clientes,3 a deposito,4 a administrador*/
         $listaMenu= $menu->buscar($param);
            
            for($i=0; $i<count($listaMenu);$i++){
                if ($listaMenu[$i]->getMeDeshabilitado() == null){

                    /*lee los datos de los menues cargados*/
                    $ruta=$listaMenu[$i]->getMeDescripcion();
                    $nombre=$listaMenu[$i]->getMeNombre();

                       if($nombre == 'iconoCarrito'){/*espara que coloque el icono carrito*/
                        $nombre= "<i class='bi bi-cart-plus-fill '></i>";
                       }
                    echo '<div class="navbar"> <a class="nav-link"  href='.$ruta.'>'.$nombre.'</a> </div>';// acomoda los menues en lista
            }
        }
        ?> 
      <div class="login logo">
         <ul class="nav navbar nav-link ">
           <li class="dropdown">
             <a href="#" class="dropdown-toggle text-white text-decoration-none" data-bs-toggle="dropdown"> Mi cuenta</a>
              <ul class=" dropdown-menu dropdown-menu-down">
                <li><a class="text-black text-decoration-none " data-bs-toggle="modal" data-bs-target="#modalCambiarUsuario" tabindex="-1">Cambiar Usuario</a></li>
                <li><a class="text-black text-decoration-none " data-bs-toggle="modal" data-bs-target="#modalCambiarContra" tabindex="-1">Cambiar Contraseña</a></li>
                <hr class="dropdown-divider">
                 <li><a  class="text-black text-decoration-none " href="../../accionesDeCuenta/cerrarSession.php">Cerrar Sesion</a></li>
              </ul>
           </li>
        </ul> 
      </div>  
    </div>
</header>


