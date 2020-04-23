<?php

session_start();

if (isset($_POST['idM'])) {

    $almacen = new Almacen($_POST['idAlmacen'], "", $_POST['idM']);
    $idModeloD = $almacen->idModeloDistribuido();
    $almacen->distribuirModelo($idModeloD);
    $almacen->distribuirAlmacen($idModeloD);

    foreach ($_SESSION['tallas'] as $t) {
        $t->setColores($_SESSION['colores' . $t->getId()]);
    }


    $modelo = new Modelo($idModeloD);
    $modelo->setTalla($_SESSION['tallas']);
    $modelo->agregarTallaModeloD();


    foreach ($_SESSION['tallas'] as $t) {
        $_SESSION['colores' . $t->getId()] = "";
        $_SESSION['colores' . $t->getId()] = array();
    }

    $_SESSION['tallas'] = "";
    $_SESSION['tallas'] = array();

    echo true;
}
