<?php

class Venta{

    private $id;
    private $fecha;
    private $modelos;

    function Venta($id="", $fecha=""){
        $this -> id = $id;
        $this -> fecha = $fecha;
        $this-> modelos = array();
    }

    function getId(){
        return $this -> id;
    }

    function setId($id){
        $this -> id = $id;
    }

    function getFecha(){
        return $this -> fecha;
    }

    function setFecha($fecha){
        $this -> fecha = $fecha;
    }

    function setModelos($modelos){
        $this-> modelos = $modelos;
    }

    function getModelos(){
        return $this-> modelos;
    }

}