<?php

require_once "Logica/Estudiante.php";
require_once "Logica/Curso.php";
require_once "Logica/Nota.php";



 $pid="";
 if(isset($_GET["pid"])){
     $pid = base64_decode($_GET["pid"]);
 }
?>
<html>
    <head>
        <link rel="icon" type="image/png" href="img/logo.png" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" />
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?PHP
            if($pid != ""){
                include "Presentacion/main.php";
                include $pid;
            }else{
                include "Presentacion/main.php";
                include "Presentacion/inicio.php";
            }
        ?>  
    </body>
</html>