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
        return "select representante_id from representante where representante_correo = '". $this -> correo ."' and representante_clave = sha1('". $this -> clave ."')";
    }

    function consultar(){
        return "select representante_nombre, representante_correo, representante_proveedor from representante where representante_id =  '" . $this -> id . "' ";
    }

    function proveedor(){
        return "select representante_proveedor from representante where '" . $this-> id . "'";
    }

    function insertar(){
        return "insert into representante(representante_id, representante_nombre, representante_Correo, representante_Clave, representante_proveedor) values ('". $this->id ."', '". $this->nombre ."', '". $this->correo ."', sha1('".$this->clave."'), '".$this->proveedor()->getId()."')";
    }
} 