
<?php

session_start();

if (isset($_POST['cantidadD'])) {

    $modelo = new Modelo($_POST['modelo']);
    $almacen = new Almacen($_SESSION['almacen'], "", $modelo);
    echo $almacen->tallaModeloAlmacen($_POST['talla']);
} else if (isset($_POST['modelo'])) {

    $modelo = new Modelo($_POST['modelo']);

    $almacen = new Almacen($_SESSION['almacen'], "", $modelo);

    echo json_encode($almacen->tallasModeloAlmacenV());
    
} else if (isset($_POST['cantidadT'])) {
    $modelo = new Modelo($_POST['modelo1']);
    $almacen = new Almacen($_SESSION['almacen'], "", $modelo);
    $cantidad = $almacen->tallaModeloAlmacen($_POST['talla']);

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
