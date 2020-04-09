<?php

$correo = $_POST['correo'];
$clave = $_POST['clave'];

$super = new Super("", "", $correo, $clave);
$administrador = new Administrador("", "", "", $correo, $clave);
$representante = new Representante("", "", $correo, $clave);

if($administrador -> autenticar()){
    $_SESSION['id'] = $administrador -> getId();
    header("Location: index.php?pid=" . base64_encode("presentacion/sesionAdministrador.php"));
}else if($representante -> autenticar()){ 
    $_SESSION['id'] = $representante -> getId();
    header("Location: index.php?pid=" . base64_encode("presentacion/representante/sesionRepresentante.php"));
}else if($super -> autenticar()){
    $_SESSION['id'] = $super -> getId();
    header("Location: index.php?pid=" . base64_encode("presentacion/sesionSuper.php"));
}else{
    echo "Else";
    //header("Location: index.php?pid=" . base64_encode("presentacion/inicio.php") . "&di=true");
}


?>