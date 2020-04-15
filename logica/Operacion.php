<?php

class Operacion {
    
    private $identificacion;
    private $valor;
    private $descripcion;

    function Operacion($identificacion="",  $valor="",  $descripcion="") {
        $this -> identificacion = $identificacion;
        $this -> valor = $valor;
        $this -> descripcion = $descripcion;
    }
    
    function  getIdentificacion() {
        return $this -> identificacion;
    }

    function setIdentificacion($identificacion) {
        $this -> identificacion = $identificacion;
    }

    function  getValor() {
        return $this -> valor;
    }

    function setValor($valor) {
        $this -> valor = $valor;
    }

    function  getDescripcion() {
        return $this -> descripcion;
    }

    function setDescripcion($descripcion) {
        $this -> descripcion = $descripcion;
    }
    
    
}