<?php
class UsuariosModel extends Mysql{


    public function __construct()
    {
        parent::__construct();
    }


    public function getUsuarios(){
        $sql = "SELECT a.id_usuario, a.nombre_usuario,b.nombre_rol FROM usuario as a INNER JOIN roles as b on a.idrol = b.id_rol where activo !=0;";
        $request = $this->selectAll($sql);
        return $request;
    }

    public function InsertUser(string $nombre_usuario,string $password,int $idrol){
        $query_insert = "INSERT INTO usuario(nombre_usuario,contraseña,idrol,activo) VALUES(?,?,?,1)";
        $arrdata = array($nombre_usuario,$password,$idrol);
        $request_insert = $this->insert($query_insert,$arrdata);
        return $request_insert;

    }


    public function getUsuario($id){
        $sql = "SELECT a.id_usuario,a.contraseña, a.nombre_usuario,b.nombre_rol,a.idrol FROM usuario as a INNER JOIN roles as b on a.idrol = b.id_rol where a.activo !=0 and a.id_usuario ='$id' ;";
        $request = $this->selectAll($sql);
        return $request;
    }

    public function updateUsuario(string $nombre_usuario,string $password,int $idrol,int $id){
        $query_update = "UPDATE usuario SET nombre_usuario = ? ,contraseña = ? , idrol = ?   where id_usuario = '$id'";
        $arrdata = array($nombre_usuario,$password,$idrol);
        $request_update = $this->update($query_update,$arrdata);
        return $request_update;
    }


    public function eliminarUser($id){
        $sql = "DELETE FROM usuario where id_usuario ='$id';";
        $request = $this->delete($sql);
        return $request;
    }


}



?>