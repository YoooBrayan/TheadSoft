<?php 

class OperarioDAO{

    private $id, $nombre, $correo, $clave, $usuario, $satelite;
    private $tareas = array();

    function OperarioDAO($id="", $nombre="", $correo="", $clave="", $usuario="", $tareas="", $satelite=""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->satelite = $satelite;
        $this -> tareas = new Tarea();
    }

    function autenticar()
    {
        return "select operario_Id, operario_usuario, operario_satelite from operario where operario_correo = '" . $this->correo .  "' and operario_clave = sha1('" . $this->clave . "') ";
    }

    function consultar()
    {
        return "select operario_nombre, operario_correo from operario where operario_id = '" . $this->id . "' ";
    }

    function consultarTodos($satelite){
        return "select * from Operarios where operario_satelite = '". $satelite ."'";
    }

    function insertar()
    {
        return "insert into operario(administrador_id, administrador_nombre, administrador_Correo, administrador_Clave) values ('" . $this->id . "', '" . $this->nombre . "', '" . $this->correo . "', sha1('" . $this->clave . "'))";
    }

    function asignarTareas($corte){
        return "call asignarTarea('". $this->tareas-> getId() ."', '". $this->tareas->getCantidad() ."', '". $corte ."', '". $this->id ."')";
    }

    function tareas($corte){
        return "call tareasOperario('". $corte ."', '". $this->id ."')";
    }

    function tareasNomina($corte){
        return "call tareasOperarioNomina('". $corte ."', '". $this->id ."')";
    }

    function setTareas($tareas){
        $this->tareas = $tareas;
    }

    function getTareas(){
        return $this->tareas;
    }

    function pagoNeto($corte){
        return "select pagoNeto('". $this->id ."', '". $corte ."')";
    }

    function listasocios(){
        return "select operario_id, operario_nombre from operario where operario_usuario = 3";
    }
}
