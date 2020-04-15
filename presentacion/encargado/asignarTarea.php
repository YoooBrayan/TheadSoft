<?php 

if(isset($_POST['idOperario'])){

    $tarea = new Tarea($_POST['idTarea'], "", $_POST['cantidad']);
    $operario = new Operario($_POST['idOperario']);
    $operario -> setTareas($tarea);
    $respuesta = $operario -> asignarTareas($_POST['idCorte']);

    $operarioT = new Operario($_POST['idOperario']);
    $operarioT -> tareas($_POST['idCorte']);

    $json = array();
    foreach($operarioT->getTarea() as $t){
        $json[] = array(
            'id' => $t -> getId(),
            'tarea' => $t -> getOperacion() -> getDescripcion(),
            'cantidad' => $t -> getCantidad(),
            'valor' => $t -> getOperacion() -> getvalor(),
            'total' => ($t -> getCantidad() * $t -> getOperacion() -> getvalor()),
            'respuesta' => $respuesta

        );
    }

    echo json_encode($json);
}

?>