<?php 

class Controllers{


    public function __construct()
    {
        $this->views = new Views();
        $this->loadModel();
    }


    public function loadModel(){
        $model = get_class($this)."Model";
        $routeclass = "./Modelo/".$model.".php";
        if(file_exists($routeclass)){
            require_once($routeclass);
            $this->model = new $model();

        }
    }   
}



?>