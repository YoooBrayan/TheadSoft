<?php 

if(isset($_POST['modelo'])){

    $modelo = new Modelo($_POST['modelo']);
    echo json_encode($modelo -> modeloBodega());

}