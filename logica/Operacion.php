<?php

class Operacion {
    
    private $identificacion;
    private $valor;
    private $Descripcion;

    function Operacion($identificacion="",  $valor="",  $Descripcion="") {
        $this -> identificacion = $identificacion;
        $this -> valor = $valor;
        $this -> Descripcion = $Descripcion;
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
        return $this -> Descripcion;
    }

    function setDescripcion($Descripcion) {
        $this -> Descripcion = $Descripcion;
    }
    
}