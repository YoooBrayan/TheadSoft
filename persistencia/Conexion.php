    <?php

class Conexion{

    private $mysqli;
    private $resultado;

    function abrir(){
        $this -> mysqli = new mysqli("localhost", "root", "ROCKY13.soloyo13.", "threadSoft", 3306);
        $this -> mysqli -> set_charset("utf8");
    }

    function ejecutar($sentencia){
         $this -> resultado = $this -> mysqli -> query($sentencia);
    }

    function cerrar(){
        $this -> mysqli -> close();
    }

    function numFilas(){
        if($this -> resultado != null){
            return $this -> resultado -> num_rows;
        }else{
            return 0;
        }
    }

    function extraer(){
        $this -> resultado -> fetch_row();
    }

}