<?php
class AbmProd
{

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Producto
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('idproducto', $param)) {

            $obj = new Producto();
            $obj->setear( $param['idproducto'],$param['pronombre'],$param['prodetalle'],$param['procantstock']);
        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     *  que son claves
     * @param array $param
     * @return Producto
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['idproducto'])) {
            $obj = new Producto();
            $obj->setear($param['idproducto'], null, null, null, null, null);
        }
        return $obj;
    }

      /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
     private function seteadosCamposClaves($param)
    {
        $resp = false;
        if (isset($param['idproducto']))
            $resp = true;
        return $resp;
    }
  

     /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $param['idproducto'] = null;
        $obj = $this->cargarObjeto($param);
        if ($obj != null and $obj->insertar()) {
            $resp = true;
        }
        return $resp;   
    }

     /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $obj = $this->cargarObjetoConClave($param);
            if ($obj != null and $obj->eliminar()) {
                $resp = true;
            }
        }
        return $resp;
    }

        /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificar($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $unObjProd=$this->cargarObjeto($param);
            if($unObjProd!=null && $unObjProd->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }

      /**
     * permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param){
        $where = " true ";
        if ($param<>null){
            if  (isset($param['idproducto']))
            $where.=" and idproducto ='".$param['idproducto']."'"; 
        if  (isset($param['pronombre']))
                $where.=" and pronombre ='".$param['pronombre']."'";
        if  (isset($param['prodetalle']))
                $where.=" and prodetalle ='".$param['prodetalle']."'";
        if  (isset($param['procantstock']))
                $where.=" and procansStock ='".$param['procantstock']."'";
        }
        $obj = new Producto();
        $arreglo = $obj->listar($where);
        return $arreglo;
    }

    /**
     * Recibe como parámetro un array asociativo, retorna un json del mismo.
     * En caso de estar vacío el array, retornará null.
     * @param array $colProductos
     * @return mixed
     */
    public function conversorJson($colProductos){
        $json = null;

        if ($colProductos != null){
            $json = json_encode($colProductos);
        }

        return $json;
    }

}