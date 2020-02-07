<?php 

require_once "logica/proveedor.php";
require_once "logica/Operacion.php";

class Modelo{

    private $id;
    private $nombre;
    private $valor;
    private $proveedor;
    private $operaciones;

    function Modelo($id="", $nombre="", $valor="", $proveedor, $operaciones){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> valor = $valor;
        $this -> proveedor = new Proyecto();
        $this -> operaciones = new Operacion();
    }

    function getId(){
        return $this -> id;
    }

    function setId($id){
        $this -> id = $id;
    }

    function getNombre(){
        return $this -> nombre;
    }

    function setNombre($nombre){
        $this -> nombre = $nombre;
    }

    function getValor(){
        return $this -> valor;
    }

    function setValor($valor){
        $this -> valor = $valor;
    }

    function getProveedor(){
        return $this -> proveedor;
    }

    function setProveedor($proveedor){
        $this -> proveedor = $proveedor;
    }

    function getOperaciones(){
        return $this -> operaciones;
    }

    function setOperaciones($operaciones){
        $this -> operaciones = $operaciones;
    }
    
}