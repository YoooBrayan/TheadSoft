<?php 

class Color{

    private $id;
    private $nombre;

    function Color($id="". $nombre=""){
        $this -> id = $id;
        $this-> nombre= $nombre;
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
}