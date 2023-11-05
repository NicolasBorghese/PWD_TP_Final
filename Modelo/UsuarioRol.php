<?php
include_once 'conector/BaseDatos.php';
include_once 'Usuario.php';
include_once 'Rol.php';

class UsuarioRol extends BaseDatos{
    private $objUsuario;
    private $objRol;
    private $mensajeoperacion;

    public function __construct()
    {
        $this->objUsuario = null;
        $this->objRol = null;
        $this->mensajeoperacion = "";

    }
    public function setear($objUsuario, $objRol)
    {
        $this->setObjUsuario($objUsuario);
        $this->setObjRol($objRol);
    } 
    
  /* Medodos get y set para idusuario*/ 
    public function getObjUsuario(){
        return $this->objUsuario;
    }
    public function setObjUsuario($valor){
          $this->objUsuario = $valor;
  }

  /* Medodos get y set para idrol*/ 
    public function getObjRol(){
        return $this->objRol;
    }
    public function setObjRol($valor){
        $this->objRol = $valor;
    }

 /* Medodos get y set para mensajeoperacion*/
    public function getMensajeoperacion(){
        return $this->mensajeoperacion;
    }
    public function setMensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
    }

/**
	 * Recupera los datos del usuario por idusuario
	 * @param int $idusuario
	 * @return true en caso de encontrar los datos, false en caso contrario 
	 */		
	public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM usuariorol WHERE idusuario = '". $this->getObjUsuario()->getIdUsuario() . " AND idrol= " . $this->getObjRol()->getIdRol()."'";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){

                    $row = $base->Registro();
                    $usuario = new Usuario();
                    $rol = new Rol();
                    $usuario->setIdUsuario($row['idusuario']);
                    $rol->setIdRol($row['idrol']);
                    $this->cargar($usuario, $rol);
                }
            }
        } else {
            $this->setmensajeoperacion("UsuarioRol->listar: ".$base->getError());
        }
        return $resp;      
    }

 /**
     * Esta función lee los valores actuales de los atributos del objeto e inserta un nuevo
     * registro en la base de datos a partir de ellos.
     * Retorna un booleano que indica si le operación tuvo éxito
     * 
     * @return boolean
     */
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql = "INSERT INTO usuariorol(idusuario, idrol)VALUES(" . $this->getObjUsuario()->getIdUsuario() 
        . "," . $this->getObjRol()->getIdRol() . ");";
        //echo $sql;
        if ($base->Iniciar()) {
            
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeoperacion("UsuarioRol->insertar: ".$base->getError());
            }
        } else {
            $this->setMensajeoperacion("UsuarioRol->insertar: ".$base->getError());
        }
        return $resp;
    }
    
 /**
     * Esta función lee los valores actuales de los atributos del objeto y los actualiza en la
     * base de datos.
     * Retorna un booleano que indica si le operación tuvo éxito
     * 
     * @return boolean
     */
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        
        $sql="UPDATE usuariorol SET idrol='".$this->getObjRol()->getIdRol()
        ."' WHERE  id_usuario =" . $this->getObjUsuario()->getIdUsuario()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeoperacion("UsuarioRol->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeoperacion("UsuarioRol->modificar: ".$base->getError());
        }
        return $resp;
    }

 /**
     * Esta función lee el id actual del objeto y si puede lo borra de la base de datos
     * Retorna un booleano que indica si le operación tuvo éxito
     * 
     * @return boolean
     */
    public function eliminar(){
        $base=new BaseDatos();
        $sql="DELETE FROM usuariorol WHERE idusuario='".$this->getObjUsuario()->getIdUsuario() . " AND id_rol=" . $this->getObjRol()->getIdRol()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeoperacion("UsuarioRol->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeoperacion("UsuarioRol->eliminar: ".$base->getError());
        }
        return $resp;
    }


 /**
     * Esta función recibe condiciones de busqueda en forma de consulta sql para obtener
     * los registros requeridos.
     * Si por parámetro se envía el valor "" se devolveran todos los registros de la tabla
     * 
     * La función devuelve un arreglo compuesto por todos los objetos que cumplen la condición indicada
     * por parámetro
     * 
     * @return array
     */
	public static function listar($parametro=""){
        $arreglo = array();
        $base = new BaseDatos();
      
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $base->Registro()) {

                    $objUsuario = null;
                    $objRol = null;

                    if ($row['id_rol'] != null) {
                        $objRol = new Rol();
                        $objRol->setIdRol($row['id_rol']);
                        $objRol->Buscar();
                    }

                    if ($row['id_usuario'] != null) {
                        $objUsuario = new Usuario();
                        $objUsuario->setIdUsuario($row['id_usuario']);
                        $objUsuario->Buscar();
                    }
                    $obj = new UsuarioRol();
                    $obj->setear($objUsuario, $objRol);
                    array_push($arreglo, $obj);
                }
            }   
        } else {
            $this->setMensajeoperacion("UsuarioRol->listar: ".$base->getError());
        }
 
        return $arreglo;
    }

    /**
     * Esta función lee todos los valores de todos los atributos del objeto y los devuelve
     * en un arreglo asociativo
     * 
     * @return array
     */
	public function __toString(){
	    return "id usuario: ".$this->getObjUsuario()->getIdUsuario()."\n id rol: ".$this->getObjRol()->getIdRol()."\n\n";
			
	}
}
?>