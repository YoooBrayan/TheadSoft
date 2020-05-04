<?php

require_once 'persistencia/Conexion.php';
require_once 'persistencia/VentaDAO.php';

class Venta
{

    private $id;
    private $fecha;
    private $modelos;
    private $conexion;
    private $ventaDAO;
    private $cantidad;
    private $valor;

    function Venta($id = "", $fecha = "", $cantidad = "", $valor = "")
    {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->modelos = array();
        $this->cantidad = $cantidad;
        $this->conexion = new Conexion();
        $this->ventaDAO = new VentaDAO($id, $fecha);
        $this->valor = $valor;
    }

    function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function getFecha()
    {
        return $this->fecha;
    }

    function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    function setModelos($modelos)
    {
        $this->modelos = $modelos;
    }

    function getModelos()
    {
        return $this->modelos;
    }

    function getCantidad()
    {
        return $this->cantidad;
    }

    function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    function setValor($valor)
    {
        $this->valor = $valor;
    }

    function getValor()
    {
        return $this->valor;
    }

    function registrar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->registrar());
        $this->conexion->cerrar();
    }

    function idModeloAlmacen($modelo, $almacen)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->idModeloAlmacen($modelo, $almacen));

        $resultado = "";

        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            return $resultado[0];
        }
        $this->conexion->cerrar();
        return $resultado;
    }

    function idVenta()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->idVenta());

        $resultado = "";

        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            return $resultado[0];
        }
        $this->conexion->cerrar();
        return $resultado;
    }

    function registrarModeloVenta($almacen, $idVenta)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->registrarModeloVenta($almacen, $idVenta));
        $this->conexion->cerrar();
    }

    function idModeloVenta()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->idModeloVenta());

        $resultado = "";

        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            return $resultado[0];
        }
        $this->conexion->cerrar();
        return $resultado;
    }

    function registrarModeloTalla($modeloVendido, $talla)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->registrarModeloTalla($modeloVendido, $talla));
        $this->conexion->cerrar();
    }

    function idModeloVentaTalla()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->idModeloVentaTalla());

        $resultado = "";

        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            return $resultado[0];
        }
        $this->conexion->cerrar();
        return $resultado;
    }

    function ventaTallaColor($modeloVentaTalla, $color, $cantidad)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->ventaTallaColor($modeloVentaTalla, $color, $cantidad));
        $this->conexion->cerrar();
    }

    function modelosVenta()
    {
        $this->conexion->abrir();
        //echo "\n". $this->ventaDAO->modelosVenta();
        $this->conexion->ejecutar($this->ventaDAO->modelosVenta());

        $modelos = array();
        $i = 0;

        while (($registro = $this->conexion->extraer()) != null) {
            $modelos[$i] = new Modelo($registro[0], $registro[1]);
            $i++;
        }
        return $modelos;
    }

    function tallasModeloVenta($modelo)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->tallasModeloVenta($modelo));

        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Talla($registro[0]);
            $i++;
        }
        //$this->conexion->cerrar();
        return $resultados;
    }

    function tallaModeloVenta($modelo, $talla)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->tallaModeloVenta($modelo, $talla));
        $resultado = "";
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            return $resultado[0];
        }
    }

    function coloresTallaModeloVenta($modelo, $talla)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->coloresTallaModeloVenta($modelo, $talla));

        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Color($registro[0], $registro[1]);
            $i++;
        }
        //$this->conexion->cerrar();
        return $resultados;
    }

    function colorTallaModeloVenta($modelo, $talla, $color)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->colorTallaModeloVenta($modelo, $talla, $color));
        $resultado = "";
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            return $resultado[0];
        }
    }

    function modelosVentaTC()
    {

        $modelos = array();
        $tallasM = array();
        $iT = 0;

        $this->conexion->abrir();
        $this->conexion->ejecutar($this->ventaDAO->modelosVenta());
        while (($registro = $this->conexion->extraer()) != null) {
            $modelos[$iT] = new Modelo($registro[0], $registro[1]);
            $iT++;
        }

        foreach ($modelos as $m) {

            $tallasM = $this->tallasModeloVenta($m->getId());

            foreach ($tallasM as $t) {

                $cantidad = $this->tallaModeloVenta($m->getId(), $t->getId());

                $colores = $this->coloresTallaModeloVenta($m->getId(), $t->getId());

                foreach ($colores as $c) {
                    $cantidadC = $this->colorTallaModeloVenta($m->getId(), $t->getId(), $c->getId());
                    $c->setCantidad($cantidadC);
                }

                $t->setCantidad($cantidad);
                $t->setColores($colores);
            }

            $m->setTalla($tallasM);
        }

        $this->modelos = $modelos;
    }
}
