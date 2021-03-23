<?php

class ProyectoModel extends Mysql{
    public function __construct()
    {
        parent::__construct();
    }
    public function getProyecto(){
        $sql = "SELECT * FROM proyecto";
        $request = $this->selectAll($sql);
        return $request;
    }

    public function insertProyecto(string $strproyecto){
        $query_insert = "INSERT INTO proyecto(nombre_proyecto) VALUES(?)";
        $arrdata = array($strproyecto);
        $request_insert = $this->insert($query_insert,$arrdata);
        return $request_insert;
    }
    public function EditProyecto(string $nombre_proyecto,$id){
        $query_update = "UPDATE proyecto SET nombre_proyecto = ?  where id_proyecto = '$id'";
        $arrdata = array($nombre_proyecto);
        $request_update = $this->update($query_update,$arrdata);
        return $request_update;
    }

    public function getProyectoId($id){
        $sql = "SELECT * FROM proyecto  where id_proyecto ='$id' ;";
        $request = $this->selectAll($sql);
        return $request;
    }
}


?>