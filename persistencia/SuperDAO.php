<?php 

class SuperDAO{

    private $id, $nombre, $correo, $clave;

    function AdministradorDAO($id="", $nombre="", $correo="", $clave=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> correo = $correo;
        $this -> clave = $clave;
    }

    function autenticar(){
        return "select Id from super where correo = '" . $this -> correo .  "' and clave = sha1('" . $this -> clave ."') ";
    }

    function consultar(){
        return "select nombre, correo from administrador where administrador_id = '". $this -> id ."' ";
    }
    
}