<?php
class AbmMenu {
    /**
     * @param array 
     * @return Menu
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if( array_key_exists('idmenu',$param) && array_key_exists('menombre',$param) && array_key_exists('medescripcion',$param)
                && array_key_exists('padre',$param) && array_key_exists('medeshabilitado',$param)){
            $obj = new Menu();

            
            $obj->setear($param['idmenu'], $param['menombre'],$param['medescripcion'],$param['padre'],$param['medeshabilitado']); 
        }
        return $obj;
    }
    
    /**
     * @param array $param
     * @return Menu
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['idmenu']) ){
            $obj = new Menu();
            $obj->setIdmenu($param['idmenu']);
        }
        return $obj;
    }
    
    /**
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['idmenu']))
            $resp = true;
        return $resp;
    }
    
    /**
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $param['idmenu'] =null;
                
        $menu = $this->cargarObjeto($param);
        if ($menu !== null && $menu->insertar()){
            $resp = true;
        }
        return $resp;
    }

    /**
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
      
        if ($this->seteadosCamposClaves($param)){
            $menu = $this->cargarObjetoConClave($param);
            if ($menu!=null && $menu->eliminar()){
                $resp = true;
            }
        }
        
        return $resp;
    }
    
    /**
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
       
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $menu = $this->cargarObjeto($param);
            if($menu!=null && $menu->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    /**
     * @param array $param
     * @return array<Menu>
     */
    public function buscar($param = []){
        $where = " true ";
        if ($param<>NULL){
            if  (isset($param['idmenu']))
                $where.=" and idmenu =".$param['idmenu'];
            if  (isset($param['menombre']))
                 $where.=" and menombre ='".$param['menombre']."'";
            if  (isset($param['idpadre']))
                 $where.=" and idpadre ='".$param['idpadre']."'";
            if  (isset($param['medeshabilitado']))
                 $where.=" and medeshabilitado ='".$param['medeshabilitado']."'";
        }
        $obj=new Menu();

        $arreglo = $obj->listar($where);  
        return $arreglo;  
    } //Cambios
   
}
?>