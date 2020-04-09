<?php

session_start();

if(isset($_POST['idM'])){

    $modelo = new ModeloDAO($_POST['idM']);
    $representante = new Representante($_POST['idR']);
    
    foreach($_SESSION['tallas'] as $t){
        $t -> setColores($_SESSION['colores'+$->getId()]);
    }

    $corteid = new Corte();
    $corte = new Corte($corteid -> idCorteNuevo(), $_POST['fecha_envio'], $_POST['fecha_entrega'], $_POST['observaciones'], "", "", "", "", $_SESSION['tallas'], $_SESSION['colores']);
    $corte -> setRepresentante($representante);
    $corte -> setModelo($modelo);


    $corte -> insertar();
    $corte -> agregarTallas();
    $corte -> agregarColores();    

    if($corte->consultar()){
        echo true;
    }else{
        echo false;
    }
}

?>