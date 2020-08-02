<?php

require_once 'persistencia/Conexion.php';
require_once 'persistencia/CorteDAO.php';

class Corte
{

    private $id;
    private $fecha_envio;
    private $fecha_entrega;
    private $observaciones;
    private $representante;
    private $modelo;
    private $estado;
    private $tareas = array();
    private $tallas = array();
    private $colores = array();
    private $conexion;
    private $corteDAO;
    private $cantidad;
    private $pago;
    private $satelite;

    function Corte($id = "", $fecha_envio = "", $fecha_entrega = "", $observaciones = "", $representante = "", $modelo = "", $estado = "", $tareas = "", $tallas = "", $colores = "", $cantidad = "", $pago = "", $satelite = "")
    {

        $this->id = $id;
        $this->fecha_envio = $fecha_envio;
        $this->fecha_entrega = $fecha_entrega;
        $this->observaciones = $observaciones;
        $this->conexion = new Conexion();
        $this->corteDAO = new CorteDAO($id, $fecha_envio, $fecha_entrega, $observaciones, $representante, $modelo, "", "", $tallas, "", $satelite);
        $this->representante = new Representante();
        $this->modelo = $modelo;
        $this->tallas = array();
        $this->colores = $colores;
        $this->cantidad = $cantidad;
        $this->pago = $pago;
        $this->estado = $estado;
        $this->satelite = $satelite;
    }

    function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function getFecha_Envio()
    {
        return $this->fecha_envio;
    }

    function setFecha_Envio($fecha_envio)
    {
        $this->fecha_envio = $fecha_envio;
    }

    function getFecha_Entrega()
    {
        return $this->fecha_entrega;
    }

    function setFecha_Entrega($fecha_entrega)
    {
        $this->fecha_entrega = $fecha_entrega;
    }

    function getObservaciones()
    {
        return $this->observaciones;
    }

    function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    }

    function getRepresentante()
    {
        return $this->representante;
    }

    function setRepresentante($representante)
    {
        $this->representante = $representante;
        $this->corteDAO->setRepresentante($this->representante);
    }

    function getModelo()
    {
        return $this->modelo;
    }

    function setModelo($modelo)
    {
        $this->modelo = $modelo;
        $this->corteDAO->setModelo($modelo);
    }

    function getEstado()
    {
        return $this->estado;
    }

    function setEstado($estado)
    {
        $this->estado = $estado;
    }

    function getTarea()
    {
        return $this->tareas;
    }

    function setTarea($tarea)
    {
        $this->tareas = $tarea;
    }

    function getTallas()
    {
        return $this->tallas;
    }

    function setTallas($tallas)
    {
        $this->tallas = $tallas;
    }

    function getColores()
    {
        return $this->colores;
    }

    function setColores($colores)
    {
        $this->colores = $colores;
    }

    function getPago()
    {
        return $this->pago;
    }

    function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
        $this->corteDAO->setCantidad($cantidad);
    }

    function idCorteNuevo()
    {
        $this->conexion->abrir();
        //echo "<br>" . $this->corteDAO->idCorteNuevo() . "<br>"; 
        $this->conexion->ejecutar($this->corteDAO->idCorteNuevo());

        $resultado = $this->conexion->extraer();
        $this->conexion->cerrar();
        return $resultado[0];
    }

    function idTallaCorte($corte, $talla)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->corteDAO->idTallaCorte($corte, $talla));
        $resultado = $this->conexion->extraer();
        //$this -> conexion -> cerrar();
        return $resultado[0];
    }

    function insertarS()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->corteDAO->insertarS());
        $this->conexion->cerrar();
    }

    function insertar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->corteDAO->insertar());
        $this->conexion->cerrar();
    }

    function eliminarTalla($talla)
    {
        $this->conexion->abrir();
        //echo "<br>" . $this->corteDAO->insertar() . "<br>";
        $this->conexion->ejecutar($this->corteDAO->eliminarTalla($talla));
        $this->conexion->cerrar();
    }

    function agregarTallas()
    {
        $this->conexion->abrir();

        foreach ($this->tallas as $t) {
            $this->corteDAO->setTallas($t);
            //echo "\n" . $this->corteDAO->agregarTallas() . "\n";
            $this->conexion->ejecutar($this->corteDAO->agregarTallas());
            $idTalla = $this->idTallaCorte($this->id, $t->getId());

            //echo "<\n Cantidad: " . count($t->getColores());

            foreach ($t->getColores() as $c) {

                //echo "\n" . $this->corteDAO->agregarColores($idTalla, $c->getId(), $c->getCantidad()) . "\n";
                $this->conexion->ejecutar($this->corteDAO->agregarColores($idTalla, $c->getId(), $c->getCantidad()));
            }
        }

        $this->conexion->cerrar();
    }

    function consultar()
    {
        $this->conexion->abrir();
        //echo "\n" . $this -> corteDAO -> consultar() . "\n";
        $this->conexion->ejecutar($this->corteDAO->consultar());
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            $this->id = $resultado[0];
            $this->conexion->cerrar();
            return true;
        } else {
            $this->conexion->cerrar();
            return false;
        }
    }

    function cortesPorEntregar($satelite)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->corteDAO->cortesPorEntregar($satelite));
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $modelo = new Modelo("", $registro[1]);
            $resultados[$i] = new Corte($registro[0], $registro[2], "", "", "", $modelo, "", "", "", "", $registro[3]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }

    function cortesPorEntregarR()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->corteDAO->cortesPorEntregarR());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $modelo = new Modelo("", $registro[2]);
            $resultados[$i] = new Corte($registro[1], $registro[3], "", "", "", $modelo, "", "", "", "", $registro[4], "", $registro[0]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }

    function consultarCorte()
    {
        $this->conexion->abrir();
        //echo "\n" . $this -> corteDAO -> consultar() . "\n";
        $this->conexion->ejecutar($this->corteDAO->consultarCorte());
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            $modelo = new Modelo("", $resultado[1]);
            $this->id = $resultado[0];
            $this->fecha_envio = $resultado[2];
            $this->fecha_entrega = $resultado[3];
            $this->observaciones = $resultado[4];
            $this->cantidad = $resultado[5];
            $this->corteDAO->setCantidad($resultado[5]);
            $this->setModelo($modelo);
            $this->conexion->cerrar();
        } else {
            $this->conexion->cerrar();
        }
    }

    function tallas($corte)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->corteDAO->tallas($corte));
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $talla = new Talla($registro[0], "", "", $registro[1]);
            array_push($this->tallas, $talla);
        }
        $this->conexion->cerrar();
    }

    function consultarTareas()
    {
        $this->conexion->abrir();
        //echo $this->corteDAO->consultarTareas();
        $this->conexion->ejecutar($this->corteDAO->consultarTareas());
        while (($registro = $this->conexion->extraer()) != null) {
            $operacion = new Operacion("", "", $registro[1]);
            $tarea = new Tarea($registro[0], $operacion);
            array_push($this->tareas, $tarea);
        }
        $this->conexion->cerrar();
    }


    function getCantidad()
    {
        return $this->cantidad;
    }

    function getSatelite()
    {
        return $this->satelite;
    }

    function eliminarColores()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->corteDAO->coloresAEliminar());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = $registro[0];
            $i++;
        }

        foreach ($resultados as $r) {
            $this->conexion->ejecutar($this->corteDAO->eliminarColor($r));
        }

        $this->conexion->cerrar();
        return $resultados;
    }

    function eliminarCorte()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->corteDAO->eliminarCorte());
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            $this->conexion->cerrar();
            return $resultado[0];
        } else {
            $this->conexion->cerrar();
        }
        $this->conexion->cerrar();
    }

    function entregarCorte()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->corteDAO->entregarCorte());
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            $this->conexion->cerrar();
            return $resultado[0];
        } else {
            $this->conexion->cerrar();
        }
    }

    function cantidad()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->corteDAO->cantidad());
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            $this->corteDAO->setCantidad($resultado[0]);
            $this->cantidad = $resultado[0];
            $this->conexion->cerrar();
        } else {
            $this->conexion->cerrar();
        }
    }

    function cortesEntregadosCompletos($satelite)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->corteDAO->cortesEntregadosCompletos($satelite));
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $modelo = new Modelo("", $registro[1]);
            $resultados[$i] = new Corte($registro[0], "", $registro[3], "", "", $modelo, $registro[4], "", "", "", $registro[2], $registro[5]);
            $i++;
        }
        return $resultados;
        $this->conexion->cerrar();
    }

    function cortesEntregadosPendientes($satelite)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->corteDAO->cortesEntregadosPendientes($satelite));
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $modelo = new Modelo("", $registro[1]);
            $resultados[$i] = new Corte($registro[0], "", $registro[3], "", "", $modelo, $registro[4], "", "", "", $registro[2], $registro[5]);
            $i++;
        }
        return $resultados;
        $this->conexion->cerrar();
    }

    function cortesEntregadosCompletosR()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->corteDAO->cortesEntregadosCompletosR());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $modelo = new Modelo("", $registro[2]);
            $resultados[$i] = new Corte($registro[1], "", $registro[4], "", "", $modelo, $registro[5], "", "", "", $registro[3], $registro[6], $registro[0]);
            $i++;
        }
        return $resultados;
        $this->conexion->cerrar();
    }

    function cortesEntregadosPendientesR()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->corteDAO->cortesEntregadosPendientesR());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $modelo = new Modelo("", $registro[2]);
            $resultados[$i] = new Corte($registro[1], "", $registro[4], "", "", $modelo, $registro[5], "", "", "", $registro[3], $registro[6], $registro[0]);
            $i++;
        }
        return $resultados;
        $this->conexion->cerrar();
    }

    function pagarCorte()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->corteDAO->pagarCorte());
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            $this->conexion->cerrar();
            return $resultado[0];
        } else {
            $this->conexion->cerrar();
        }
    }

    function removerPago()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->corteDAO->removerPago());
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            $this->conexion->cerrar();
            return $resultado[0];
        } else {
            $this->conexion->cerrar();
        }
    }


    function consultarCortes($satelite)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->corteDAO->consultarCortes($satelite));
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $modelo = new Modelo("", $registro[1]);
            $resultados[$i] = new Corte($registro[0], $registro[2], "", "", "", $modelo, "", "", "", "", $registro[3]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }

    function operariosNomina()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->corteDAO->operariosNomina());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Operario($registro[0], $registro[1]);
            $i++;
        }
        return $resultados;
        $this->conexion->cerrar();
    }

    function actualizarSatelite($satelite)
    {

        $this->conexion->abrir();
        $this->conexion->ejecutar($this->corteDAO->actualizarSatelite($satelite));
        $this->conexion->cerrar();
    }

    function actualizarTallaCorte($talla, $cantidad)
    {

        $this->conexion->abrir();
        $response = $this->conexion->ejecutar($this->corteDAO->actualizarTallaCorte($talla, $cantidad));
        if ($response) {
            $this->conexion->ejecutar($this->corteDAO->cantidad());
            if ($this->conexion->numFilas() == 1) {
                $cantidad = $this->conexion->extraer();
                $this->conexion->cerrar();
                return $cantidad[0];
            }
        }
        $this->conexion->cerrar();
        return $response;
    }

    function actualizarColorTallaCorte($talla, $color, $cantidad)
    {

        $this->conexion->abrir();
        $this->conexion->ejecutar($this->corteDAO->obtenerIdColorTalla($talla, $color));
        if ($this->conexion->numFilas() == 1) {
            $id = $this->conexion->extraer();
            $response = $this->conexion->ejecutar($this->corteDAO->actualizarColorTallaCorte($id[0], $cantidad));
            $this->conexion->cerrar();
            return $response;
        } else {
            $this->conexion->cerrar();
            return false;
        }
    }
}
