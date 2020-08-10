<?php 
 
class CursoDAO{

    private $idCurso;
    private $nombre;
    private $creditos;


    public function CursoDAO($idCurso = "", $nombre = "", $creditos = ""){
        $this -> idCurso = $idCurso;
        $this -> nombre = $nombre;
        $this -> creditos = $creditos;
    }

    public function insertar(){
        return "insert into curso values('','".$this -> nombre."','".$this -> creditos."')";
    }
    
    public function consultarPaginacion($cantidad, $pagina){
        return "select idCurso, nombre, creditos
                from curso
                limit " . (($pagina-1) * $cantidad) . ", " . $cantidad;
    }

    public function cantidadPaginas(){
        return "select count(idCurso) from curso";
    }

    public function listar(){
        return "select idCurso, nombre, creditos
                from curso";
    }
}