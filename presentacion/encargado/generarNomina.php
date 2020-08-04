<?php

session_start();

if (isset($_POST['idCortes'])) {

    unset($_SESSION["cortes"][0]);

    $operarios = array();
    array_push($operarios, ['id' => 0]);

    foreach ($_SESSION['cortes'] as $c) {
        $corte = new Corte($c);
        $operario = $corte->operariosNomina();
        foreach ($operario as $o) {

            $ids = array_column($operarios, 'id');
            $indice = array_search($o->getId(), $ids);

            if (!$indice) {
                $operarios[] = array(
                    'id' => $o->getId(),
                    'Nombre' => $o->getNombre(),
                );
            }
        }
    }

    unset($operarios[0]);

    $nomina = array();

    foreach ($operarios as $o) {
        $operario = new Operario($o['id']);
        $nominaO = array();
        foreach ($_SESSION['cortes'] as $c) {
            $nominaCO = $operario->tareasNomina($c);
            foreach ($nominaCO as $n) {
                $nominaO[] = array(
                    'modelo' => $n['modelo'],
                    'tarea' => $n['tarea'],
                    'cantidad' => $n['cantidad'],
                    'valorU' => $n['valorU'],
                    'pago' => $n['pago']
                );
            }
        }
        $pago = $operario->pagoNeto($_SESSION['cortes']);
        $nomina[] = array(
            'operario' =>  $o,
            'nomina' => $nominaO,
            'pago' => $pago
        );
    }

    array_push($_SESSION['cortes'], 0);
    echo json_encode($nomina);
}
