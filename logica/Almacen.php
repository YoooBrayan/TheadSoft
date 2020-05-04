<?php

require_once 'persistencia/Conexion.php';
require_once 'persistencia/AlmacenDAO.php';

class Almacen
{

    private $id;
    private $lugar;
    private $modelos = array();
    private $ventas = array();
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

        $tallasM = array();

        while (($registro = $this->conexion->extraer()) != null) {
            $this->modelos->setId($registro[0]);
            $this->modelos->setNombre($registro[1]);
            $this->modelos->setCantidad($registro[2]);
        }

        $tallas = $this->tallasModeloAlmacen();

        foreach($tallas as $t){
            $cantidadT = $this->tallaModeloAlmacen($t->getId());
            $t -> setCantidad($cantidadT);

            $colores = $this->coloresTallaModeloAlmacen($t->getId());

            foreach($colores as $c){
                $cantidadC = $this->colorTallaModeloAlmacen($t -> getId(), $c -> getId());
                $c -> setCantidad($cantidadC);
            }

            $t -> setColores($colores);
            array_push($tallasM, $t);
        }

        $this->modelos->setTalla($tallasM);
        $this->conexion->cerrar();
    }

    function tallasModeloAlmacen()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->almacenDAO->tallasModeloAlmacen());

        $resultado = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultado[$i] = new Talla($registro[0]);
            $i++;
        }
        return $resultado;
        $this->conexion->cerrar();
    }

    function tallasModeloAlmacenV()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->almacenDAO->tallasModeloAlmacen());

        $resultado = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultado[$i] = array(
                'talla' => $registro[0]
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

        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Color($registro[0], $registro[1]);
            $i++;
        }
        return $resultados;
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
            return 1;
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
        echo "\n" . $this->almacenDAO->distribuirModelo($id);
        $this->conexion->ejecutar($this->almacenDAO->distribuirModelo($id));
        $this->conexion->cerrar();
    }

    function distribuirAlmacen($modelo)
    {
        $this->conexion->abrir();
        echo "\n" . $this->almacenDAO->distribuirAlmacen($modelo);
        $this->conexion->ejecutar($this->almacenDAO->distribuirAlmacen($modelo));
        $this->conexion->cerrar();
    }

    function registrar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->almacenDAO->registrar());
        $this->conexion->cerrar();
    }

    function tallasModelo($modelo, $talla)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->almacenDAO->tallasModelo($modelo, $talla));
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            return $resultado[0];
        } else {
            $this->conexion->cerrar();
            return "";
        }
    }

    function colorTallaModeloAlmacen($talla, $color)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->almacenDAO->colorTallaModeloAlmacen($talla, $color));
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            return $resultado[0];
        } else {
            //$this->conexion->cerrar();
            return "";
        }
    }

    function modeloMercanciaAlmacen($modelo)
    {

        $this->conexion->abrir();
        $this->conexion->ejecutar($this->almacenDAO->modeloMercanciaAlmacen($modelo));
        $resultado = array();
        if ($this->conexion->numFilas() == 1) {
            $registros = $this->conexion->extraer();
            $resultado = array(
                'id' => $registros[0],
                'modelo' => $registros[1],
                'cantidad' => $registros[2]
            );

            return $resultado;
        } else {
            $this->conexion->cerrar();
            return "";
        }
    }

    function tallaModeloAlmacen($talla)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->almacenDAO->tallaModeloAlmacen($talla));

        if ($this->conexion->numFilas() == 1) {
            $registros = $this->conexion->extraer();
            $resultado = $registros[0];
            return $resultado;
        } else {
            //$this->conexion->cerrar();
            return "";
        }
    }

    function ventas($fechaI, $fechaF){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->almacenDAO->ventas($fechaI, $fechaF));
        
        $modelos = array();

        while(($registro = $this->conexion->extraer()) != null)
        {
            $venta = new Venta($registro[0], $registro[1], $registro[2], $registro[3]);
            $venta -> setModelos($venta -> modelosVenta());

            array_push($modelos, $venta);
        }

        $this->ventas = $modelos;
        $this->conexion->cerrar();
    }

    function ventasAlmacen($fechaI, $fechaF)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->almacenDAO->ventasAlmacen($fechaI, $fechaF));

        if ($this->conexion->numFilas() == 1) {
            $registros = $this->conexion->extraer();
            $resultado = $registros[0];
            return $resultado;
        } else {
            //$this->conexion->cerrar();
            return "";
        }
    }
}
