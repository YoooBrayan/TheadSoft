<?php

if (isset($_POST['tipo'])) {

    if ($_POST['tipo'] == "CE") {
        $corte = new Corte();
        $cortes = $corte->cortesEntregadosCompletos();

        $json = array();
        foreach ($cortes as $c) {
            $json[] = array(
                'id' => $c->getId(),
                'modelo' => $c->getModelo()->getNombre(),
                'fecha' => $c->getFecha_Entrega(),
                'cantidad' => $c->getCantidad(),
                'pago' => $c->getPago(),
                'estado' => $c->getEstado(),
            );
        }

        echo json_encode($json);
    } else {
        $corte = new Corte();
        $cortes = $corte->cortesEntregadosPendientes();

        $json = array();
        foreach ($cortes as $c) {
            $json[] = array(
                'id' => $c->getId(),
                'modelo' => $c->getModelo()->getNombre(),
                'fecha' => $c->getFecha_Entrega(),
                'cantidad' => $c->getCantidad(),
                'pago' => $c->getPago(),
                'estado' => $c->getEstado(),
            );
        }

        echo json_encode($json);
    }
}