<?php 

session_start();

if(isset($_POST['colores'])){

    $talla;
    $tallas = array();
    $m = "";

    foreach($_SESSION['tallas'] as $t){
        
        if(count($_SESSION['colores'.$t->getId()])>0){
            $talla = $t->getId();
        }else{
            array_push($tallas, $t);
        }

    }

    foreach($tallas as $t){
        $_SESSION['colores'.$t->getId()] = $_SESSION['colores'.$talla];
        $m .= "\n". $t -> getId() . "\n";
    }

}
