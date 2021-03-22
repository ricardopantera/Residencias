<?php

    class Usuarios  extends Controllers{
        public function __construct()
        {
           session_start();
           if(empty($_SESSION['login'])){
               header('Location:'.BASE_URL.'/Login');
           }
            parent::__construct();
            
        }

        public function Home(){
            $this->views->getView($this,"Usuarios");
        }

        public function getUsuarios(){
            $arrdata = $this->model->getUsuarios();

            for($i=0;$i < count($arrdata); $i++){
                $arrdata[$i]['options'] = '<div class="text-center">
                <button class="btn btn-warning" onclick="EditUser('.$arrdata[$i]['id_usuario'].')"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger" onclick="DeleteUser('.$arrdata[$i]['id_usuario'].')"><i class="fas fa-trash-alt"></i></button>
                </div>';
            }



            echo json_encode($arrdata,JSON_UNESCAPED_UNICODE);
            die();
            
        }



        public function getUsuario($id){
            $arrdata = $this->model->getUsuario($id);
            echo json_encode($arrdata,JSON_UNESCAPED_UNICODE);
            die();
            
        }


        public function insertUsuario(){
            if($_POST){
                if(empty($_POST['usuario']) || empty($_POST['password'] || empty($_POST['rol']))){
                    $arrresponse = array('status' => false,'msg' => 'Error en los datos');
                }else{
                    $strUsuario = $_POST['usuario'];
                    $strpassword = $_POST['password'];
                    $strrol = $_POST['rol'];
                    $requestuser = $this->model->InsertUser($strUsuario,$strpassword,$strrol);
                    if($requestuser != 0){
                        $arrresponse = array('status' => true,'msg' => 'Datos guardados correctamente');  
                    }else{
                        $arrresponse = array('status' => false,'msg' => 'Error al insertar los datos');  
                    }

                }
                echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
            }
        }


        public function UpdateUsuario(){
            if($_POST){
                if(empty($_POST['usuario']) || empty($_POST['password']) || empty($_POST['rol']) || empty($_POST['id']) ){
                    $arrresponse = array('status' => false,'msg' => 'Error en los datos');
                }else{
                    $strUsuario = $_POST['usuario'];
                    $strpassword = $_POST['password'];
                    $strrol = $_POST['rol'];
                    $intid = $_POST['id'];
                    $requestuser = $this->model->updateUsuario($strUsuario,$strpassword,$strrol,$intid);
                    if($requestuser != 0){
                        $arrresponse = array('status' => true,'msg' => 'Datos actualizados correctamente');  
                    }else{
                        $arrresponse = array('status' => false,'msg' => 'Error al actualizar los datos');  
                    }

                }
                echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
            }
        }




        public function EliminarUsuario($id){
            $arrdata = $this->model->eliminarUser($id);
            echo json_encode($arrdata,JSON_UNESCAPED_UNICODE);
            die();
        }

    }

?>