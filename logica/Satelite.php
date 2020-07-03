<?php 

require_once 'persistencia/Conexion.php';
require_once 'persistencia/SateliteDAO.php';

class Satelite{

    private $id;
    private $nombre;
    private $conexion;
    private $sateliteDAO;
    private $direccion;

    function Satelite($id="", $nombre="", $direccion=""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->conexion = new Conexion();
        $this->sateliteDAO = new SateliteDAO();
        $this->direccion = $direccion;
    }

    function getId(){
        return $this->id;
    }

    function getNombre(){
        return $this->nombre;
    }

    function listaSatelites(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->sateliteDAO->listaSatelites());

        $resultados = array();
        $i = 0;

        while(($registro = $this->conexion->extraer()) != null){

            $resultados[$i] = new Satelite($registro[0], $registro[1]);
            $i++;
        }

        return $resultados;
        $this->conexion->cerrar();
    }

}