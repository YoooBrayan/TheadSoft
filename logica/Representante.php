<?php 

require_once "persistencia/Conexion.php";
require "persistencia/RepresentanteDAO.php";

class Representante extends Persona{

    private $proveedor;
    private $representanteDAO;
    private $conexion;

    function Representante($id="", $nombre="", $correo="", $clave=""){
        $this -> Persona($id, $nombre, $correo, $clave);
        //$this -> proveedor = new Proveedor();
        $this -> conexion = new Conexion();
        $this -> representanteDAO = new RepresentanteDAO($id, $nombre, $correo, $clave);
    }

    function getProveedor(){
        return $this -> proveedor;
    }

    function setProveedor($proveedor){
        $this -> proveedor = $proveedor;
    }

    function autenticar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> representanteDAO -> autenticar());
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
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> representanteDAO -> consultar());
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> correo = $resultado[1]; 
        $this -> proveedor = $resultado[2];
        $this -> conexion -> cerrar();
        
    }

}