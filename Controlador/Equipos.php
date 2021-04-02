<?php
    class Equipos extends Controllers{

        
        public function __construct()
        {
            
           session_start();
           if(empty($_SESSION['login'])){
               header('Location:'.BASE_URL.'Login');
           }
            parent::__construct();

            
            
        }

        public function Home(){
            $this->views->getView($this,"Equipos");
        }

        public function getEquipos(){
            $arrdata = $this->model->getEquipos();

            for($i=0;$i < count($arrdata); $i++){
                $arrdata[$i]['options'] = '<div class="text-center">
                <button class="btn btn-warning" onclick="EditUser('.$arrdata[$i]['id_equipos'].')"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger" onclick="DeleteUser('.$arrdata[$i]['id_equipos'].')"><i class="fas fa-trash-alt"></i></button>
                </div>';
            }   

            echo json_encode($arrdata,JSON_UNESCAPED_UNICODE);
            die();
            
        }
        public function getEquipo($id){
            $arrdata = $this->model->getEquipo($id);
            echo json_encode($arrdata,JSON_UNESCAPED_UNICODE);
            die();
            
        }

        
        public function insertEquipo(){
            if($_POST){
                if(empty($_POST['equipo']) || empty($_POST['usuario'] || empty($_POST['proyecto']))){
                    $arrresponse = array('status' => false,'msg' => 'Error en los datos');
                }else{
                    $strEquipo = $_POST['equipo'];
                    $strjuez = $_POST['usuario'];
                    $strproyecto = $_POST['proyecto'];
                    $requestequipo = $this->model->insertEquipo($strEquipo,$strproyecto,$strjuez);
                    if($requestequipo != 0){
                        $arrresponse = array('status' => true,'msg' => 'Datos guardados correctamente');   
                    }else{
                        $arrresponse = array('status' => false,'msg' => 'Error al insertar los datos'); 
                    }

                }
                echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
            }
        }
        


        public function UpdateEquipo(){
            if($_POST){
                if(empty($_POST['equipo']) || empty($_POST['usuario']) || empty($_POST['proyecto']) || empty($_POST['id']) ){
                    $arrresponse = array('status' => false,'msg' => 'Error en los datos');
                }else{
                    $strEquipo = $_POST['equipo'];
                    $strjuez = $_POST['usuario'];
                    $strproyecto = $_POST['proyecto'];
                    $strid = $_POST['id'];
                    $requestequipo = $this->model->UpdateEquipo($strEquipo,$strproyecto,$strjuez,$strid);
                    if($requestequipo != 0){
                        $arrresponse = array('status' => true,'msg' => 'Datos guardados correctamente');   
                    }else{
                        $arrresponse = array('status' => false,'msg' => 'Error al insertar los datos'); 
                    }

                }
                echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
            }



        }








        public function ObtenerJuez(){
            $arrjuez = $this->model->ObtenerJuez();
            echo json_encode($arrjuez,JSON_UNESCAPED_UNICODE);
            die(); 
        }


        public function ObtenerProyecto(){
            $arrproyecto = $this->model->ObtenerProyecto();
            echo json_encode($arrproyecto,JSON_UNESCAPED_UNICODE);
            die(); 
        }

    }




?>
