    <?php

class Conexion{

    private $mysqli;
    private $resultado;

    function abrir(){
        $this -> mysqli = new mysqli("localhost", "root", "", "threadSoft", 3306);
        $this -> mysqli -> set_charset("utf8");
    }

    function ejecutar($sentencia){
         return $this -> resultado = $this -> mysqli -> query($sentencia);
    }

    function cerrar(){
        $this -> mysqli -> close();
    }

    public function numFilas(){
        if($this -> resultado!=null){
            return $this -> resultado -> num_rows;
        }else{
            return 0;
        }
    }
    public function extraer(){
        return $this -> resultado -> fetch_row();
    }

}