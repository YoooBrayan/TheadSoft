<?php

session_start();

if(isset($_POST['idM'])){

    $modelo = new ModeloDAO($_POST['idM']);
    $representante = new Representante($_POST['idR']);
    
    foreach($_SESSION['tallas'] as $t){
        $t -> setColores($_SESSION['colores'.$t->getId()]);
    }

    $corteid = new Corte();
    $corte = new Corte($corteid -> idCorteNuevo(), $_POST['fecha_envio'], $_POST['fecha_entrega'], $_POST['observaciones'], "", "", "", "", $_SESSION['tallas'], $_SESSION['colores'], "", "", $_POST['idS']);
    $corte -> setTallas($_SESSION['tallas']);
    $corte -> setRepresentante($representante);
    $corte -> setModelo($modelo);


    if($_POST['idS']!=0){
        $corte -> insertarS();
    }else{
        $corte -> insertar();
    }
    

    $corte -> agregarTallas();

    foreach($_SESSION['tallas'] as $t){
        $_SESSION['colores'.$t->getId()] = "";
        $_SESSION['colores'.$t->getId()] = array();
    }

    $_SESSION['tallas'] = "";
    $_SESSION['tallas'] = array();

    if($corte->consultar()){
        echo true;
    }else{
        echo false;
    }
}

?>