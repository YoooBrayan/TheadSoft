<?php 


if(isset($_POST['talla'])){

    $corte = new Corte($_POST['corte']);
    echo $response = $corte -> actualizarTallaCorte($_POST['talla'], $_POST['cantidad']);
}