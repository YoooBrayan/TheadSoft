<?php 

class Tarea{

    private $id;
    private $operacion;
    private $cantidad;
    
    function Tarea($id="", $operacion="", $cantidad=""){
        $this -> id = $id;     
        $this -> cantidad = $cantidad;
        $this -> operacion = new Operacion();
    }

    function getId(){
        return $this -> id;
    }

    function setId($id){
        $this -> id =$id;
    }

    function getOperacion(){
        return $this -> operacion;
    }

    function setOperacion($operacion){
        $this -> operacion = $operacion;
    }

    function getCantidad(){
        return $this -> cantidad;
    }

    function setCantidad($cantidad){
        $this -> cantidad = $cantidad;
    }
}   

