<?php

class VentaDAO{

    private $id;
    private $fecha;
    private $modelos;

    function VentaDAO($id="", $fecha=""){
        $this -> id = $id;
        $this -> fecha = $fecha;
        $this-> modelos = array();
    }

    function getId(){
        return $this -> id;
    }

    function setId($id){
        $this -> id = $id;
    }

    function getFecha(){
        return $this -> fecha;
    }

    function setFecha($fecha){
        $this -> fecha = $fecha;
    }

    function setModelos($modelos){
        $this-> modelos = $modelos;
    }

    function getModelos(){
        return $this-> modelos;
    }

    function registrar(){
        return "insert into venta(venta_fecha) values (now())";
    }

    function idModeloAlmacen($modelo, $almacen){
        return "select modelo_almacen_id from modelo_Almacen ma join modelo_distribuido md on ma.modelo_distribuido_id = md.modelo_distribuido_id where modelo_id = '". $modelo ."' and almacen_id = '". $almacen ."' limit 1;";
    }

    function idVenta(){
        return "select venta_id from venta order by venta_id desc limit 1";
    }

    function registrarModeloVenta($almacen, $idVenta){
        return "insert into modelo_vendido(modelo_almacen_id, venta_id) values ('". $almacen ."', '". $idVenta ."');";
    }

    function idModeloVenta(){
        return "select modelo_vendido_id from modelo_vendido order by modelo_vendido_id desc limit 1";
    }

    function registrarModeloTalla($modeloVendido, $talla){
        return "insert into modelo_venta_talla(modelo_vendido_id, talla_id) values ('". $modeloVendido ."', '". $talla ."');";
    }

    function idModeloVentaTalla(){
        return "select modelo_venta_talla_id from modelo_venta_talla order by modelo_venta_talla_id desc limit 1";
    }

    function ventaTallaColor($modeloVentaTalla, $color, $cantidad){
        return "insert into venta_talla_Color(modelo_venta_talla_id, color_id, cantidad) values ('". $modeloVentaTalla ."', '". $color ."', '". $cantidad ."')";
    }
    
}