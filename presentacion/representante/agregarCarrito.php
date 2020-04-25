<?php 

if(isset($_POST['id'])){

    session_start();

    $cont = count($_SESSION['carrito']);
    $cont++;

    $datos = array(
        'cantidad' => $cont
    );

    array_push($_SESSION['carrito'], $datos);

    echo count($_SESSION['carrito']);

}