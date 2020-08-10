<?php 
 
class EstudianteDAO{

    private $idEstudiante;
    private $nombre;
    private $apellido;


    public function EstudianteDAO($idEstudiante = "", $nombre = "", $apellido = ""){
        $this -> idEstudiante = $idEstudiante;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
    }

    public function insertar(){
        return "insert into estudiante values('','".$this -> nombre."','".$this -> apellido."')";
    }
    
    public function consultarPaginacion($cantidad, $pagina){
        return "select idEstudiante, nombre, apellido
                from estudiante
                limit " . (($pagina-1) * $cantidad) . ", " . $cantidad;
    }

    public function cantidadPaginas(){
        return "select count(idEstudiante) from estudiante";
    }

    public function listar(){
        return "select idEstudiante, nombre, apellido
                from estudiante";
    }
}