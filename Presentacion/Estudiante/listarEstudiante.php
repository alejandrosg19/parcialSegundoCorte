<?php
$Estudiante = new Estudiante();
$cantidad = 5;
if (isset($_GET["cantidad"])) {
    $cantidad = $_GET["cantidad"];
}
$pagina = 1;
if (isset($_GET["pagina"])) {
    $pagina = $_GET["pagina"];
}
$cant = $Estudiante->cantidadPaginas();
$cantPagina = intval($cant[0] / $cantidad);
if (($cant[0] % $cantidad) != 0) {
    $cantPagina++;
}
$valores = $Estudiante->consultarPaginacion($cantidad, $pagina);
?>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header text-white bg-primary text-center">
                    <h4>Lista Estudiantes</h4>
                </div>
                <div class="text-center m-2">
                    <span><?php echo (($pagina - 1) * $cantidad) ?> al <?php echo ((($pagina - 1) * $cantidad) + count($valores) - 1) ?> de <?php echo ($cant[0] - 1) ?> Registros Encontrados</span>
                    <select id="cantidad" class="custom-select" onchange="Selected();" style="width: 60px">
                        <option selected></option>
                        <option value="5" <?php echo ($cantidad == 5) ? "selected" : "" ?>>5</option>
                        <option value="10" <?php echo ($cantidad == 10) ? "selected" : "" ?>>10</option>
                        <option value="15" <?php echo ($cantidad == 15) ? "selected" : "" ?>>15</option>
                        <option value="20" <?php echo ($cantidad == 20) ? "selected" : "" ?>>20</option>
                    </select>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Servicios</th>
                        </tr>
                        <tr>
                            <?php
                            $i = ($pagina - 1) * $cantidad;
                            foreach ($valores as $res) {
                                echo "<tr>";
                                echo "<td>" . $i . "</td>";
                                echo "<td>" . $res->getNombre() . "</td>";
                                echo "<td>" . $res->getApellido() . "</td>";
                                echo "<td> <a href='#' class='detalle' data-idestudiante='" . $res->getIdEstudiante() . "' data-toggle='modal' data-target='#exampleModal'><span class='fas fa-info-circle' data-toggle=tooltip ' data-placement='top' title='Asignar Nota'></span> </a>";
                                echo " <a href='reportePDF1.php?idEstudiante=".$res->getIdEstudiante()."' target='_blank'><span class='fas fa-info-circle' data-toggle=tooltip ' data-placement='top' title='PDF'></span>";
                                echo "</tr>";
                                $i++;
                            }
                            ?>
                        </tr>
                    </table>
                    <div class="d-flex flex-row justify-content-center">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <?php if ($pagina > 1) {
                                    echo '<li class="page-item"> <a class="page-link" href="index.php?pid=' . base64_encode("Presentacion/Estudiante/listarEstudiante.php") . '&pagina=' . ($pagina - 1) . '&cantidad=' . $cantidad . '" tabindex="0" aria-disabled="false">Previous</a></li>';
                                } ?>
                                <?php for ($i = 1; $i <= $cantPagina; $i++) {
                                    if ($pagina == $i) {
                                        echo "<li class='page-item active'>" .
                                            "<a class='page-link'>$i</a>" .
                                            "</li>";
                                    } else {
                                        echo "<li class='page-item'>" .
                                            "<a class='page-link' href='index.php?pid=" . base64_encode("Presentacion/Estudiante/listarEstudiante.php") . "&pagina=" . $i . "&cantidad=" . $cantidad . "'>" . $i . "</a>" .
                                            "</li>";
                                    }
                                } ?>
                                <?php if ($pagina < $cantPagina) {
                                    echo '<li class="page-item"> <a class="page-link" href="index.php?pid=' . base64_encode("Presentacion/Estudiante/listarEstudiante.php") . '&pagina=' . ($pagina + 1) . '&cantidad=' . $cantidad . '" tabindex="0" aria-disabled="false">Next</a></li>';
                                } ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function Selected() {
        var valor = document.getElementById("cantidad").value;
        url = "index.php?pid= <?php echo base64_encode("Presentacion/Estudiante/listarEstudiante.php") ?> &cantidad=" + valor;
        location.replace(url);
    }

    $(function() {
        $(".detalle").on("click", function() {
            var id = $(this).data("idestudiante");
            var url = "index.php?pid=<?php echo base64_encode("Presentacion/AjaxNotas/crearNota.php") ?>&idEstudiante=" + id;
            location.href = url;
        })
    })
</script>