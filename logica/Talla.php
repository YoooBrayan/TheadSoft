<?php

require_once 'Persistencia/Conexion.php';
require_once 'Persistencia/tallaDAO.php';

class Talla{

    private $id;
    private $nombre;
    private $colores;
    private $conexion;
    private $tallaDAO;

    function Talla($id="", $nombre="", $colores=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> conexion = new Conexion();
        $this -> tallaDAO = new TallaDAO();
        $this-> colores = new Color();
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

    function getColores(){
        return $this -> colores;
    }

    function setColores($colores){
        $this -> colores = $colores;
    }

    function consultarTallas(){
        $this->conexion->abrir();
        //echo $this->proyectoDAO->consultarTutores();
        $this->conexion->ejecutar($this->tallaDAO->consultarTallas());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Talla($registro[0]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }

}