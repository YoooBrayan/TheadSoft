<?php 

require_once 'persistencia/Conexion.php';
require_once 'persistencia/ColorDAO.php';


class Color{

    private $id;
    private $nombre;
    private $conexion;
    private $colorDAO;
    private $cantidad;

    function Color($id="", $nombre="", $cantidad=""){
        $this -> id = $id;
        $this-> nombre = $nombre;
        $this->cantidad=$cantidad;
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

    function getCantidad(){
        return $this->cantidad;
    }

    function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }


    public function __get($prop)
    {
        return $this->$prop;
    }

    public function __isset($prop) : bool
    {
        return isset($this->$prop);
    }
}