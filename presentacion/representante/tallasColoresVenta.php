
<?php

session_start();

if (isset($_POST['cantidadD'])) {

    $almacen = new Almacen($_SESSION['almacen']);
    echo $almacen->tallasModelo($_POST['modelo'], $_POST['talla']);
} else if (isset($_POST['modelo'])) {

    $modelo = new Modelo($_POST['modelo']);

    $almacen = new Almacen($_SESSION['almacen'], "", $modelo);

    echo json_encode($almacen->tallaModeloAlmacen());
    
} else if (isset($_POST['cantidadT'])) {
    $almacen = new Almacen($_SESSION['almacen']);
    $cantidad = $almacen->tallasModelo($_POST['modelo1'], $_POST['talla']);

    if ($_POST['cantidadT'] <= $cantidad) {
        echo 1;
    } else {
        echo 0;
    }
} else if (isset($_POST['cantidadDC'])) {

    $modelo = new Modelo($_POST['modeloV']);
    $almacen = new Almacen($_SESSION['almacen'], "", $modelo);

    echo $almacen->colorTallaModeloAlmacen($_POST['talla'], $_POST['color']);
} else if (isset($_POST['cantidadC'])) {

    $modelo = new Modelo($_POST['modeloV']);
    $almacen = new Almacen($_SESSION['almacen'], "", $modelo);

    $cantidad = $almacen->colorTallaModeloAlmacen($_POST['talla'], $_POST['color']);

    if ($_POST['cantidadC'] <= $cantidad) {
        echo 1;
    } else {
        echo 0;
    }
}
