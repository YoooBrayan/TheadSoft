<?php


class Talla{

    private $id;
    private $nombre;
    private $colores;

    function Talla($id="", $nombre="", $colores=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
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

}