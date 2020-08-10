<?php
    $nombre = "";
    $creditos = "";
    if(isset($_POST["nombre"])){
        $nombre = $_POST["nombre"];
        $creditos = $_POST["creditos"];
        $curso = new Curso("",$nombre, $creditos);
        $curso -> insertar();
    }
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-3 col-md-0"></div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body text-white bg-primary">
                    <h4>Crear Curso</h4>
                </div>
            </div>
            <div class="card-body border">
                <form action="index.php?pid=<?php echo base64_encode("Presentacion/Curso/crearCurso.php");?>" method="post">
                    <?php if(isset($_POST["nombre"])){ ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Datos Ingresados
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        </div>                                           
                    <?php } ?>
                    <div class="form-group">
                        <label for="textNombre">Nombre</label>
                        <input name="nombre" type="text" value="<?php echo $nombre ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="textNombre">Creditos</label>
                        <input name="creditos" type="Number" min="1" value="<?php echo $creditos ?>" class="form-control" required>
                    </div>
                     <button type="submit" class="btn btn-primary">Crear Curso</button>
                </form>
            </div>
    </div>
</div>