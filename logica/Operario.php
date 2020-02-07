<?php

class Operario extends Persona{

    private $tareas;

    function Operario($id="", $nombre="", $correo="", $clave="", $usuario="", $tareas=""){
        $this -> Persona($id, $nombre, $correo, $clave, $usuario);
        $this -> tareas = new Tarea();
    }

}