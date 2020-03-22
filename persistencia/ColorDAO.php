<?php 

class ColorDAO{

    private $id;
    private $nombre;

    function ColorDAO($id="", $nombre=""){
        $this -> id = $id;
        $this-> nombre= $nombre;
    }

    function consultarColores(){
        return "select * from color";
    }

}
