<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto ">
            <li class="nav-item dropdown active ">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Estudiante
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode('Presentacion/Estudiante/crearEstudiante.php')?>">Crear</a> 
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode('Presentacion/Estudiante/listarEstudiante.php')?>">Consultar</a> 
                </div>
             </li>
             <li class="nav-item dropdown active ">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Curso
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode('Presentacion/Curso/crearCurso.php')?>">Crear</a> 
                    <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode('Presentacion/Curso/listarCurso.php')?>">Consultar</a> 
                </div>
             </li>
             <li class="nav-item dropdown active ">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Notas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="index.php?pid=<?php echo base64_encode('Presentacion/Notas/crearNota.php')?>">Asignar Nota</a> 
                </div>
             </li>
             <li class="nav-item dropdown active ">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Reportes
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="reportePDF.php" target="_blank">Generar Reporte</a> 
                </div>
             </li>
        </ul>
        <ul class="navbar-nav">
			<li class="nav-item active "><a class="nav-link text-white" >Bienvenido Adminitrador</a></li>
		</ul>
    </div>
</nav>