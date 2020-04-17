<?php

session_start();

if(isset($_POST['idCorte'])){

    $icon = "";
    $indice = array_search($_POST['idCorte'], $_SESSION['cortes']);
    if(!$indice){
        array_push($_SESSION['cortes'], $_POST['idCorte']);
        $icon = "far fa-check-square";
    }else{
        unset($_SESSION['cortes'][$indice]);
        $icon = "far fa-square";
    }

    $json = array();
    foreach($_SESSION['cortes'] as $c){
        $json[] = array(
            'icon' => $icon,
            'count' => count($_SESSION['cortes'])
        );
    }

    echo json_encode($json);
}