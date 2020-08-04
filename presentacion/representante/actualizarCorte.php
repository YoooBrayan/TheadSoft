<?php 

if(isset($_POST['cTalla'])){

    $corte = new Corte($_POST['corte']);
    $response = $corte -> actualizarTallaCorte($_POST['cTalla'], $_POST['cantidad']);
    if($response != false){
        echo $response;
    }
    
}else if(isset($_POST['cColor'])){

    $corte = new Corte($_POST['corte']);
    echo $corte -> actualizarColorTallaCorte($_POST['talla'], $_POST['cColor'], $_POST['cantidad']);
}