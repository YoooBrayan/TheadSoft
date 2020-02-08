<?php

class Almacen{

    private $id;
    private $lugar;
    private $modelos;
    private $ventas;
    private $insumos;

    function Almacen($id="", $lugar="", $modelos=null, $ventas=null, $insumos=null){
        $this -> id = $id;
        $this -> lugar = $lugar;
        $this -> modelos = new Modelo();
        $this -> ventas = new Venta();
        $this -> insumos = new Insumo();
    }

    function getId(){
        return $this -> id;
    }

    function setId($id){
        $this -> id = $id;
    }

    function getModelos(){
        return $this -> modelos;
    }

    function setModelo($modelos){
        $this -> modelos = $modelos;
    }

    function getVentas(){
        return $this -> ventas;
    }

    function setVentas($ventas){
        $this -> ventas = $ventas;
    }

}