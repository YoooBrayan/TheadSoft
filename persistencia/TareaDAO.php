<?php 

class TareaDAO{

    private $id;
    private $operacion;
    private $cantidad;
    
    function TareaDAO($id="", $operacion="", $cantidad=""){
        $this -> id = $id;     
        $this -> cantidad = $cantidad;
        $this -> operacion = $operacion;
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

    function eliminarTarea(){
        return "call eliminarTarea('". $this->id ."')";
    }
}   

