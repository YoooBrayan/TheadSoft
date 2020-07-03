<?php

if (isset($_POST['tipo'])) {

    if ($_POST['tipo'] == "CE") {
        $corte = new Corte();
        $cortes = $corte->cortesEntregadosCompletosR();

        $json = array();
        foreach ($cortes as $c) {
            $json[] = array(
                'id' => $c->getId(),
                'modelo' => $c->getModelo()->getNombre(),
                'fecha' => $c->getFecha_Entrega(),
                'cantidad' => $c->getCantidad(),
                'satelite' => $c->getSatelite(),
                'pago' => $c->getPago(),
                'estado' => $c->getEstado(),
            );
        }

        echo json_encode($json);
    } else {
        $corte = new Corte();
        $cortes = $corte->cortesEntregadosPendientesR();

        $json = array();
        foreach ($cortes as $c) {
            $json[] = array(
                'id' => $c->getId(),
                'modelo' => $c->getModelo()->getNombre(),
                'fecha' => $c->getFecha_Entrega(),
                'cantidad' => $c->getCantidad(),
                'satelite' => $c->getSatelite(),
                'pago' => $c->getPago(),
                'estado' => $c->getEstado(),
            );
        }

        echo json_encode($json);
    }
}