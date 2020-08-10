<?php 
 class Conexion{
    private $mysqli;
    private $respuesta;

    function abrir(){
        $this -> mysqli = new mysqli("localhost","root","","notas");
        $this -> mysqli -> set_charset("utf8");
    }
    
    function cerrar(){
        $this -> mysqli -> close();
    }

    function ejecutar($consulta){
        $this -> respuesta = $this -> mysqli -> query($consulta);
    }

    function extraer(){
        return $this -> respuesta -> fetch_row(); /*devulve resultado en array*/
    }

    function numFilas(){
        if($this -> respuesta != null){
            return $this -> respuesta -> num_rows; 
        }else{
            return 0;
        }
    }

 }

?>