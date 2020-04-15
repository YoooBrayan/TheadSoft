<?php

class AdministradorDAO
{

    private $id, $nombre, $correo, $clave, $usuario;

    function AdministradorDAO($id = "", $nombre = "", $correo = "", $clave = "", $usuario = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->clave = $clave;
    }

    function autenticar()
    {
        return "select administrador_Id from administrador where administrador_correo = '" . $this->correo .  "' and administrador_clave = sha1('" . $this->clave . "') ";
    }

    function consultar()
    {
        return "select administrador_nombre, administrador_correo from administrador where administrador_id = '" . $this->id . "' ";
    }

    function insertar()
    {
        return "insert into administrador(administrador_id, administrador_nombre, administrador_Correo, administrador_Clave) values ('" . $this->id . "', '" . $this->nombre . "', '" . $this->correo . "', sha1('" . $this->clave . "'))";
    }
}
