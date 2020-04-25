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
        return "insert into modelo_Distribuido(modelo_distribuido_id, modelo_id) VALUES ('". $id ."', '" . $this->modelos . "');";
    }

    function distribuirAlmacen($modelo)
    {
        return "insert into modelo_almacen(modelo_Distribuido_id, almacen_id) values ('" . $modelo . "', '" . $this->id . "')";
    }

    function registrar(){
        return "insert into almacen(almacen_nombre) values ('". $this->lugar ."')";
    }

    function validarAlmacen(){
        return "select almacen_nombre from almacen where almacen_nombre = '". $this->lugar ."'";
    }
}
