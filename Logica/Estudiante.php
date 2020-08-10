<?php 
 require_once "Persistencia/Conexion.php";
 require_once "Persistencia/EstudianteDAO.php";
 
class Estudiante{

    private $idEstudiante;
    private $nombre;
    private $apellido;
    private $conexion;
    private $EstudianteDAO;


    public function Estudiante($idEstudiante = "", $nombre = "", $apellido = ""){
        $this -> idEstudiante = $idEstudiante;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> conexion = new Conexion(); 
        $this -> EstudianteDAO = new EstudianteDAO($this -> idEstudiante, $this -> nombre, $this -> apellido);
    }

    public function  getIdEstudiante(){
        return $this -> idEstudiante;
    }
    public function getNombre(){
        return $this -> nombre;
    } 
    public function getApellido(){
        return $this -> apellido;
    }

    public function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> EstudianteDAO -> insertar());
        $this -> conexion -> cerrar();
    }

    public function consultarPaginacion($Cantidad, $Pagina){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> EstudianteDAO -> consultarPaginacion($Cantidad,$Pagina));
        $arrayres = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            $new = new Estudiante($resultado[0],$resultado[1],$resultado[2]);
            array_push($arrayres,$new);
        }
        $this -> conexion -> cerrar();
        return $arrayres;
    }

    public function cantidadPaginas(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> EstudianteDAO -> cantidadPaginas());
        return $this -> conexion -> extraer();
    }

    public function listar()
    {
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> EstudianteDAO -> listar());
        $arrayres = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            $new = new Estudiante($resultado[0],$resultado[1],$resultado[2]);
            array_push($arrayres,$new);
        }
        $this -> conexion -> cerrar();
        return $arrayres;
    }

   
}