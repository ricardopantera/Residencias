<?php

class CrearEquipos extends Controllers{
    public function __construct()
    {
        session_start();
        if(empty($_SESSION['login'])){
            header('Location:'.BASE_URL.'Login');
        }
         parent::__construct();
    }
    public function Home(){
        $this->views->getView($this,"CrearEquipos");
    }
    public function getEquipo(){
        $arrdata = $this->model->getEquipo();
        for($i=0;$i < count($arrdata); $i++){
            $arrdata[$i]['options'] = '<div class="text-center">
            <button class="btn btn-warning" onclick="EditEquipo('.$arrdata[$i]['id_equipo'].')"><i class="fas fa-pencil-alt"></i></button>
            <button class="btn btn-danger" onclick="DeleteEquipo('.$arrdata[$i]['id_equipo'].')"><i class="fas fa-trash-alt"></i></button>
            </div>';
        }
    echo json_encode($arrdata,JSON_UNESCAPED_UNICODE);
    die();
    }

    public function insertEquipo(){
        if($_POST){
            if(empty($_POST['equipo'])){
                $arrresponse = array('status' => false,'msg' => 'Error en los datos');
            }else{
                $strEquipo = $_POST['equipo'];
                $requestproyect = $this->model->insertEquipo($strEquipo);
                if($requestproyect != 0){
                    $arrresponse = array('status' => true,'msg' => 'Datos guardados correctamente');  
                }else{
                    $arrresponse = array('status' => false,'msg' => 'Error al insertar los datos');  
                }

            }
            echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
        }
    }
    public function getEquipoId($id){
        $arrdata = $this->model->getEquipoId($id);
        echo json_encode($arrdata,JSON_UNESCAPED_UNICODE);
        die();
        
    }

    public function EditEquipo(){ 
        if($_POST){
            if(empty($_POST['equipo']) || empty($_POST['id']) ){
                $arrresponse = array('status' => false,'msg' => 'Error en los datos');
            }else{
                $strEquipo = $_POST['equipo'];
                $intid = $_POST['id'];
                $requestuser = $this->model->EditEquipo($strEquipo,$intid);
                if($requestuser != 0){
                    $arrresponse = array('status' => true,'msg' => 'Datos actualizados correctamente');  
                }else{
                    $arrresponse = array('status' => false,'msg' => 'Error al actualizar los datos');  
                }

            }
            echo json_encode($arrresponse,JSON_UNESCAPED_UNICODE);
        }
    }

    public function EliminarEquipo($id){
        $arrdata = $this->model->eliminarequipo($id); 
        echo json_encode($arrdata,JSON_UNESCAPED_UNICODE);
        die();
    }

}

?>