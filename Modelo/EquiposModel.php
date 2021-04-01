<?php
    Class EquiposModel extends Mysql{
        public function __construct()
        {
            parent::__construct();
        }

        public function getEquipos(){
            $sql = "SELECT a.id_equipos,a.nombre_equipo, b.nombre_usuario, c.nombre_proyecto FROM equipos as a INNER JOIN usuario as b on a.idusuario = b.id_usuario 
            INNER JOIN proyecto as c on c.id_proyecto = a.id_proyecto where b.idrol =2;";
            $request = $this->selectAll($sql);
            return $request;
        }

        /*

        public function insertEquipo(string $nombre_usuario,string $strjuez,int $strproyecto){
            $query_insert = "INSERT INTO usuario(nombre_equipo,nombre_usuario,nombre_proyecto) VALUES(?,?,?,1)";
            $arrdata = array($nombre_usuario,$strjuez,$strproyecto);
            $request_insert = $this->insert($query_insert,$arrdata);
            return $request_insert;
    
        }

        */

        public function ObtenerJuez(){
            $sql = "SELECT a.id_usuario,a.nombre_usuario,b.nombre_rol FROM usuario as a INNER JOIN roles as b on a.idrol = b.id_rol WHERE a.idrol = 2";
            $request = $this->selectAll($sql);
            return $request;
        }


        public function ObtenerProyecto(){
            $sql = "SELECT id_proyecto,nombre_proyecto FROM proyecto;";
            $request = $this->selectAll($sql);
            return $request;
        }















    }


?>