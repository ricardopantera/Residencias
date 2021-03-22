<?php

class ProductosModel extends Mysql{
    
    public function __construct(){
        parent:: __construct();

    }


    public function setProducto(string $nombre_productos,string $descripcion_productos){
        $query_insert = "INSERT INTO productos(nombre_produtcos,descripcion_productos) VALUES(?,?)";
        $arrdata = array($nombre_productos,$descripcion_productos);
        $request_insert = $this->insert($query_insert,$arrdata);
        return $request_insert;
    }


    public function getProducto($id){
        $sql = "SELECT * FROM productos WHERE id_productos = '$id'";
        $request = $this->select($sql);
        return $request;
    }


    public function updateProducto(int $id,string $nombre_productos,string $descripcion_productos){
        $sql = "UPDATE productos SET nombre_produtcos = ? ,descripcion_productos = ? where id_productos = '$id'";
        $arrdata = array($nombre_productos,$descripcion_productos);
        $request = $this->update($sql,$arrdata);
        return $request;
    }

    public function getProductos(){
        $sql = "SELECT * FROM productos";
        $request = $this->selectAll($sql);
        return $request;
    }

    public function eliminarProducto($id){
        $sql = "DELETE FROM productos where id_productos = '$id'";
        $request = $this->delete($sql);
        return $request;
    }



}



?>