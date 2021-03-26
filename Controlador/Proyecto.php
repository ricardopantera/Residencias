<?php

class Proyecto extends Controllers{
    public function __construct()
    {
        session_start();
        if(empty($_SESSION['login'])){
            header('Location:'.BASE_URL.'Login');
        }
         parent::__construct();
    }
    public function Home(){
        $this->views->getView($this,"Proyecto");
    }
    
    public function getProyecto(){
        $arrdata = $this->model->getProyecto();
        for($i=0;$i < count($arrdata); $i++){
            $arrdata[$i]['options'] = '<div class="text-center">
            <button class="btn btn-warning" onclick="EditProyecto('.$arrdata[$i]['id_proyecto'].')"><i class="fas fa-pencil-alt"></i></button>
            <button class="btn btn-danger" onclick="DeleteProyecto('.$arrdata[$i]['id_proyecto'].')"><i class="fas fa-trash-alt"></i></button>
            </div>';
        }
        
    echo json_encode($arrdata,JSON_UNESCAPED_UNICODE);
    die();
    }
    
    public function insertProyecto(){
        if($_POST){
            if(empty($_POST['proyecto'])){
                $arrresponse = array('status' => false,'msg' => 'Error en los datos');
            }else{
                $strProyecto = $_POST['proyecto'];
                $requestproyect = $this->model->insertProyecto($strProyecto);
                if($requestproyect != 0){
                    $arrresponse = array('status' => true,'msg' => 'Datos guardados correctamente');  
                }else{
                    $arrresponse = array('status' => false,'msg' => 'Error al insertar los datos');  
                }

            }
            echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
        }
    }


    public function getProyectoId($id){
        $arrdata = $this->model->getProyectoId($id);
        echo json_encode($arrdata,JSON_UNESCAPED_UNICODE);
        die();
        
    }
            public function EditProyecto(){
            if($_POST){
                if(empty($_POST['proyecto']) || empty($_POST['id']) ){
                    $arrresponse = array('status' => false,'msg' => 'Error en los datos');
                }else{
                    $strProyecto = $_POST['proyecto'];
                    $intid = $_POST['id'];
                    $requestuser = $this->model->EditProyecto($strProyecto,$intid);
                    if($requestuser != 0){
                        $arrresponse = array('status' => true,'msg' => 'Datos actualizados correctamente');  
                    }else{
                        $arrresponse = array('status' => false,'msg' => 'Error al actualizar los datos');  
                    }

                }
                echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
            }
        }



       
        public function EliminarProyecto($id){
            $arrdata = $this->model->eliminarproyect($id);
            echo json_encode($arrdata,JSON_UNESCAPED_UNICODE);
            die();
        }
    
}

?>