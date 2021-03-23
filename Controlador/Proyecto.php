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
            <button class="btn btn-warning" onclick="EditUser('.$arrdata[$i]['id_proyecto'].')"><i class="fas fa-pencil-alt"></i></button>
            <button class="btn btn-danger" onclick="DeleteUser('.$arrdata[$i]['id_proyecto'].')"><i class="fas fa-trash-alt"></i></button>
            </div>';
        }
        
    echo json_encode($arrdata,JSON_UNESCAPED_UNICODE);
    die();
    }
    
    
    
}



?>