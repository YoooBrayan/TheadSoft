<?php

class Venta{

    private $id;
    private $fecha;

    function Venta($id="", $fecha=""){
        $this -> id = $id;
        $this -> fecha = $fecha;
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
}