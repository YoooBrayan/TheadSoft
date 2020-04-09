<?php

require 'logica/Persona.php';
require_once 'logica/Corte.php';
require_once "logica/administrador.php";
require_once "logica/representante.php";
require_once 'logica/Modelo.php';
require_once 'logica/Talla.php';
require_once 'logica/Color.php';
require_once 'logica/Super.php';

if (isset($_GET["pid"])) {

    $pid = base64_decode($_GET["pid"]);
    include $pid;
    
    }
?>    
