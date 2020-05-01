<?php

require_once 'persistencia/Conexion.php';
require_once 'persistencia/VentaDAO.php';

class Venta{

    private $id;
    private $fecha;
    private $modelos;
    private $conexion;
    private $ventaDAO;

    function Venta($id="", $fecha=""){
        $this -> id = $id;
        $this -> fecha = $fecha;
        $this -> modelos = array();
        $this -> conexion = new Conexion();
        $this -> ventaDAO = new VentaDAO($id, $fecha);
    }

    function getId(){
        return $this -> id;
    }

    function setId($id){
        $this -> id = $id;
    }

    function getFecha(){
        return $this -> fecha;
    }

    function setFecha($fecha){
        $this -> fecha = $fecha;
    }

    function setModelos($modelos){
        $this-> modelos = $modelos;
    }

    function getModelos(){
        return $this-> modelos;
    }

    function registrar(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->registrar());
        $this->conexion->cerrar();
    }

    function idModeloAlmacen($modelo, $almacen){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->idModeloAlmacen($modelo, $almacen));
        
        $resultado = "";

        if($this->conexion->numFilas() == 1){
            $resultado = $this->conexion->extraer();
            return $resultado[0];
        }
        $this->conexion->cerrar();
        return $resultado;       
    }

    function idVenta(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->idVenta());
        
        $resultado = "";

        if($this->conexion->numFilas() == 1){
            $resultado = $this->conexion->extraer();
            return $resultado[0];
        }
        $this->conexion->cerrar();
        return $resultado;
    }

    function registrarModeloVenta($almacen, $idVenta){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->registrarModeloVenta($almacen, $idVenta));
        $this->conexion->cerrar();
    }

    function idModeloVenta(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->idModeloVenta());
        
        $resultado = "";

        if($this->conexion->numFilas() == 1){
            $resultado = $this->conexion->extraer();
            return $resultado[0];
        }
        $this->conexion->cerrar();
        return $resultado;
    }

    function registrarModeloTalla($modeloVendido, $talla){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->registrarModeloTalla($modeloVendido, $talla));
        $this->conexion->cerrar();
    }

    function idModeloVentaTalla(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->idModeloVentaTalla());
        
        $resultado = "";

        if($this->conexion->numFilas() == 1){
            $resultado = $this->conexion->extraer();
            return $resultado[0];
        }
        $this->conexion->cerrar();
        return $resultado;       
    }

    function ventaTallaColor($modeloVentaTalla, $color, $cantidad){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->ventaTallaColor($modeloVentaTalla, $color, $cantidad));
        $this->conexion->cerrar();
    }

}       