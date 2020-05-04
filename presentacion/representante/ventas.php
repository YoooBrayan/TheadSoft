<?php 

session_start();

if(isset($_POST['fechaInicio'])){

    $almacen = new Almacen($_SESSION['almacen']);
    $almacen -> ventas($_POST['fechaInicio'], $_POST['fechaFinal']);
    $total = $almacen -> ventasAlmacen($_POST['fechaInicio'], $_POST['fechaFinal']);

    $json = array();

    foreach($almacen -> getVentas() as $v){

        $modelos = array();

        foreach($v -> getModelos() as $m){
            $modelos[] = array(
                'id' => $m -> getId(),
                'nombre' => $m -> getNombre()
            );
        }

        $json[] = array(
            'id' => $v -> getId(),
            'fecha' => $v -> getFecha(),
            'cantidad' => $v -> getCantidad(),
            'modelo' => $modelos,
            'valor' => $v -> getValor(),
            'total' => $total
        ); 
    }


    echo json_encode($json);



    /*

    foreach($almacen -> getVentas() as $v){
        echo "\n".$v -> getId();
        foreach($v -> getModelos() as $m){
            echo "\n".$m;
        }
    }

    */


}