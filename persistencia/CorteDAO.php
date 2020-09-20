<?php

class CorteDAO
{

    private $id;
    private $fecha_envio;
    private $fecha_entrega;
    private $observaciones;
    private $representante;
    private $modelo;
    private $estado;
    private $tareas;
    private $tallas;
    private $colores;
    private $cantidad;
    private $satelite;

    function CorteDAO($id = "", $fecha_envio = "", $fecha_entrega = "", $observaciones = "", $representante = "", $modelo = "", $estado = "", $tareas = "", $tallas = "", $cantidad = "", $satelite = "")
    {

        $this->id = $id;
        $this->fecha_envio = $fecha_envio;
        $this->fecha_entrega = $fecha_entrega;
        $this->observaciones = $observaciones;
        $this->tallas = new Talla();
        $this->colores = new Color();
        $this->representante = new Representante();
        $this->modelo = new Modelo();
        $this->cantidad = $cantidad;
        $this->satelite = $satelite;
    }

    function insertarS()
    {
        return "call nuevoCorte('" . $this->id . "', '" . $this->representante->getId() . "', '" . $this->modelo->getId() . "', '" . $this->fecha_envio . "', '" . $this->fecha_entrega . "', '" . $this->observaciones . "', '" . $this->satelite . "')";
    }

    function insertar()
    {
        return "call nuevoCorte('" . $this->id . "', '" . $this->representante->getId() . "', '" . $this->modelo->getId() . "', '" . $this->fecha_envio . "', '" . $this->fecha_entrega . "', '" . $this->observaciones . "', null)";
    }


    function idCorteNuevo()
    {
        return "select idCorteNuevo()";
    }

    function agregarTallas()
    {
        return "call agregarTallaCorte('" . $this->id . "', '" . $this->tallas->getId() . "', '" . $this->tallas->getCantidad() . "')";
    }

    function agregarColores($talla, $color, $cantidad)
    {
        return "insert into corte_Talla_color(corte_talla_id, color_id, cantidad) values ('" . $talla . "', '" . $color . "', '" . $cantidad . "')";
    }

    function setTallas($tallas)
    {
        $this->tallas = $tallas;
    }

    function getTallas()
    {
        return $this->tallas;
    }

    function setColores($colores)
    {
        $this->colores = $colores;
    }

    function getColores()
    {
        return $this->colores;
    }

    function consultar()
    {
        return "select c.corte_id from corte c inner join corte_talla ct on c.corte_id = ct.corte_id where c.Corte_id = '" . $this->id . "'";
    }

    function consultarCorte()
    {
        return "select C.Corte_ID as ID, Modelo_Nombre as Modelo, Corte_Fecha_Envio, Corte_Fecha_Entrega, corte_observacion_prov, sum(Cantidad) as Cantidad 
        from corte c join Modelo m on c.corte_modelo = m.modelo_id join Corte_Talla ct on ct.corte_id = c.corte_id
        where c.corte_id = '" . $this->id . "'";
    }

    function setRepresentante($representante)
    {
        $this->representante = $representante;
    }

    function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    function eliminarTalla($talla)
    {
        return "delete from corte_talla where corte_id = '" . $this->id . "' and talla_id = '" . $this->$talla . "'";
    }

    function idTallaCorte($corte, $talla)
    {
        return "select Corte_Talla_id from corte_Talla ct join talla t on ct.talla_id = t.talla_id where t.talla_id = '" . $talla . "' and ct.corte_id = '" . $corte . "'";
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function cortesPorEntregar($satelite)
    {
        return "select id, modelo, 'fecha de envio', cantidad from cortesPorEntregar where corte_satelite = '" . $satelite . "'";
    }

    function cortesPorEntregarR()
    {
        return "select * from cortesPorEntregar";
    }

    function cortesPorEntregarFiltrado($filtro)
    {
        $consulta = "select * from cortesPorEntregar where corte_satelite";
        if ($filtro == 1) {
            return $consulta .= " is not null";
        } else {
            return $consulta .= " is null";
        }
    }

    function tallas($corte)
    {
        return "select ct.Talla_Id, ct.Cantidad
        from corte c join corte_Talla ct on c.corte_id = ct.corte_id
        where c.corte_id = '" . $corte . "'
        group by ct.talla_id;";
    }

    function consultarTareas()
    {
        return "call tareasPorAsignar(' " . $this->id . "')";
    }

    function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    function coloresAEliminar()
    {
        return "select corte_talla_color_id from corte_talla ct join corte_Talla_color  ctc on ctc.corte_talla_id = ct.corte_talla_id and corte_id = '" . $this->id . "'";
    }

    function eliminarColor($id)
    {
        return "delete from corte_talla_color where corte_talla_color_id = '" . $id . "'";
    }

    function eliminarCorte()
    {
        return "call eliminarCorte('" . $this->id . "')";
    }

    function entregarCorte()
    {
        return "call entregarCorte('" . $this->id . "', '" . $this->cantidad . "')";
    }

    function cantidad()
    {
        return "select obtenerCantidadPrendasT('" . $this->id . "')";
    }

    function cortesEntregadosCompletos($satelite)
    {
        return "select id, modelo, realizadas 'fecha de entrega', corte_estado, 'total pago' from cortesEntregadosC where corte_satelite = '" . $satelite . "'";
    }

    function cortesEntregadosPendientes($satelite)
    {
        return "select id, modelo, realizadas 'fecha de entrega', corte_estado, pago from cortesEntregadosP where corte_satelite = '" . $satelite . "'";
    }

    function cortesEntregadosCompletosR()
    {
        return "select * from cortesEntregadosC";
    }

    function cortesEntregadosPendientesR()
    {
        return "select * from cortesEntregadosP";
    }

    function pagarCorte()
    {
        return "call pagarCorte('" . $this->id . "')";
    }

    function removerPago()
    {
        return "call removerPago('" . $this->id . "')";
    }

    function consultarCortes($satelite)
    {
        return "select C.Corte_ID as ID, Modelo_Nombre as Modelo, Corte_Fecha_Envio, sum(Cantidad) as Cantidad 
        from corte c join Modelo m on c.corte_modelo = m.modelo_id join Corte_Talla ct on ct.corte_id = c.corte_id = '" . $satelite . "'
        where corte_satelite 
        group by c.Corte_id";
    }

    function operariosNomina()
    {
        return "call operariosNomina('" . $this->id . "')";
    }

    function actualizarSatelite($satelite)
    {
        return "update corte set corte_satelite = '" . $satelite . "' where corte_id = '" . $this->id . "'";
    }

    function actualizarTallaCorte($talla, $cantidad)
    {
        return "update corte_talla set Cantidad = '" . $cantidad . "' where corte_id = '" . $this->id . "' and talla_id = '" . $talla . "'";
    }

    function actualizarColorTallaCorte($color, $cantidad)
    {
        return "update corte_talla_color set cantidad = '" . $cantidad . "' where corte_Talla_color_id = '" . $color . "'";
    }

    function obtenerIdColorTalla($talla, $color)
    {
        return "select corte_Talla_color_id
        from corte c join corte_talla ct on ct.corte_id = c.corte_id join corte_talla_color ctc on ctc.corte_talla_id = ct.corte_talla_id join color co on co.color_id = ctc.color_id
        where c.corte_id = '" . $this->id . "' and ct.talla_id = '" . $talla . "' and co.color_id = '" . $color . "'";
    }

    function pagoTotalCorte()
    {
        return "select obtenerPagoCorteT('" . $this->id . "')";
    }

    function totalPagosCorte()
    {
        return "select obtenerTotalpagos('" . $this->id . "')";
    }

    function ganancias()
    {
        return "select ganancias('" . $this->id . "')";
    }

    function cuentas($pagoTotal, $totalPagos, $insumos, $ganancias)
    {
        return "select cuentas('" . $pagoTotal . "', '" . $totalPagos . "', '" . $insumos . "', '" . $ganancias - $insumos . "')";
    }
}
