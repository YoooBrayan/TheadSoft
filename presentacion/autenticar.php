<?php

$correo = $_POST['correo'];
$clave = $_POST['clave'];

$super = new Super("", "", $correo, $clave);
$operario = new Operario("", "", $correo, $clave);
$representante = new Representante("", "", $correo, $clave);

if($operario -> autenticar()){  
    $_SESSION['id'] = array('id' => $operario -> getId(), 'satelite' => $operario -> getSatelite() -> getId());
    //$_SESSION['id'] = $operario -> getId();
    $usuario = $operario -> getUsuario();
    if($usuario==3){
        header("Location: index.php?pid=" . base64_encode("presentacion/encargado/sesionEncargado.php"));
    }else{
        header("Location: index.php?pid=" . base64_encode("presentacion/encargado/sesionOperario.php"));
    }
    //$_SESSION['m'] += "Entro<br>";
    //header("Location: index.php?pid=" . base64_encode("presentacion/sesionAdministrador.php"));
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