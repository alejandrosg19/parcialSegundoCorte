<?php
    $nombre = "";
    $apellido = "";
    if(isset($_POST["nombre"])){
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $estudiante = new Estudiante("",$nombre, $apellido);
        $estudiante -> insertar();
    }
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-3 col-md-0"></div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body text-white bg-primary">
                    <h4>Crear Estudiante</h4>
                </div>
            </div>
            <div class="card-body border">
                <form action="index.php?pid=<?php echo base64_encode("Presentacion/Estudiante/crearEstudiante.php");?>" method="post">
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
                        <label for="textNombre">Apellido</label>
                        <input name="apellido" type="text" value="<?php echo $apellido ?>" class="form-control" required>
                    </div>
                     <button type="submit" class="btn btn-primary">Crear Estudiante</button>
                </form>
            </div>
    </div>
</div>