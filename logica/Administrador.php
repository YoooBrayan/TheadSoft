<?php

class Administrador extends Persona{

    function Administrador($id="", $nombre="", $correo="", $clave="", $usuario=""){
        $this -> Persona($id, $nombre, $correo, $clave, $usuario);
    }

}