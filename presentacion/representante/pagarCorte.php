<?php 

if(isset($_POST['idCorte'])){

    $corte = new Corte($_POST['idCorte']);
    $respuesta = $corte -> pagarCorte();

    if($respuesta == "Pago Exitoso."){
        echo 1;
    }else{
        echo 2;
    }
}