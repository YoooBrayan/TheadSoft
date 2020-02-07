<?php 

class Estado{

    private $id;
    private $descripcion;

    function Color($id="". $descripcion=""){
        $this -> id = $id;
        $this-> descripcion= $descripcion;
    }

    function getId(){
        return $this -> id;
    }

    function setId($id){
        $this -> id = $id;
    }

    function getdescripcion(){
        return $this -> descripcion;
    }

    function setdescripcion($descripcion){
        $this -> descripcion = $descripcion;
    }

}
 