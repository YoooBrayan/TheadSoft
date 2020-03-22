<?php 

require_once "logica/proveedor.php";
require_once "logica/Operacion.php";
require_once "persistencia/Conexion.php";
require_once "persistencia/ModeloDAO.php";

class Modelo{

    private $id;
    private $nombre;
    private $valor;
    private $proveedor;
    private $operaciones;
    private $conexion;
    private $modeloDAO;

    function Modelo($id="", $nombre="", $valor="", $proveedor=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> valor = $valor;
        $this -> proveedor = $proveedor;
        $this -> conexion = new Conexion();
        $this -> modeloDAO = new ModeloDAO($id, $nombre, $valor, $proveedor);
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

    function consultarModelos(){
        $this->conexion->abrir();
        //echo $this->proyectoDAO->consultarTutores();
        $this->conexion->ejecutar($this->modeloDAO->consultarModelos());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Modelo($registro[0], $registro[1], $registro[2]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }
    
}