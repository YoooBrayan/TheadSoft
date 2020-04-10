<?php 

session_start();


if(isset($_POST['idCM'])){
    $color = new color();
    $color -> setId($_POST['idCM']);
    $color -> setNombre($_POST['colorM']);
    $color -> setCantidad($_POST['cantidadCM']);
    $talla = $_POST['idTalla'];

    array_push($_SESSION['colores'.$talla], $color);

    $json = array();
    foreach($_SESSION['colores'.$talla] as $c){
        $json[] = array(
            'id' => $c -> getId(),
            'nombre' => $c -> getNombre(),
            'cantidad' => $c -> getCantidad()
        );
    }

    echo json_encode($json);

}

?>