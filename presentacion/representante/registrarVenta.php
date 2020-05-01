<?php

session_start();

if (isset($_POST['venta'])) {

    $venta = new Venta();
    $venta -> registrar();

    $idVenta = $venta -> idVenta();

    foreach($_SESSION['carrito'] as $m){

        $idModeloAlmacen = $venta -> idModeloAlmacen($m -> getId(), $_SESSION['almacen']);

        $venta -> registrarModeloVenta($idModeloAlmacen, $idVenta);

        $idModeloVenta = $venta -> idModeloVenta();
        foreach($m -> geTtalla() as $t){
            $venta -> registrarModeloTalla($idModeloVenta, $t -> getId());
            $idModeloVentaTalla = $venta -> idModeloVentaTalla();

            foreach($t -> getColores() as $c){
                $venta -> ventaTallaColor($idModeloVentaTalla, $c -> getId(), $c -> getCantidad());
            }
        }
        
    }

    $_SESSION['carrito'] = "";

    echo true;

    /*
    $almacen = new Almacen($_POST['idAlmacen'], "", $_POST['idM']);
    $idModeloD = $almacen->idModeloDistribuido();
    $almacen->distribuirModelo($idModeloD);
    $almacen->distribuirAlmacen($idModeloD);

    foreach ($_SESSION['tallas'] as $t) {
        $t->setColores($_SESSION['colores' . $t->getId()]);
    }


    $modelo = new Modelo($idModeloD);
    $modelo->setTalla($_SESSION['tallas']);
    $modelo->agregarTallaModeloD();


    foreach ($_SESSION['tallas'] as $t) {
        $_SESSION['colores' . $t->getId()] = "";
        $_SESSION['colores' . $t->getId()] = array();
    }

    $_SESSION['tallas'] = "";
    $_SESSION['tallas'] = array();

    echo true;
    */
}

