<?php

if (isset($_POST['idCorte'])) {

    $corte = new Corte($_POST['idCorte']);
    $corte->cantidad();
    $respueta = $corte->entregarCorte();
    if($respueta == 'Registro Exitoso...'){
        echo 1;
    }else if($respueta == 'Corte ya Entregado...'){
        echo 2;
    }else{
        echo 0;
    }
} 
