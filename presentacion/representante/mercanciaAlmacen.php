<?php

if(isset($_POST['almacen'])){

    session_start();
    $almacen = new Almacen($_POST['almacen']);
    $mercancia = $almacen -> modelosMercancia();
    $_SESSION['almacen'] = $_POST['almacen'];

    echo json_encode($mercancia);
}

?>