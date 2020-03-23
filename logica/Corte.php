<?php

require_once 'persistencia/Conexion.php';
require_once 'persistencia/CorteDAO.php';

class Corte{

    private $id;
    private $fecha_envio;
    private $fecha_entrega;
    private $observaciones;
    private $representante;
    private $modelo;
    private $estado;
    private $tareas;
    private $tallas = array();
    private $colores;
    private $conexion;
    private $corteDAO;

    function Corte($id="", $fecha_envio="", $fecha_entrega="", $observaciones="", $representante="", $modelo="", $estado="", $tareas="", $tallas="", $colores=""){

        $this -> id = $id;
        $this -> fecha_envio = $fecha_envio;
        $this -> fecha_entrega = $fecha_entrega;
        $this -> observaciones = $observaciones;
        $this -> conexion = new Conexion();
        $this -> corteDAO = new CorteDAO($id, $fecha_envio, $fecha_entrega, $observaciones, $representante, $modelo, "", "", $tallas);
        $this -> representante = new Representante(); 
        $this -> modelo = new Modelo();
        $this -> tallas = $tallas;
    }

    function getId(){
        return $this -> id;
    }

    function setId($id){
        $this -> id = $id;
    }

    function getFecha_Envio(){
        return $this -> fecha_envio;
    }

    function setFecha_Envio($fecha_envio){
        $this -> fecha_envio = $fecha_envio;
    }

    function getFecha_Entrega(){
        return $this -> fecha_entrega;
    }

    function setFecha_Entrega($fecha_entrega){
        $this -> fecha_entrega = $fecha_entrega;
    }

    function getObservaciones(){
        return $this -> observaciones;
    }

    function setObservaciones($observaciones){
        $this -> observaciones = $observaciones;
    }

    function getRepresentante(){
        return $this -> representante; 
    }

    function setRepresentante($representante){
        $this -> representante = $representante;
        $this->corteDAO->setRepresentante($this->representante);
    }

    function getModelo(){
        return $this -> modelo;
    }

    function setModelo($modelo){
        $this -> modelo = $modelo;
        $this->corteDAO->setModelo($modelo);
    }

    function getEstado(){
        return $this -> estado;
    }

    function setEstado($estado){
        $this -> estado = $estado;
    }

    function getTarea(){
        return $this -> tareas;
    }

    function setTarea($tarea){
        $this -> tareas = $tarea;
    }

    function getTallas(){
        return $this -> tallas;
    }

    function setTallas($tallas){
        $this -> tallas = $tallas;
    }

    function getColores(){
        return $this -> colores;
    }

    function setColores($colores){
        $this -> colores = $colores;
    }
    function idCorteNuevo(){
        $this -> conexion -> abrir();
        //echo "<br>" . $this->corteDAO->idCorteNuevo() . "<br>"; 
        $this -> conexion -> ejecutar($this->corteDAO->idCorteNuevo());

        $resultado = $this->conexion->extraer();
        $this -> conexion -> cerrar();
        return $resultado[0];
    }

    function insertar(){
        $this->conexion->abrir();
        //echo "<br>" . $this->corteDAO->insertar() . "<br>";
        $this->conexion->ejecutar($this->corteDAO->insertar());
        $this->conexion->cerrar();
    }

    function agregarTalla(){
        $this->conexion->abrir();

        foreach($this->tallas as $t){
            $this->corteDAO -> setTallas($t);
            //echo "<br>" . $this-> corteDAO->agregarTallas() . "<br>";
            $this->conexion->ejecutar($this->corteDAO->agregarTallas());
        }

        $this->conexion->cerrar();
    }

    function consultar(){
        $this -> conexion -> abrir();
        //echo "<br>" . $this -> corteDAO -> consultar() . "<br>";
        $this -> conexion -> ejecutar($this -> corteDAO -> consultar());
        if($this -> conexion -> numFilas() == 1){
            $resultado = $this -> conexion -> extraer();
            $this -> id = $resultado[0];
            $this -> conexion -> cerrar();
            return true;
        } else {
            $this -> conexion -> cerrar();
            return false;            
        }
    }


}