<?php
require_once "Logica/Estudiante.php";
require_once "Logica/Curso.php";
require_once "Logica/Nota.php";

$pid = base64_decode($_GET["pid"]);
include $pid;
?>
