<?php 

class ModeloDAO{

    private $id;
    private $nombre;
    private $valor;
    private $proveedor;
    private $operaciones;

    function ModeloDAO($id="", $nombre="", $valor="", $proveedor=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> valor = $valor;
        $this -> proveedor = $proveedor;
    }

    function consultarModelos(){
        return "call modelosProveedor('". $this -> proveedor ."')";
    }

    function getId(){
        return $this->id;
    }

}