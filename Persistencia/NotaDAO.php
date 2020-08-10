<?php

class NotaDAO
{

    private $idNota;
    private $idEstudiante;
    private $idCurso;
    private $nota;


    public function NotaDAO($idNota = "", $idEstudiante = "", $idCurso = "", $nota = "")
    {
        $this->idNota = $idNota;
        $this->idEstudiante = $idEstudiante;
        $this->idCurso = $idCurso;
        $this->nota = $nota;
    }

    public function insertar()
    {
        return "insert into estudianteCurso values('','" . $this->idEstudiante . "','" . $this->idCurso . "','" . $this->nota . "')";
    }

    public function consultarPaginacion($cantidad, $pagina)
    {
        return "select idNota, idEstudiante, idCurso, nota
                from estudianteCurso
                limit " . (($pagina - 1) * $cantidad) . ", " . $cantidad;
    }

    public function cantidadPaginas()
    {
        return "select count(idNota) from estudianteCurso";
    }

    public function listar1()
    {
        return "
                select estudiante.nombre , curso.nombre, estudiantecurso.nota
                from estudiantecurso
                INNER JOIN estudiante on FK_idEstudiante = idEstudiante
                INNER JOIN curso on FK_idCurso = idCurso
                WHERE estudiante.idEstudiante = '".$this -> idEstudiante."'";
    }

    public function listar2()
    {
        return "
                select estudiante.nombre , curso.nombre, estudiantecurso.nota
                from estudiantecurso
                INNER JOIN estudiante on FK_idEstudiante = idEstudiante
                INNER JOIN curso on FK_idCurso = idCurso
                WHERE curso.idCurso = '".$this -> idCurso."'";
    }
}
