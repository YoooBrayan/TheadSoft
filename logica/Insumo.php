<?php

class Insumo{

    private $id;
    private $descripcion;
    private $valor;

    function Inventario($id="", $descripcion="", $valor=""){
        $this -> id = $id;
        $this -> descripcion = $descripcion;
        $this -> valor = $valor;
    }

    function getId(){
        return $this -> id;
    }

    function setId($id){
        $this -> id = $id;
    }

    function getDescripcion(){
        return $this -> descripcion;
    }

    function setDescripcion($descripcion){
        $this -> descripcion = $descripcion;
    }

    function getValor(){
        return $this -> valor;
    }

    function setValor($valor){
        $this -> valor = $valor;
    }

}