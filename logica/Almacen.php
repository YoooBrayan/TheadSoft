<?php

require_once 'persistencia/Conexion.php';
require_once 'persistencia/AlmacenDAO.php';

class Almacen
{

    private $id;
    private $lugar;
    private $modelos;
    private $ventas;
    private $insumos;
    private $almacenDAO;
    private $conexion;

    function Almacen($id = "", $lugar = "", $modelos = null, $ventas = null, $insumos = null)
    {
        $this->id = $id;
        $this->lugar = $lugar;
        $this->conexion = new Conexion();
        $this->almacenDAO = new AlmacenDAO($id, $lugar, $modelos);
        $this->modelos = $modelos;
        $this->ventas = new Venta();
        $this->insumos = new Insumo();
    }

    function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function getModelos()
    {
        return $this->modelos;
    }

    function setModelo($modelos)
    {
        $this->modelos = $modelos;
    }

    function getVentas()
    {
        return $this->ventas;
    }

    function setVentas($ventas)
    {
        $this->ventas = $ventas;
    }

    function getLugar()
    {
        return $this->lugar;
    }

    function listaAlmacenes()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->almacenDAO->listaAlmacenes());

        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Almacen($registro[0], $registro[1]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }

    function modelosMercancia()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->almacenDAO->modelosMercancia());

        $resultado = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultado[$i] =  array(
                'id' => $registro[0],
                'modelo' => $registro[1],
                'cantidad' => $registro[2]
            );
            $i++;
        }
        $this->conexion->cerrar();
        return $resultado;
    }

    function modeloAlmacen()
    {

        $this->conexion->abrir();
        $this->conexion->ejecutar($this->almacenDAO->modeloAlmacen());

        $resultado = array();

        while (($registro = $this->conexion->extraer()) != null) {
            $resultado =  array(
                'id' => $registro[0],
                'modelo' => $registro[1],
                'cantidad' => $registro[2]
            );
        }
        $this->conexion->cerrar();
        return $resultado;
    }

    function tallaModeloAlmacen()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->almacenDAO->tallasModeloAlmacen());

        $resultado = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultado[$i] = array(
                'talla' => $registro[0],
                'cantidad' => $registro[1]
            );
            $i++;
        }
        return $resultado;
        $this->conexion->cerrar();
    }

    function coloresTallaModeloAlmacen($talla)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->almacenDAO->coloresTallaModeloAlmacen($talla));

        $resultado = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultado[$i] = array(
                'id' => $registro[0],
                'color' => $registro[1],
                'cantidad' => $registro[2]
            );
            $i++;
        }
        return $resultado;
        $this->conexion->cerrar();
    }

    function idModeloDistribuido()
    {
        $this->conexion->abrir();
        echo "\n" . $this->almacenDAO->idModeloDistribuido();
        $this->conexion->ejecutar($this->almacenDAO->idModeloDistribuido());
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            return $resultado[0];
        } else {
            $this->conexion->cerrar();
        }
    }

    function validarAlmacen()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->almacenDAO->validarAlmacen());
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            return true;
        } else {
            $this->conexion->cerrar();
            return false;
        }
    }


    function distribuirModelo($id)
    {
        $this->conexion->abrir();
        echo "\n".$this->almacenDAO->distribuirModelo($id);
        $this->conexion->ejecutar($this->almacenDAO->distribuirModelo($id));
        $this->conexion->cerrar();
    }

    function distribuirAlmacen($modelo)
    {
        $this->conexion->abrir();
        echo "\n".$this->almacenDAO->distribuirAlmacen($modelo);
        $this->conexion->ejecutar($this->almacenDAO->distribuirAlmacen($modelo));
        $this->conexion->cerrar();
    }

    function registrar(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->almacenDAO->registrar());
        $this->conexion->cerrar();
    }
}
