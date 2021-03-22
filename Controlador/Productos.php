<?php

    
    class Productos  extends Controllers{
        public function __construct()
        {
            parent::__construct();
        }

        public function Productos($params){
            $this->views->getView($this,"Productos");
        }


        public function Insertar(){
            $data = $this->model->setProducto("Manzana","este es una manzana");
            print_r($data);
        }


        public function verProducto($id){
            $data = $this->model->getProducto($id);
            print_r($data);
        }

        public function actualizarProductos(){
            $data = $this->model->updateProducto(1,"prueba manzana","descripcion prueba manzana");
            print_r($data);
        }

        public function verProductos(){
            $data = $this->model->getProductos();
            print_r($data);
        }

        public function eliminarProducto($id){
            $data = $this->model->eliminarProducto($id);
            print_r($data);  
        }




    }

?>