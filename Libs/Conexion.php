<?php

class Conexion{

    private $conectt;
    

    public function __construct()
    {
        $connectionString = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8";

        try{

            $this->conectt = new PDO($connectionString,DB_USER,DB_PASSWORD);
            $this->conectt->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(Exception $ex){
            $this->conectt = "Error de conexion";
            echo "Error:".$ex->getMessage();
        }
    }


    public function conect(){
        return $this->conectt;
    }

}



?>