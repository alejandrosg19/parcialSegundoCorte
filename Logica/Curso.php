<?php
require_once "Persistencia/Conexion.php";
require_once "Persistencia/CursoDAO.php";

class Curso
{

    private $idCurso;
    private $nombre;
    private $creditos;
    private $conexion;
    private $CursoDAO;


    public function Curso($idCurso = "", $nombre = "", $creditos = "")
    {
        $this->idCurso = $idCurso;
        $this->nombre = $nombre;
        $this->creditos = $creditos;
        $this->conexion = new Conexion();
        $this->CursoDAO = new CursoDAO($this->idCurso, $this->nombre, $this->creditos);
    }

    public function  getIdCurso()
    {
        return $this->idCurso;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getCreditos()
    {
        return $this->creditos;
    }

    public function insertar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->CursoDAO->insertar());
        $this->conexion->cerrar();
    }

    public function consultarPaginacion($Cantidad, $Pagina)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->CursoDAO->consultarPaginacion($Cantidad, $Pagina));
        $arrayres = array();
        while (($resultado = $this->conexion->extraer()) != null) {
            $new = new Curso($resultado[0], $resultado[1], $resultado[2]);
            array_push($arrayres, $new);
        }
        $this->conexion->cerrar();
        return $arrayres;
    }

    public function cantidadPaginas()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->CursoDAO->cantidadPaginas());
        return $this->conexion->extraer();
    }

    public function listar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->CursoDAO->listar());
        $arrayres = array();
        while (($resultado = $this->conexion->extraer()) != null) {
            $new = new Curso($resultado[0], $resultado[1], $resultado[2]);
            array_push($arrayres, $new);
        }
        $this->conexion->cerrar();
        return $arrayres;
    }
}
