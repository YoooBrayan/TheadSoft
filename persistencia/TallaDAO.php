<?php


class TallaDAO{

    private $id;
    private $nombre;
    private $colores;

    function TallaDAO($id="", $nombre="", $colores=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
    }

    function consultarTallas(){
        return "Select Talla_Id as Talla from Talla";
    }
}