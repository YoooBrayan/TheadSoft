<?php 


if(isset($_POST['cTalla'])){

    $corte = new Corte($_POST['corte']);
    echo $response = $corte -> actualizarTallaCorte($_POST['cTalla'], $_POST['cantidad']);
    
}else if(isset($_POST['cColor'])){

    $corte = new Corte($_POST['corte']);
    echo $corte -> actualizarColorTallaCorte($_POST['talla'], $_POST['cColor'], $_POST['cantidad']);
}