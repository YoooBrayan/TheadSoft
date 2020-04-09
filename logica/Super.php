<?php

require_once "persistencia/Conexion.php";
require "persistencia/SuperDAO.php";

class Super extends Persona{

    private $conexion;
    private $superDAO;

    function Super($id="", $nombre="", $correo="", $clave=""){
        $this -> Persona($id, $nombre, $correo, $clave);
        $this-> conexion = new Conexion();
        $this -> superDAO = new SuperDAO($id, $nombre, $correo, $clave);
    }

    function autenticar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> superDAO -> autenticar());
        if($this -> conexion -> numFilas() == 1){
            $resultado = $this -> conexion -> extraer();
            $this -> id = $resultado[0];
            $this -> conexion -> cerrar();
            return true;
        }else{
            $this -> conexion -> cerrar();
            return false;
        }
    }

    function consultar(){
        $this -> conexion ->abrir();
        $this -> conexion -> ejecutar($this -> superDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> correo = $resultado[1];
        $this -> conexion -> cerrar();
    }
}