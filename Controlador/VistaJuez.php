<?php
    class VistaJuez extends Controllers{
        public function __construct()
        {
           session_start();
           if(empty($_SESSION['login'])){
               header('Location:'.BASE_URL.'Login');
           }
            parent::__construct();
            
        }

        public function Home(){
            $this->views->getView($this,"VistaJuez");
        }
    }


 ?>