<?php

class RepresentanteDAO{
    
    private $id, $nombre, $correo, $clave, $usuario;

    function RepresentanteDAO($id="", $nombre="", $correo="", $clave=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> correo = $correo;
        $this -> clave = $clave;
        //$this -> usuario = new Usuario();
    }

    function autenticar(){
        return "select representante_id from representante where representante_correo = '". $this -> correo ."' and clave = sha1('". $this -> clave ."')";
    }

    function consultar(){
        return "select representante_nombre, representante_correo, representante_proveedor from representante where representante_id =  '" . $this -> id . "' ";
    }

    function proveedor(){
        return "select representante_proveedor from representante where '" . $this-> id . "'";
    }
}