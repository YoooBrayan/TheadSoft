<?php 

class Representante extends Persona{

    private $proveedor;

    function Representante($id="", $nombre="", $correo="", $clave="", $usuario="", $proveedor=""){
        $this -> Persona($id, $nombre, $correo, $clave, $usuario);
        $this -> proveedor = new Proveedor();
    }

    function getProveedor(){
        return $this -> proveedor;
    }

    function setProveedor($proveedor){
        $this -> proveedor = $proveedor;
    }

}