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

    function setTalla($talla){
        $this->talla = $talla;
    }

    function getTalla(){
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
            select modelo, talla, sum(cantidad) as cantidad from
            tallasmodeloD where modelo = '" . $this->id . "' and talla = '" . $talla . "'
        ) as a,
        (
            select modelo, talla, sum(cantidad) as cantidad from tallasmodelo where modelo = '" . $this->id . "' and talla = '" . $talla . "'
        ) as e";
    }

    function tallasModeloBodega()
    {
        return "select talla from tallasmodelo where modelo = '" . $this->id . "' group by talla";
    }

    function coloresModeloBodega($talla)
    {
        return "select color_id, color From coloresTallasmodelo where modelo = '". $this->id ."' and talla = '". $talla ."';";
    }

    function colorTallaModeloBodega($color, $talla)
    {
        return "select b.color_id, b.cantidad-a.cantidad as bodegaR
        from coloresTallasModelo b inner join coloresTallasModeloD a on b.color = a.color
        where b.color_id = '". $color ."' and a.talla = '". $talla ."' and a.modelo = '". $this->id ."'
		GROUP by a.talla";
    }

    function colorTallaModeloBodegaS($color, $talla){
        return "select color_id, cantidad from colorestallasModelo where modelo = '". $this->id ."' and talla = '". $talla ."' and color_id = '". $color . "'";
    }

    function agregarTallaModeloD(){
        return "insert into modelo_Distribuido_talla(modelo_Distribuido_id, talla_id, cantidad) values ('". $this->id ."', '". $this->talla->getId() ."', '". $this->talla->getCantidad() ."')";
    }

    function agregarColorTallaModeloD($talla, $color, $cantidad){
        return "insert into modelo_talla_color(MDT_id, color_id, cantidad) values ('". $talla ."', '". $color ."', '". $cantidad ."')";
    }

    function idModeloTalla($modeloD){
        return "select modelo_d_talla_id from modelo_distribuido_talla where modelo_Distribuido_id = '". $modeloD ."' and talla_id = '". $this->talla->getId() ."'";
    }
}
