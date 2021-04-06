<?php

class AspectoModel extends Mysql{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAspecto(){
        $sql = "SELECT * FROM aspecto";
        $request = $this->selectAll($sql);
        return $request;
    }

    public function insertAspecto(string $straspecto){
        $query_insert = "INSERT INTO aspecto(nombre_aspecto) VALUES(?)";
        $arrdata = array($straspecto);
        $request_insert = $this->insert($query_insert,$arrdata);
        return $request_insert;
    }
    public function EditAspecto(string $nombre_aspecto,$id){
        $query_update = "UPDATE aspecto SET nombre_aspecto = ?  where id_aspecto = '$id'";
        $arrdata = array($nombre_aspecto);
        $request_update = $this->update($query_update,$arrdata);
        return $request_update;
    }
    public function getAspectoId($id){
        $sql = "SELECT * FROM aspecto  where id_aspecto ='$id' ;";
        $request = $this->selectAll($sql);
        return $request;
    }
    public function eliminaraspecto($id){
        try{
            $sql = "DELETE FROM aspecto where id_aspecto ='$id';";
            $request = $this->delete($sql);
            return $request;
        }catch(Exception $ex){
            return $ex;
        }

    }
}
?>