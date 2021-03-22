<?php

    class Login  extends Controllers{
        public function __construct()
        {
            session_start();
            parent::__construct();
        }

        public function Login($params){
            $this->views->getView($this,"Login");
        }

        public function loginUser(){
            if($_POST){
                if(empty($_POST['usuario']) || empty($_POST['password'])){
                    $arrresponse = array('status' => false,'msg' => 'Error en los datos');
                }else{
                    $strUsuario = $_POST['usuario'];
                    $strpassword = $_POST['password'];
                    $requestuser = $this->model->loginUser($strUsuario,$strpassword);

                    if(empty($requestuser)){
                        $arrresponse = array('status' => false,'msg'=>'El usuario o la contraseña es incorrecto');
                    }else{
                        $arrData = $requestuser;
                        
                        if($arrData['activo'] == 1){
                            $_SESSION['idusuario'] = $arrData['id_usuario'];
                            $_SESSION['login'] = true;
                            $_SESSION['userData'] = $arrData;

                            $arrData = $this->model->sessionLogin($_SESSION['idusuario']);
                            $_SESSION['userData'] = $arrData;

                            $arrresponse = array('status' =>true,'msg'=>'ok');
                        }else{
                            $arrresponse = array('status' =>false,'msg'=>'Usuario Inactivo');
                        }
                    }
                }
                echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
            }
            die();
            
        }

    }

?>