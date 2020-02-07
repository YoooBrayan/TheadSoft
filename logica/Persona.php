<?php

abstract class Persona{

    private $id, $nombre, $correo, $clave, $usuario;

    function Persona($id="", $nombre="", $correo="", $clave="", $usuario=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> usuario = new Usuario();
    }

    function getId(){
        return $this -> id;
    }

    function setId($id){
        $this -> id = $id;
    }

    function getNombre(){
        return $this -> nombre;
    }

    function setNombre($nombre){
        $this -> nombre = $nombre;
    }

    function getCorreo(){
        return $this -> correo;
    }

    function setCorreo($correo){
        $this -> correo = $correo;
    }

    function getClave(){
        return $this -> clave;
    }

    function setClave($clave){
        $this -> clave = $clave;
    }

    function getUsuario(){
        return $this -> usuario;
    }

    function setUsuario($usuario){
        $this -> usuario = $usuario;
    }

}