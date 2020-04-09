<?php 

session_start();

if(isset($_POST['color'])){

    $talla = $_POST['color'];
    $tallas = $_SESSION['colores'];

    $ids = array_column($_SESSION['colores'], 'id');
    $indice = array_search($color, $ids);
    unset($_SESSION['colores'][$indice]);
    $colores = array_values($_SESSION['colores']);
    unset($_SESSION['colores']);
    $_SESSION['colores'] = $colores;

    $json = array();
    foreach($_SESSION['colores'] as $c){
        $json[] = array(
            'id' => $c -> getId(),
            'nombre' => $c -> getNombre(),
            'cantidad' => $c -> getCantidad()
        );
    }
    echo json_encode($json);

    //echo json_encode($_SESSION);

    //echo count($ids);
    //echo "Talla: " .  $talla .  " Indice: " . $indice;
}

