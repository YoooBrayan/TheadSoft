<?php 

if(isset($_POST['idOperario'])){

    $operario = new Operario($_POST['idOperario']);
    $operario -> tareas($_POST['idCorte']);

    $operarioT = new Operario($_POST['idOperario']);
    $operarioT -> tareas($_POST['idCorte']);

    $json = array();
    foreach($operarioT->getTarea() as $t){
        $json[] = array(
            'id' => $t -> getId(),
            'tarea' => $t -> getOperacion() -> getDescripcion(),
            'cantidad' => $t -> getCantidad(),
            'valor' => $t -> getOperacion() -> getvalor(),
            'total' => ($t -> getCantidad() * $t -> getOperacion() -> getvalor())

        );
    }

    echo json_encode($json);
}
