<?php
    class JuecesModel extends Mysql{
        public function __construct()
        {
            parent::__construct();
        }

        public function getJueces(){
            $sql= "SELECT id_jueces,nombre_juez,apellido_paterno,apellido_materno FROM jueces WHERE activo !=0;";
            $request = $this->selectAll($sql);
            return $request;
        }
    }

?>