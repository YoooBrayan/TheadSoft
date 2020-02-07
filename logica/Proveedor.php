<?php 

class Proveedor{

    private $id;
    private $razonSocial;

    function Proveedor($id, $razonSocial){
        $this->id = $id;
        $this->razonSocial = $razonSocial;
    }

    function setId($id){
        $this->id =$id;
    }

    function getId(){
        return $this->id;
    }

    function getRazonSocial(){
        return $this->razonSocial;
    }

    function setRazonSocial($razonSocial){
        $this->razonSocial = $razonSocial;
    }
}

?>