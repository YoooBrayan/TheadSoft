<?php

require_once 'persistencia/Conexion.php';
require_once 'persistencia/OperarioDAO.php';

class Operario extends Persona
{

    private $tareas = array();
    private $conexion;
    private $operarioDAO;

    function Operario($id = "", $nombre = "", $correo = "", $clave = "", $usuario = "", $tareas = "")
    {
        $this->Persona($id, $nombre, $correo, $clave, $usuario);
        $this->conexion = new Conexion();
        $this->tareas = array();
        $this->operarioDAO = new OperarioDAO($id, $nombre, $correo, $clave, $usuario, $tareas);
    }

    function autenticar()
    {
        $this->conexion->abrir();
        echo $this->operarioDAO->autenticar();
        $this->conexion->ejecutar($this->operarioDAO->autenticar());
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            $this->id = $resultado[0];
            $this->usuario = $resultado[1];
            $this->conexion->cerrar();
            return true;
        } else {
            $this->conexion->cerrar();
            return false;
        }
    }

    function consultar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->operarioDAO->consultar());
        $resultado = $this->conexion->extraer();
        $this->nombre = $resultado[0];
        $this->correo = $resultado[1];
        $this->conexion->cerrar();
    }

    function consultarTodos()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->operarioDAO->consultarTodos());
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $resultados[$i] = new Operario($registro[0], $registro[1], $registro[2]);
            $i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }

    function asignarTareas($corte)
    {
        $this->conexion->abrir();
        //echo $this->operarioDAO->asignarTareas($corte);
        $this->conexion->ejecutar($this->operarioDAO->asignarTareas($corte));
        if ($this->conexion->numFilas() == 1) {
            $resultado = $this->conexion->extraer();
            $this->conexion->cerrar();
            return $resultado[0];
        } else {
            $this->conexion->cerrar();
            return false;
        }
    }

    function tareas($corte)
    {
        $this->conexion->abrir();
        //echo $this->operarioDAO->tareas($corte);
        $this->conexion->ejecutar($this->operarioDAO->tareas($corte));
        $resultados = array();
        $i = 0;
        while (($registro = $this->conexion->extraer()) != null) {
            $operacion = new Operacion("", $registro[3], $registro[1]);
            $tarea = new Tarea($registro[0], $operacion, $registro[2]);
            array_push($this->tareas, $tarea);
            //$resultados[$i] = new Operario($registro[0], $registro[1], $registro[2]);
            //$i++;
        }
        $this->conexion->cerrar();
        return $resultados;
    }

    function setTareas($tareas){
        $this->tareas = $tareas;
        $this->operarioDAO->setTareas($tareas);
    }

    function getTarea(){
        return $this->tareas;
    }
}
