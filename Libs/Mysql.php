<?php

class Mysql extends Conexion{

    private $conexion;
    private $strquery;
    private $arrvalue;

    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conect();
        
    }

    public function Insert(string $query,array $arrvalue){
        $this->strquery = $query;
        $this->arrvalue = $arrvalue;
        $insert = $this->conexion->prepare($this->strquery);
        $resinsert = $insert->execute($this->arrvalue);
        if($resinsert){
            $lastinsert = $this->conexion->lastInsertId();

        }else{
            $lastinsert = 0;
        }

        return $lastinsert;


    }


    public function select(string $query){

        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }


    public function selectAll(string $query){
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        $data = $result->fetchall(PDO::FETCH_ASSOC);
        return $data;
    }


    public function update(string $query,array $arrvalue){
        $this->strquery = $query;
        $this->arrvalue = $arrvalue;
        $update = $this->conexion->prepare($this->strquery);
        $resExecute = $update->execute($this->arrvalue);
        return $resExecute;
    }

    public function Delete(string $query){
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $del = $result->execute();
        return $del;
    }



}



?>