<?php 
 require_once "Persistencia/Conexion.php";
 require_once "Persistencia/NotaDAO.php";
 
class Nota{

    private $idNota;
    private $idEstudiante;
    private $idCurso;
    private $nota;
    private $conexion;
    private $NotaDAO;


    public function Nota($idNota="", $idEstudiante = "", $idCurso = "", $nota = ""){
        $this -> idNota = $idNota;
        $this -> idEstudiante = $idEstudiante;
        $this -> idCurso = $idCurso;
        $this -> nota = $nota;
        $this -> conexion = new Conexion(); 
        $this -> NotaDAO = new NotaDAO($this -> idNota, $this -> idEstudiante, $this -> idCurso, $this -> nota);
    }

    public function  getIdNota(){
        return $this -> idNota;
    }
    public function  getIdEstudiante(){
        return $this -> idEstudiante;
    }
    public function getIdCurso(){
        return $this -> idCurso;
    } 
    public function getNota(){
        return $this -> nota;
    }

    public function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> NotaDAO -> insertar());
        $this -> conexion -> cerrar();
    }

    public function consultarPaginacion($Cantidad, $Pagina){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> NotaDAO -> consultarPaginacion($Cantidad,$Pagina));
        $arrayres = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            $new = new Nota($resultado[0],$resultado[1],$resultado[2],$resultado[3]);
            array_push($arrayres,$new);
        }
        $this -> conexion -> cerrar();
        return $arrayres;
    }

    public function cantidadPaginas(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> NotaDAO -> cantidadPaginas());
        return $this -> conexion -> extraer();
    }

    public function listar1(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> NotaDAO -> listar1());
        $arrayres = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($arrayres,$resultado);
        }
        $this -> conexion -> cerrar();
        return $arrayres;
    }

    public function listar2(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> NotaDAO -> listar2());
        $arrayres = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($arrayres,$resultado);
        }
        $this -> conexion -> cerrar();
        return $arrayres;
    }
   
}