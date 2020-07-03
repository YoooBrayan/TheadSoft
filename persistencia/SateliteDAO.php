<?php 


class SateliteDAO{

    private $id;
    private $nombre;
    private $direccion;

    function SateliteDAO($id="", $nombre="", $direccion=""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
    }

    function getId(){
        return $this->id;
    }

    function getNombre(){
        return $this->nombre;
    }

    function listaSatelites(){
        return "select satelite_id, satelite_nombre from satelite";
    }
    
}