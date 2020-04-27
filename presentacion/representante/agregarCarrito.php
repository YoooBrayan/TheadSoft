<?php

if (isset($_POST['idModelo'])) {

    session_start();


    $modelo = new Modelo($_POST['idModelo'], $_POST['modelo']);

    foreach ($_SESSION['tallas'] as $t) {
        $t->setColores($_SESSION['colores' . $t->getId()]);
    }

    $modelo->setTalla($_SESSION['tallas']);

    array_push($_SESSION['carrito'], $modelo);

    /*$cont = count($_SESSION['carrito']);
    $cont++;

    $datos = array(
        'cantidad' => $cont
    );

    array_push($_SESSION['carrito'], $datos);*/
    foreach ($_SESSION['tallas'] as $t) {
        $_SESSION['colores' . $t->getId()] = "";
        $_SESSION['colores' . $t->getId()] = array();
    }

    $_SESSION['tallas'] = "";
    $_SESSION['tallas'] = array();


    echo count($_SESSION['carrito']);
}
