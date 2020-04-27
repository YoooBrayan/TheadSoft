<?php

require_once 'logica/Venta.php';
require_once 'logica/Insumo.php';

class AlmacenDAO
{

    private $id;
    private $lugar;
    private $modelos;
    private $ventas;
    private $insumos;

    function AlmacenDAO($id = "", $lugar = "", $modelos = null, $ventas = null, $insumos = null)
    {
        $this->id = $id;
        $this->lugar = $lugar;
        $this->modelos = $modelos;
        $this->ventas = new Venta();
        $this->insumos = new Insumo();
    }

    function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function getModelos()
    {
        return $this->modelos;
    }

    function setModelo($modelos)
    {
        $this->modelos = $modelos;
    }

    function getVentas()
    {
        return $this->ventas;
    }

    function setVentas($ventas)
    {
        $this->ventas = $ventas;
    }

    function listaAlmacenes()
    {
        return "select * from almacen";
    }

    function modelosMercancia()
    {
        return "call modelosMercancia('" . $this->id . "')";
    }

    function modeloAlmacen()
    {
        return "call modeloAlmacen('" . $this->id . "', '" . $this->modelos->getId() . "')";
    }

    function tallas($corte)
    {
        return "select ct.Talla_Id, ct.Cantidad
        from corte c join corte_Talla ct on c.corte_id = ct.corte_id
        where c.corte_id = '" . $corte . "'
        group by ct.talla_id;";
    }

    function consultarColores($corte)
    {
        return "select Color_Nombre, ctc.cantidad 
        from corte c join corte_talla ct on ct.corte_id = c.corte_id join corte_talla_color ctc on ctc.corte_talla_id = ct.corte_talla_id join color co on co.color_id = ctc.color_id
        where c.corte_id = '" . $corte . "' and ct.talla_id = '" . $this->id . "'";
    }

    function tallasModeloAlmacen()
    {
        return "call tallaModeloAlmacen('" . $this->modelos->getId() . "', '" . $this->id . "')";
    }

    function coloresTallaModeloAlmacen($talla)
    {
        return "call coloresTallaModeloAlmacen('" . $this->modelos->getId() . "', '" . $this->id . "', '" . $talla . "')";
    }

    function idModeloDistribuido()
    {
        return "select ifnull(modelo_distribuido_id+1, 1) from modelo_distribuido order by modelo_Distribuido_id desc limit 1";
    }

    function distribuirModelo($id)
    {
        return "insert into modelo_Distribuido(modelo_distribuido_id, modelo_id) VALUES ('" . $id . "', '" . $this->modelos . "');";
    }

    function distribuirAlmacen($modelo)
    {
        return "insert into modelo_almacen(modelo_Distribuido_id, almacen_id) values ('" . $modelo . "', '" . $this->id . "')";
    }

    function registrar()
    {
        return "insert into almacen(almacen_nombre) values ('" . $this->lugar . "')";
    }

    function validarAlmacen()
    {
        return "select almacen_nombre from almacen where almacen_nombre = '" . $this->lugar . "'";
    }

    function tallasModelo($modelo, $talla)
    {
        return "select sum(a.cantidad-v.cantidad) from 
        (
            select ifnull(sum(cantidad), 0) as cantidad from
            venta_talla_Color vtc join 
            modelo_venta_Talla mvt on vtc.modelo_venta_talla_id = mvt.modelo_venta_Talla_id JOIN
            modelo_vendido mv on mv.modelo_vendido_id = mvt.modelo_vendido_id JOIN
            modelo_almacen ma on ma.modelo_almacen_id = mv.modelo_almacen_id
            where ma.modelo_distribuido_id = '" . $modelo . "' and talla_id = '" . $talla . "' and ma.almacen_id = '" . $this->id . "'
        
        ) as v,
        (
            select ifnull(sum(mdt.cantidad), 0) as cantidad from 
            modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
            modelo m on m.modelo_id = md.modelo_id
            where m.modelo_id = '" . $modelo . "' and mdt.talla_id = '" . $talla . "' and ma.almacen_id = '" . $this->id . "'
                    GROUP by talla_id
        ) as a;
        ";
    }

    function colorTallaModeloAlmacen($talla, $color){
        return "select sum(a.cantidad-v.cantidad) from 
        (
            select ifnull(sum(cantidad), 0) as cantidad from
            venta_talla_Color vtc join 
            modelo_venta_Talla mvt on vtc.modelo_venta_talla_id = mvt.modelo_venta_Talla_id JOIN
            modelo_vendido mv on mv.modelo_vendido_id = mvt.modelo_vendido_id JOIN
            modelo_almacen ma on ma.modelo_almacen_id = mv.modelo_almacen_id
            where ma.modelo_distribuido_id = '". $this->modelos->getId() ."' and talla_id = '". $talla ."' and ma.almacen_id = '". $this->id ."' and vtc.Color_id = '". $color ."'
        
        ) as v,
        (
            select ifnull(sum(mtc.cantidad), 0) as cantidad
            from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
            modelo m on m.modelo_id = md.modelo_id join
            modelo_talla_Color mtc on mdt.modelo_d_talla_id = mtc.mdt_id
            where m.modelo_id =  '". $this->modelos->getId() ."' and mdt.talla_id = '". $talla ."' and ma.almacen_id = '". $this->id ."' and mtc.color_id = '". $color ."'
        ) as a";
    }
}
