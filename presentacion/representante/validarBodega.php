<?php

if (isset($_POST['cantidadT'])) {

    $modelo = new Modelo($_POST['modelo']);

    $cantitad = $modelo->modeloTallaBodega($_POST['talla']);

    //$b = 1;

    if ($_POST['cantidadT'] <= $cantitad) {
        //$b = 1;
        echo 1;
    } else {
        //$b = 0;
        echo 0;
    }

    /*$json = array(
        'cantidadBodega' => $cantitad,
        'cantidadE' => $_POST['cantidadT'],
        'b' => $b
    );

    echo json_encode($json);*/
} else if (isset($_POST['cantidadD'])) {

    $modelo = new Modelo($_POST['modelo']);
    echo $modelo->modeloTallaBodega($_POST['talla']);
} else if (isset($_POST['cantidadDC'])) {
    $modelo = new Modelo($_POST['modelo']);
    echo $modelo->colorTallaModeloBodega($_POST['color'], $_POST['talla']);
} else if (isset($_POST['cantidadC'])) {

    $modelo = new Modelo($_POST['modelo']);
    $cantidad = $modelo->colorTallaModeloBodega($_POST['color'], $_POST['talla']);

    if ($_POST['cantidadC'] <= $cantidad) {
        //$b = 1;
        echo 1;
    } else {
        //$b = 0;
        echo 0;
    }
}
