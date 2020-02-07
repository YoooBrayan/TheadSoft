<?php

class Corte{

    private $id;
    private $fecha_envio;
    private $fecha_entrega;
    private $observaciones;
    private $representante;
    private $modelo;
    private $estado;
    private $tareas;

    function Corte($id="", $fecha_envio="", $fecha_entrega="", $observaciones="", $representante="", $modelo="", $estado="", $tareas){

        $this -> id = $id;
        $this -> fecha_envio = $fecha_envio;
        $this -> fecha_entrega = $fecha_entrega;
        $this -> observaciones = $observaciones;
        $this -> representante = new Representante(); 
        $this -> modelo = new Modelo();
        $this -> estado = new Estado();
        $this -> tareas = new Tarea();
    }

    function getId(){
        return $this -> id;
    }

    function setId($id){
        $this -> id = $id;
    }

    function getFecha_Envio(){
        return $this -> fecha_Envio;
    }

    function setFecha_Envio($fecha_envio){
        $this -> fecha_envio = $fecha_envio;
    }

    function getFecha_Entrega(){
        return $this -> fecha_Entrega;
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
    }

    function getModelo(){
        return $this -> modelo;
    }

    function setModelo($modelo){
        $this -> modelo = $modelo;
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
}