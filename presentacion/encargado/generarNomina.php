<?php

session_start();

if (isset($_POST['idCortes'])) {

    unset($_SESSION["cortes"][0]);

    $operarios = array();
    array_push($operarios, ['id' => 0]);

    $pagoTotal = 0;
    $pagoNomina = 0;
    $insumos = 0;
    $ganancias = 0;

    foreach ($_SESSION['cortes'] as $c) {
        $corte = new Corte($c);
        $operario = $corte->operariosNomina();
        $pagoTotal += $corte->obtenerPagoTotal();
        $pagoNomina += $corte->obtenerTotalPagos();
        $ganancias += $corte->ganancias();
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

    $socios = new Operario();
    $listaSocios = $socios -> listaSocios();
    $nomina = array();
    $pagoSocios = array();

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

        foreach($listaSocios as $s){
            if($o['id'] == $s -> getId()){
                $pagoSocios[] = array(
                    'socio' => $s -> getNombre(),
                    'pago' => $pago + floor((($ganancias - $_POST['insumos']) / count($listaSocios)))
                );
            }
        }
    }


    $datos = array(
        'nomina' => $nomina,
        'pagoTotal' => $pagoTotal,
        'pagoNomina' => $pagoNomina,
        'insumos' => $_POST['insumos'],
        'ganancias' => $ganancias - $_POST['insumos'],
        'gananciasD' => floor(($ganancias - $_POST['insumos']) / count($listaSocios)),
        'pagoSocios' => $pagoSocios
    );

    array_push($_SESSION['cortes'], 0);
    echo json_encode($datos);
}
