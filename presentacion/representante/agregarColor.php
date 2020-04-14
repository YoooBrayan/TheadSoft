<?php

session_start();


if (isset($_POST['idCM'])) {
    $color = new color();
    $color->setId($_POST['idCM']);
    $color->setNombre($_POST['colorM']);
    $color->setCantidad($_POST['cantidadCM']);
    $talla = $_POST['idTalla'];

    array_push($_SESSION['colores' . $talla], $color);

    $json = array();

    foreach ($_SESSION['colores' . $talla] as $c) {
        $json[] = array(
            'id' => $c->getId(),
            'nombre' => $c->getNombre(),
            'cantidad' => $c->getCantidad(),
            'talla' => $talla
        );
    }
    echo json_encode($json);
} else if ($_POST['tallaId']) {
    $json = array();
    $cont = 0;

    foreach ($_SESSION['colores' . $_POST['tallaId']] as $c) {
        $cont += $c->getCantidad();
    }

    foreach ($_SESSION['colores' . $_POST['tallaId']] as $c) {
        $json[] = array(
            'id' => $c->getId(),
            'nombre' => $c->getNombre(),
            'cantidad' => $c->getCantidad(),
            'cont' => $cont
        );
    }
    echo json_encode($json);
}
