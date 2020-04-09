<?php 

session_start();

if(isset($_POST['talla'])){

    $talla = $_POST['talla'];
    $tallas = $_SESSION['tallas'];

    $ids = array_column($_SESSION['tallas'], 'id');
    $indice = array_search($talla, $ids);
    unset($_SESSION['tallas'][$indice]);
    $tallas = array_values($_SESSION['tallas']);
    unset($_SESSION['tallas']);
    $_SESSION['tallas'] = $tallas;

    $json = array();
    foreach($_SESSION['tallas'] as $t){
        $json[] = array(
            'id' => $t -> getId(),
            'cantidad' => $t -> getCantidad()
        );
    }
    echo json_encode($json);

    //echo json_encode($_SESSION);

    //echo count($ids);
    //echo "Talla: " .  $talla .  " Indice: " . $indice;
}

