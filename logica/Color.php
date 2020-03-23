<?php 

require_once 'persistencia/Conexion.php';
require_once 'persistencia/ColorDAO.php';


class Color{

    private $id;
    private $nombre;
    private $conexion;
    private $colorDAO;

    function Color($id="", $nombre=""){
        $this -> id = $id;
        $this-> nombre = $nombre;
        $this -> conexion = new Conexion(); 
        $this -> colorDAO = new ColorDAO($id, $nombre);
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

    function consultarColores(){
        $this->conexion->abrir();
        //echo $this->proyectoDAO->consultarTutores();
        $this->conexion->ejecutar($this->colorDAO->consultarColores());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Color($registro[0], $registro[1]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }
}