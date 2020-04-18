<?php

session_start();

$respuesta = "";
$json = array();

unset($_SESSION['cortes'][0]);
foreach ($_SESSION['cortes'] as $c) {
    $corte = new Corte($c);
    $respuesta = $corte->removerPago();
    $json[] = array(
        'id' => $c,
        'respuesta' => $respuesta
    );
}

$_SESSION['cortes'] = "";
$_SESSION['cortes'] = array();
array_push($_SESSION['cortes'], 0);

echo json_encode($json);
