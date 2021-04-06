<?php
class Aspecto extends Controllers{
    public function __construct()
    {
        session_start();
        if(empty($_SESSION['login'])){
            header('Location:'.BASE_URL.'Login');
        }
         parent::__construct();
    }
    public function Home(){
        $this->views->getView($this,"Aspecto");
    }

    public function getAspecto(){
        $arrdata = $this->model->getAspecto();
        for($i=0;$i < count($arrdata); $i++){
            $arrdata[$i]['options'] = '<div class="text-center">
            <button class="btn btn-warning" onclick="EditAspecto('.$arrdata[$i]['id_aspecto'].')"><i class="fas fa-pencil-alt"></i></button>
            <button class="btn btn-danger" onclick="DeleteAspecto('.$arrdata[$i]['id_aspecto'].')"><i class="fas fa-trash-alt"></i></button>
            </div>';
        }
        
    echo json_encode($arrdata,JSON_UNESCAPED_UNICODE);
    die();
    }
    public function insertAspecto(){
        if($_POST){
            if(empty($_POST['aspecto'])){
                $arrresponse = array('status' => false,'msg' => 'Error en los datos');
            }else{
                $strAspecto = $_POST['aspecto'];
                $requestproyect = $this->model->insertAspecto($strAspecto);
                if($requestproyect != 0){
                    $arrresponse = array('status' => true,'msg' => 'Datos guardados correctamente');  
                }else{
                    $arrresponse = array('status' => false,'msg' => 'Error al insertar los datos');  
                }

            }
            echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
        }
    }

    public function getAspectoId($id){
        $arrdata = $this->model->getAspectoId($id);
        echo json_encode($arrdata,JSON_UNESCAPED_UNICODE);
        die();
        
    }
    public function EditAspecto(){
            if($_POST){
                if(empty($_POST['aspecto']) || empty($_POST['id']) ){
                    $arrresponse = array('status' => false,'msg' => 'Error en los datos');
                }else{
                    $strAspecto = $_POST['aspecto'];
                    $intid = $_POST['id'];
                    $requestuser = $this->model->EditAspecto($strAspecto,$intid);
                    if($requestuser != 0){
                        $arrresponse = array('status' => true,'msg' => 'Datos actualizados correctamente');  
                    }else{
                        $arrresponse = array('status' => false,'msg' => 'Error al actualizar los datos');  
                    }

                }
                echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
            }
        }
        public function EliminarAspecto($id){
            $arrdata = $this->model->eliminaraspecto($id);
            echo json_encode($arrdata,JSON_UNESCAPED_UNICODE);
            die();
        }
}

?>