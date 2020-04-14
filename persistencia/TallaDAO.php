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

    function consultarColores($corte){
        return "select Color_Nombre, ctc.cantidad 
        from corte c join corte_talla ct on ct.corte_id = c.corte_id join corte_talla_color ctc on ctc.corte_talla_id = ct.corte_talla_id join color co on co.color_id = ctc.color_id
        where c.corte_id = '". $corte."' and ct.talla_id = '". $this-> id ."'";
    }
}