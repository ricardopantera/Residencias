<?php

class CrearEquiposModel extends Mysql{
    public function __construct()
    {
        parent::__construct();
    }
    public function getEquipo(){
        $sql = "SELECT * FROM equipo";
        $request = $this->selectAll($sql);
        return $request;
    }
    public function insertEquipo(string $strequipo){
        $query_insert = "INSERT INTO equipo(nombre_equipo) VALUES(?)";
        $arrdata = array($strequipo);
        $request_insert = $this->insert($query_insert,$arrdata);
        return $request_insert;
    }
    public function getEquipoId($id){
        $sql = "SELECT * FROM equipo  where id_equipo ='$id' ;";
        $request = $this->selectAll($sql);
        return $request;
    }
    public function EditEquipo(string $nombre_equipo,$id){
        $query_update = "UPDATE equipo SET nombre_equipo = ?  where id_equipo = '$id'";
        $arrdata = array($nombre_equipo);
        $request_update = $this->update($query_update,$arrdata);
        return $request_update;
    }
    public function eliminarequipo($id){
        try{
            $sql = "DELETE FROM equipo where id_equipo ='$id';";
            $request = $this->delete($sql);
            return $request;
        }catch(Exception $ex){
            return $ex;
        }

    }
}
?>