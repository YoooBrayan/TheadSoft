<?php

if (isset($_POST['idCorte'])) {

    $corte = new Corte($_POST['idCorte']);
    $respuesta = $corte->pagarCorte();

    if ($respuesta == "Pago Exitoso.") {
        echo 1;
    } else {
        echo 2;
    }
} else if ($_POST['idCortes']) {
    session_start();
    $respuesta = "";
    $json = array();

    unset($_SESSION['cortes'][0]);
    foreach ($_SESSION['cortes'] as $c) {
        $corte = new Corte($c);
        $respuesta = $corte->pagarCorte();
        $json[] = array(
            'id' => $c,
            'respuesta' => $respuesta
        );
    }

    $_SESSION['cortes'] = "";
    $_SESSION['cortes'] = array();
    array_push($_SESSION['cortes'], 0);
    echo json_encode($json);
}
