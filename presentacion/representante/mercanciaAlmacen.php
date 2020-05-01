<?php

session_start();

if(isset($_POST['almacen'])){
    
    $almacen = new Almacen($_POST['almacen']);
    $mercancia = $almacen -> modelosMercancia();
    $_SESSION['almacen'] = $_POST['almacen'];

    echo json_encode($mercancia);
}else if(isset($_POST['modelo'])){

    $almacen = new Almacen($_SESSION['almacen']);
    $mercancia = $almacen -> modeloMercanciaAlmacen($_POST['modelo']);

    echo json_encode($mercancia);

}

?>