<?php


class LoginModel extends Mysql{

    private $intIdUsuario;
    private $strusuario;
    private $strpassword;
    private $strrol;


    public function __construct()
    {
        parent:: __construct();
    }


    public function loginUser(string $usuario,string $password){
        $this->strusuario = $usuario;
        $this->strpassword = $password;
         $sql = "SELECT a.id_usuario,a.nombre_usuario,a.contraseña,a.idrol,b.nombre_rol,a.activo FROM usuario as a INNER JOIN roles as b on a.idrol = b.id_rol WHERE nombre_usuario = '$this->strusuario' AND contraseña = '$this->strpassword'  ;";

        $request = $this->select($sql);
        return $request;
    }


    public function sessionLogin($id){

        $sql = "SELECT a.id_usuario,a.nombre_usuario,a.idrol,b.nombre_rol,a.activo FROM usuario as a INNER JOIN roles as b on a.idrol = b.id_rol WHERE nombre_usuario = '$this->strusuario' AND contraseña = '$this->strpassword'  ;";
        $request = $this->select($sql);
        return $request;
    }

}



?>