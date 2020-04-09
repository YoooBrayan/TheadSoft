<?php 

session_start();

if(isset($_POST['idT'])){
    $talla = new Talla();
    $talla -> setId($_POST['idT']);
    $talla -> setCantidad($_POST['cantidadT']);

    array_push($_SESSION['tallas'], $talla);
    $_SESSION['colores'.$idT] = array();    

    $json = array();
    foreach($_SESSION['tallas'] as $t){
        $json[] = array(
            'id' => $t -> getId(),
            'cantidad' => $t -> getCantidad()
        );
    }

    echo json_encode($json);

}

?>