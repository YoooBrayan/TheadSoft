<?php

session_start();

require 'logica/Persona.php';
require_once 'logica/Corte.php';
require_once "logica/administrador.php";
require_once "logica/representante.php";
require_once 'logica/Modelo.php';
require_once 'logica/Talla.php';
require_once 'logica/Color.php';
require_once 'logica/Super.php';
require_once 'logica/Operario.php';
require_once 'logica/Tarea.php';
require_once 'logica/Operacion.php';
require_once 'logica/Almacen.php';
require_once 'logica/Venta.php';
require_once 'logica/Insumo.php';
require_once 'logica/Satelite.php';
require_once ('librerias/fpdf/fpdf.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="presentacion/representante/estilos.css" rel="stylesheet" type="text/css" />

    <!--Librerias-->

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>

    <!-- BootStrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

    <!--Select BootStrap-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <!-- ToolTip -->
    <script type="text/javascript">
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>


    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- Summernote -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>

<!--------------------------------------------------------------->
    
</head>

<body>

    <?php

    if (isset($_GET['pid']) && $_GET['pid']!='prueba') {
        $pid = base64_decode($_GET['pid']);
        if (isset($_GET['nos']) || (!isset($_GET['nos']) && $_SESSION['id'] != "")) {
            include $pid;
        } else {
            header("Location: index.php?ns=true");
        }
    } else {
        $_SESSION['id'] = "";
        if(isset($_GET['ns'])){
            include 'presentacion/inicio.php';
        }else{
            include 'presentacion/inicio.php';
        }
        
    }

    ?>


</body>

</html>