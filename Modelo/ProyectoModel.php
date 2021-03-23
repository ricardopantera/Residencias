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
}


?>