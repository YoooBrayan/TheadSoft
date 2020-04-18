<?php

if (isset($_POST['idCorte'])) {

    $respuesta = "";
    $bool = true;

    $corte = new Corte($_POST['idCorte']);
    $corte->cantidad();
    if(isset($_POST['cantidad'])){
        if($_POST['cantidad']>$corte->getCantidad()){
            $bool = false;
        }else{
            $corte->setCantidad($_POST['cantidad']);
            $respuesta = $corte->entregarCorte();
        }
        
    }else{
        $corte->cantidad();
        $respuesta = $corte->entregarCorte();
    }

    if($respuesta == 'Registro Exitoso...' && $bool){
        echo 1;
    }else if($respuesta == 'Corte ya Entregado...' && $bool){
        echo 2;
    }else if($respuesta == 'Corte ya Pendiente...'){
        echo 3;
    }else if(!$bool){
        echo 4;
    }else{
        echo 0;
    }
}else if($_POST['idCortes']){
    session_start();
    unset($_SESSION['cortes'][0]);
    $json = array();

    foreach($_SESSION['cortes'] as $c){
        $corte = new Corte($c);
        $corte->cantidad();
        $respuesta = $corte->entregarCorte();
        $json[] = array(
            'id' => $c
        );
    }
    $_SESSION['cortes'] = "";
    $_SESSION['cortes'] = array();
    array_push($_SESSION['cortes'], 0);
    
    echo json_encode($json);
    
}
