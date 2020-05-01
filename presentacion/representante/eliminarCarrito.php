<?php

session_start();

if (isset($_POST['id'])) {

    $modeloC = new Modelo($_POST['id']);
    $modeloC -> consultarModelo();
    
    $modelo = $_POST['id'];
    //$colores = $_SESSION['colores'.$_POST['talla']];

    $ids = array_column($_SESSION['carrito'], 'id');
    $indice = array_search($modelo, $ids);
    unset($_SESSION['carrito'][$indice]);
    $modelos = array_values($_SESSION['carrito']);
    unset($_SESSION['carrito']);
    $_SESSION['carrito'] = $modelos;

    $json = array(
        'id' => $modeloC -> getId(),
        'modelo' => $modeloC -> getNombre(),
        'cantidad' => count($_SESSION['carrito'])
    );

    echo json_encode($json);

}
