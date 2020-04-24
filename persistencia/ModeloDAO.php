<?php

class ModeloDAO
{

    private $id;
    private $nombre;
    private $valor;
    private $proveedor;
    private $operaciones;
    private $talla;

    function ModeloDAO($id = "", $nombre = "", $valor = "", $proveedor = "", $talla = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->valor = $valor;
        $this->proveedor = $proveedor;
        $this->talla = $talla;
    }

    function consultarModelos()
    {
        return "call modelosProveedor('" . $this->proveedor . "')";
    }

    function getId()
    {
        return $this->id;
    }

    function setTalla($talla)
    {
        $this->talla = $talla;
    }

    function getTalla()
    {
        return $this->talla;
    }

    function modeloAlmacen()
    {
        return "select m.modelo_id, modelo_Nombre, ifnull(sum(cantidad), 0)
        from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
        modelo m on m.modelo_id = md.modelo_id
        where m.modelo_id = '" . $this->id . "'";
    }

    function modeloBodega()
    {
        return "call modeloBodega('" . $this->id . "')";
    }

    function totalEntregadas()
    {
        return "select totalModeloEntregado('" . $this->id . "')";
    }

    function tallas($corte)
    {
        return "select ct.Talla_Id, ct.Cantidad
        from modelo m join corte_Talla ct on c.corte_id = ct.corte_id
        where c.corte_id = '" . $corte . "'
        group by ct.talla_id;";
    }

    function modeloTallaBodega($talla)
    {
        return "select ifnull(sum(e.cantidad-a.cantidad), 0) from (
            
            select ifnull(sum(mdt.cantidad), 0) as cantidad
            from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
            modelo m on m.modelo_id = md.modelo_id
            where m.modelo_id = '". $this->id ."' and mdt.talla_id = '". $talla  ."'
            GROUP by talla_id

        ) as a,
        (
            select modelo, talla, sum(cantidad) as cantidad from tallasmodelo where modelo = '" . $this->id . "' and talla = '" . $talla . "'
        ) as e";
    }

    function modeloTallaBodegaS($talla)
    {
        return "select sum(cantidad) as cantidad from tallasmodelo where modelo = '" . $this->id . "' and talla = '" . $talla . "'";
    }

    function tallasModeloBodega()
    {
        return "select talla from tallasmodelo where modelo = '" . $this->id . "' group by talla";
    }

    function coloresModeloBodega($talla)
    {
        return "select co.color_id, co.color_Nombre as color
        from corte c inner join Corte_Talla ct on c.Corte_Id = ct.Corte_Id 
        inner join Corte_Talla_Color ctc on ct.Corte_Talla_id = ctc.Corte_Talla_id 
        inner join Color co on co.Color_Id = ctc.Color_Id
        where corte_modelo = '" . $this->id . "' and ct.talla_id = '" . $talla . "'
        group by co.color_id, ct.talla_id";
    }

    function colorTallaModeloBodega($color, $talla)
    {
        return "select sum(b.cantidad-a.cantidad) from 
        (
            select sum(ctc.cantidad) as cantidad
            from corte c inner join Corte_Talla ct on c.Corte_Id = ct.Corte_Id 
            inner join Corte_Talla_Color ctc on ct.Corte_Talla_id = ctc.Corte_Talla_id 
            inner join Color co on co.Color_Id = ctc.Color_Id
            where corte_modelo = '". $this->id ."' and ct.talla_id = '". $talla ."' and ctc.Color_id = '". $color ."'
            group by co.color_id, ct.talla_id
            order by c.corte_modelo, ct.talla_id
        
        ) as b,
        (
            select  sum(mtc.cantidad) as cantidad
            from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
            modelo m on m.modelo_id = md.modelo_id JOIN
            modelo_Talla_color mtc on mtc.MDT_id = mdt.modelo_D_talla_id JOIN
            color c on c.color_id = mtc.color_id
            where m.modelo_id = '". $this->id ."' and mdt.talla_id = '". $talla ."' and mtc.Color_id = '". $color ."'
            GROUP by mtc.color_id, talla_id
            ORDER BY talla_id
        ) as a
        ";
    }

    function colorTallaModeloBodegaA($color, $talla)
    {
        return "select sum(mtc.cantidad) as cantidad
        from modelo_almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id join modelo_distribuido_talla mdt on md.modelo_distribuido_id = mdt.modelo_distribuido_id join 
        modelo m on m.modelo_id = md.modelo_id JOIN
        modelo_Talla_color mtc on mtc.MDT_id = mdt.modelo_D_talla_id JOIN
        color c on c.color_id = mtc.color_id
        where m.modelo_id = '". $this->id ."' and mdt.talla_id = '". $talla ."' and mtc.Color_id = '". $color ."'
        GROUP by mtc.color_id, talla_id
        ORDER BY talla_id";
    }

    function colorTallaModeloBodegaS($color, $talla)
    {
        return "select sum(ctc.cantidad)
        from corte c inner join Corte_Talla ct on c.Corte_Id = ct.Corte_Id 
        inner join Corte_Talla_Color ctc on ct.Corte_Talla_id = ctc.Corte_Talla_id 
        inner join Color co on co.Color_Id = ctc.Color_Id
        where corte_modelo = '" . $this->id . "' and ct.talla_id = '" . $talla . "' and co.Color_id = '" . $color . "'
        group by co.color_id, ct.talla_id";
    }

    function agregarTallaModeloD()
    {
        return "insert into modelo_Distribuido_talla(modelo_Distribuido_id, talla_id, cantidad) values ('" . $this->id . "', '" . $this->talla->getId() . "', '" . $this->talla->getCantidad() . "')";
    }

    function agregarColorTallaModeloD($talla, $color, $cantidad)
    {
        return "insert into modelo_talla_color(MDT_id, color_id, cantidad) values ('" . $talla . "', '" . $color . "', '" . $cantidad . "')";
    }

    function idModeloTalla($modeloD)
    {
        return "select modelo_d_talla_id from modelo_distribuido_talla where modelo_Distribuido_id = '" . $modeloD . "' and talla_id = '" . $this->talla->getId() . "'";
    }
}
