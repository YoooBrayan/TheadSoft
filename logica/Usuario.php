<?php

class Usuario{

    private $id, $nombre, $descripcion;

    function Usuario($id="", $nombre="", $descripcion=""){
        $this -> id = $id;
        $this-> nombre = $nombre;
        $this-> descripcion = $descripcion;
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

    function getdescripcion(){
        return $this -> descripcion;
    }

    function setdescripcion($descripcion){
        $this -> descripcion = $descripcion;
    }
}
