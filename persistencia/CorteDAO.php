<?php

class CorteDAO
{

    private $id;
    private $fecha_envio;
    private $fecha_entrega;
    private $observaciones;
    private $representante;
    private $modelo;
    private $estado;
    private $tareas;
    private $tallas;
    private $colores;

    function CorteDAO($id = "", $fecha_envio = "", $fecha_entrega = "", $observaciones = "", $representante = "", $modelo = "", $estado = "", $tareas="", $tallas=""){

        $this->id = $id;
        $this->fecha_envio = $fecha_envio;
        $this->fecha_entrega = $fecha_entrega;
        $this->observaciones = $observaciones;
        $this->tallas = new Talla();
        $this->colores = new Color();
        $this->representante = new Representante();
        $this->modelo = new Modelo();
    }

    function insertar(){
        return "call nuevoCorte('". $this -> id ."', '". $this -> representante -> getId() ."', '". $this -> modelo -> getId() ."', '". $this -> fecha_envio ."', '". $this -> fecha_entrega ."', '". $this -> observaciones ."')";
    }

    function idCorteNuevo(){
        return "select (Corte_Id + 1) from Corte order by Corte_Id desc limit 1";
    }

    function agregarTallas(){
        return "call agregarTallaCorte('". $this -> id ."', '". $this -> tallas -> getId() ."', '" . $this -> tallas -> getCantidad() ."')";
    }

    function agregarColores(){
        return "call agregarColorCorte('". $this -> id ."', '". $this -> colores -> getId() ."', '" . $this -> colores -> getCantidad() ."')";
    }

    function setTallas($tallas){
        $this->tallas = $tallas;
    }

    function getTallas(){
        return $this -> tallas;
    }

    function setColores($colores){
        $this->colores = $colores;
    }

    function getColores(){
        return $this->colores;
    }

    function consultar(){
        return "select c.corte_id from corte c inner join corte_talla ct on c.corte_id = ct.corte_id where c.Corte_id = '". $this->id ."'";
    }

    function setRepresentante($representante){
        $this->representante = $representante;
    }
    
    function setModelo($modelo){
        $this->modelo=$modelo;
    }

    function eliminarTalla($talla){
        return "delete from corte_talla where corte_id = '". $this->id ."' and talla_id = '". $this-> $talla ."'";
    }
}
?>