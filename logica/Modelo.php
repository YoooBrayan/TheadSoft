<?php

require_once "logica/proveedor.php";
require_once "logica/Operacion.php";
require_once "logica/Talla.php";
require_once "persistencia/Conexion.php";
require_once "persistencia/ModeloDAO.php";

class Modelo
{

    private $id;
    private $nombre;
    private $valor;
    private $proveedor;
    private $operaciones;
    private $conexion;
    private $modeloDAO;
    private $talla;
    private $color;

    function Modelo($id = "", $nombre = "", $valor = "", $proveedor = "", $talla = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->valor = $valor;
        $this->proveedor = $proveedor;
        $this->conexion = new Conexion();
        $this->modeloDAO = new ModeloDAO($id, $nombre, $valor, $proveedor);
        $this->operaciones = new Operacion();
        $this->talla = array();
        $this->color = array();
    }

    function setTalla($talla)
    {
        $this->talla = $talla;
    }

    function getTalla()
    {
        return $this->talla;
    }

    function setColor($color)
    {
        $this->color = $color;
    }

    function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function getValor()
    {
        return $this->valor;
    }

    function setValor($valor)
    {
        $this->valor = $valor;
    }

    function getProveedor()
    {
        return $this->proveedor;
    }

    function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;
    }

    function getOperaciones()
    {
        return $this->operaciones;
    }

    function setOperaciones($operaciones)
    {
        $this->operaciones = $operaciones;
    }

    function consultarModelos()
    {
        $this->conexion->abrir();
        //echo $this->proyectoDAO->consultarTutores();
        $this->conexion->ejecutar($this->modeloDAO->consultarModelos());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Modelo($registro[0], $registro[1], $registro[2]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }

    function modeloBodega()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->modeloDAO->modeloBodega());
        $datos = array();
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            $datos = array(
                'id' => $resultado[0],
                'modelo' => $resultado[1],
                'cantidad' => $resultado[2]
            );
            $this->conexion->cerrar();
        } else {
            $this->conexion->cerrar();
        }
        return $datos;
    }

    function modeloAlmacen()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->modeloDAO->modeloAlmacen());
        $datos = array();
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            $datos = array(
                'id' => $resultado[0],
                'modelo' => $resultado[1],
                'cantidad' => $resultado[2]
            );
            $this->conexion->cerrar();
        } else {
            $this->conexion->cerrar();
        }
        return $datos;
    }

    function totalEntregadas()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->modeloDAO->totalEntregadas());
        $resultado = "";
        while ($this->conexion->numFilas() == 1) {
            $registro = $this->conexion->extraer();
            $resultado = $registro[0];
        }
        $this->conexion->cerrar();
        return $resultado;
    }

    function tallasModeloBodega()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->modeloDAO->tallasModeloBodega());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = $registro[0];
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }

    function modeloTallaBodega($talla)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->modeloDAO->modeloTallaBodega($talla));
        $resultado = "";
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            if ($resultado[0] == 0) {
                $this->conexion->ejecutar($this->modeloDAO->modeloTallaBodegaS($talla));
                $resultado = "";
                if ($this->conexion->numFilas() == 1) {
                    $resultado = $this->conexion->extraer();
                    $this->conexion->cerrar();
                    return $resultado[0];
                }
                return $resultado[0];
                $this->conexion->cerrar();
            }
            return $resultado[0];
        }
    }

    function coloresModeloBodega($talla)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->modeloDAO->coloresModeloBodega($talla));
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Color($registro[0], $registro[1]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }

    function colorTallaModeloBodegaA($color, $talla)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->modeloDAO->colorTallaModeloBodegaA($color, $talla));
        $resultado = "";
        if ($this->conexion->numFilas() == 1) {
            $this->conexion->ejecutar($this->modeloDAO->colorTallaModeloBodega($color, $talla));
            $resultado = "";
            if ($this->conexion->numFilas() == 1) {
                $resultado = $this->conexion->extraer();
                $this->conexion->cerrar();
                return $resultado[0];
            }
            return $resultado[0];
            $this->conexion->cerrar();
        } else {
            $this->conexion->ejecutar($this->modeloDAO->colorTallaModeloBodegaS($color, $talla));
            $resultado = "";
            if ($this->conexion->numFilas() == 1) {
                $resultado = $this->conexion->extraer();
                $this->conexion->cerrar();
                return $resultado[0];
            }
        }
        return $resultado;
    }


    function colorTallaModeloBodega($color, $talla)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->modeloDAO->colorTallaModeloBodega($color, $talla));
        $resultado = "";
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            $this->conexion->cerrar();
            return $resultado[0];
        } else {
            $this->conexion->ejecutar($this->modeloDAO->colorTallaModeloBodegaS($color, $talla));
            $resultado = "";
            if ($this->conexion->numFilas() == 1) {
                $resultado = $this->conexion->extraer();
                $this->conexion->cerrar();
                return $resultado[0];
            }
            return $resultado[0];
            $this->conexion->cerrar();
        }
        return $resultado;
    }

    function colorTallaModeloBodegaS($color, $talla)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->modeloDAO->colorTallaModeloBodegaS($color, $talla));
        $resultado = "";
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            $this->conexion->cerrar();
            return $resultado[0];
        } else {
            $this->conexion->cerrar();
        }
    }

    function idModeloTalla($modeloD)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->modeloDAO->idModeloTalla($modeloD));
        $resultado = $this->conexion->extraer();
        return $resultado[0];
    }

    function agregarTallaModeloD()
    {
        $this->conexion->abrir();

        foreach ($this->talla as $t) {
            $this->modeloDAO->setTalla($t);
            $this->conexion->ejecutar($this->modeloDAO->agregarTallaModeloD());
            $idTalla = $this->idModeloTalla($this->id);

            foreach ($t->getColores() as $c) {

                //echo "\n" . $this->corteDAO->agregarColores($idTalla, $c->getId(), $c->getCantidad()) . "\n";
                $this->conexion->ejecutar($this->modeloDAO->agregarColorTallaModeloD($idTalla, $c->getId(), $c->getCantidad()));
            }
        }

        $this->conexion->cerrar();
    }

    function consultarModelo()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->modeloDAO->consultarModelo());


        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            $this->id = $resultado[0];
            $this->nombre = $resultado[1];
        }
        $this->conexion->cerrar();
    }

    function coloresTallaModeloBodega($talla)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->modeloDAO->coloresTallaModeloBodega($talla));
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Color($registro[0], $registro[1]);
            $i++;
        }
        return $resultados;
    }

    function modeloBodegaA()
    {

        $tallas = array();
        $tallasM = array();
        $iT = 0;

        $this->conexion->abrir();
        $this->conexion->ejecutar($this->modeloDAO->tallasModeloBodegaA());
        while (($registro = $this->conexion->extraer()) != null) {
            $tallas[$iT] = $registro[0];
            $iT++;
        }

        foreach ($tallas as $t) {
            $cantidad = $this->modeloTallaBodega($t);

            //$coloresT = array();

            $colores = $this->coloresTallaModeloBodega($t);

            foreach ($colores as $c) {
                $cantidadC = $this->colorTallaModeloBodega($c->getId(), $t);
                $c->setCantidad($cantidadC);
            }

            $talla = new Talla($t, "", "", $cantidad);
            $talla->setColores($colores);
            array_push($tallasM, $talla);
        }

        $this->talla = $tallasM;
    }

    // Los siguientes metodos se utilizan para obtener los atributos privados en un array_column o un metodo de array.

    public function __get($prop)
    {
        return $this->$prop;
    }

    public function __isset($prop): bool
    {
        return isset($this->$prop);
    }
}
