<?php
class Session{

    /*_ _construct(). Constructor que. Inicia la sesión.*/
    public function __construct()
    {
        session_start();
    }

    /* iniciar($nombreUsuario,$psw). Actualiza las variables de sesión con los valores ingresados.
    * 
    */

    public function iniciar($nombreUsuario, $psw)
    {
        $resp = false;
        $obj = new AbmUsuario();
        //if ($nombreUsuario!= null && $psw != null) {
        $param['usnombre'] = $nombreUsuario;
        $param['uspass'] = $psw;
        //$param['usdeshabilitado'] = 'null'; //volver a abilitar

        $resultado = $obj->buscar($param);
        
        if (count($resultado) > 0){
            $usuario = $resultado[0];
            $_SESSION['idusuario'] = $usuario->getIdUsuario();
            $resp = true;
        }else{
            $this->cerrar();
        }
        return $resp;
    }

    /*validar(). Valida si la sesión actual tiene usuario y psw válidos. Devuelve true o false.*/
    public function validar()
    {
        $resp = false;
        if ($this->activa() && isset($_SESSION['idusuario'])){
            $resp = true;
        }

        return $resp;
    }


    /*activa(). Devuelve true o false si la sesión está activa o no. */
    public function activa()
    {
        $resp = false;
        if (php_sapi_name() !== 'cli'){
            if (version_compare(PHP_VERSION, '7.0.0') >= 0) {
                $resp = session_status() === PHP_SESSION_ACTIVE ? true : false;
            }else{
                $resp = session_id() === '' ? false : true;
            }
        }
        return  $resp;
    }


    /**Devuelve el usuario logeado*/
    public function getUsuario()
    {
       $usuario = null;
       if ($this->validar()){
        $obj = new AbmUsuario();
        $param['idusuario'] = $_SESSION['idusuario'];
        $resultado = $obj->buscar($param);
        if (count($resultado) > 0){
            $usuario = $resultado[0];
        }
       }
       return $usuario;
    }

    /**devuelve el rol del usuario logeado */
    public function getRol()
    {
        $rol = null;
        if ($this->validar()){
         $obj = new AbmUsuario();
         $param['idusuario'] = $_SESSION['idusuario'];
         $resultado = $obj->darRoles($param);
         if (count($resultado) > 0){
            $rol = $resultado[0];
         }
        }
        return $rol;
    }

    /**cierra la sesion actual */
    public function cerrar()
    {
        $resp = true;
        session_destroy();
        return $resp;
    }
}