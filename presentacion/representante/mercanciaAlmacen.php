<?php

if(isset($_POST['almacen'])){

    $almacen = new Almacen($_POST['almacen']);
    $mercancia = $almacen -> modelosMercancia();

    echo json_encode($mercancia);
}

?>