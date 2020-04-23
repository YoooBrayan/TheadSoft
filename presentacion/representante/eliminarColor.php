<?php

session_start();

if (isset($_POST['color'])) {

    $color = $_POST['color'];
    //$colores = $_SESSION['colores'.$_POST['talla']];

    $ids = array_column($_SESSION['colores' . $_POST['talla']], 'id');
    $indice = array_search($color, $ids);
    unset($_SESSION['colores' . $_POST['talla']][$indice]);
    $colores = array_values($_SESSION['colores' . $_POST['talla']]);
    unset($_SESSION['colores' . $_POST['talla']]);
    $_SESSION['colores' . $_POST['talla']] = $colores;

    $json = array();
    foreach ($_SESSION['colores' . $_POST['talla']] as $c) {
        $json[] = array(
            'id' => $c->getId(),
            'nombre' => $c->getNombre(),
            'cantidad' => $c->getCantidad()
        );
    }
    echo json_encode($json);

    //echo json_encode($_SESSION);

    //echo count($ids);
    //echo "Talla: " .  $talla .  " Indice: " . $indice;
}
