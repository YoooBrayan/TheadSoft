<?php

session_start();

if(isset($_POST['idM'])){

    $modelo = new ModeloDAO($_POST['idM']);
    $representante = new Representante($_POST['idR']);
    
    $corteid = new Corte();
    $corte = new Corte($corteid -> idCorteNuevo(), $_POST['fecha_envio'], $_POST['fecha_entrega'], $_POST['observaciones'], "", "", "", "", $_SESSION['tallas']);
    $corte -> setRepresentante($representante);
    $corte -> setModelo($modelo);


    $corte -> insertar();
    $corte -> agregarTalla();

    if($corte->consultar()){
        echo true;
    }else{
        echo false;
    }
}

?>