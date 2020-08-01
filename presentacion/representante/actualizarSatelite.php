<?php 

if(isset($_POST['idS'])){

    $corte = new Corte($_POST['idC']);
    $corte -> actualizarSatelite($_POST['idS']);
    echo true;

}
