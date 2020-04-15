<?php

if(isset($_POST['idCorte'])){
    
    $corte = new Corte($_POST['idCorte']);
    $corte -> eliminarColores();
    echo $corte -> eliminarCorte();
}