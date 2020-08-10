<?php
$estudiante = "";
$curso = "";
$notaEstudiante = "";
$selectEst = new Estudiante();
$resEst = $selectEst->listar();
$selectCurso = new Curso();
$resCurso = $selectCurso->listar();
if (isset($_GET["idEstudiante"])) {
    $actor = 1;
    $estudiante = $_GET["idEstudiante"];
}else if(isset($_GET["idCurso"])){
    $actor = 2;
    $curso = $_GET["idCurso"];
}
if (isset($_POST["notaEstudiante"])) {
    $estudiante = $_POST["estudiante"];
    $curso = $_POST["curso"];
    $notaEstudiante = $_POST["notaEstudiante"];
    $nota = new Nota("", $estudiante, $curso, $notaEstudiante);
    $nota->insertar();
}
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-3 col-md-0"></div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body text-white bg-primary">
                    <h4>Asignar Nota</h4>
                </div>
            </div>
            <div class="card-body border">
                <form action="index.php?pid=<?php echo base64_encode("Presentacion/AjaxNotas/crearNota.php"); ?>" method="post">
                    <?php if (isset($_POST["notaEstudiante"])) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Datos Ingresados
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        </div>
                    <?php } ?>
                    <select name="estudiante" class='custom-select' style='width: 150px' >
                        <?php
                        foreach ($resEst as $resnew) {
                            echo "<option ".($estudiante==$resnew -> getIdEstudiante()?'selected':($actor==1?'hidden':''))." value='" . $resnew->getIdEstudiante() . "'>" . $resnew->getNombre() . "</option>";
                        }
                        ?>
                    </select>
                    <select name="curso" class='custom-select estado' style='width: 150px'>
                        <?php
                        foreach ($resCurso as $resnew2) {
                            echo "<option ".($curso==$resnew2 -> getIdCurso()?'selected':($actor==2?'hidden':''))." value='" . $resnew2->getIdCurso() . "'>" . $resnew2->getNombre() . "</option>";
                        }
                        ?>
                    </select>
                    <div class="form-group">
                        <label for="textNombre">Nota</label>
                        <input name="notaEstudiante" type="number" value="<?php echo $notaEstudiante ?>" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Asignar Nota</button>
                </form>
            </div>
        </div>
    </div>