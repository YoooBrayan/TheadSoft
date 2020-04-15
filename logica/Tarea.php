<?php 

require_once 'persistencia/Conexion.php';
require_once 'persistencia/TareaDAO.php';

class Tarea{

    private $id;
    private $operacion;
    private $cantidad;
    private $conexion;
    private $tareaDAO;
    
    function Tarea($id="", $operacion="", $cantidad=""){
        $this -> id = $id;     
        $this -> cantidad = $cantidad;
        $this -> operacion = $operacion;    
        $this->tareaDAO = new TareaDAO($id, $operacion, $cantidad);
        $this->conexion = new Conexion();
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

        $this->conexion->abrir();
        //echo $this->tareaDAO->eliminarTarea();
        $this->conexion->ejecutar($this->tareaDAO->eliminarTarea());
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            $this->id = $resultado[0];
            $this->conexion->cerrar();
        } else {
            $this->conexion->cerrar();
        }
    }
}   

