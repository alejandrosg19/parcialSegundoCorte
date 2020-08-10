<?php
require "fpdf/fpdf.php";
require "Logica/Nota.php";

$idCurso = $_GET["idCurso"];
$nota = new Nota("","",$idCurso);


$data = $nota->listar2();



$pdf = new FPDF("P", "mm", "Letter");
$pdf->SetFont("Courier", "B", 20);
$pdf->AddPage();
$pdf->SetXY(0, 0);
$pdf->Cell(215, 20, "Parcial", 0, 2, "C");
$pdf->Cell(215, 15, "Reporte de Notas de Estudiantes del Curso", 0, 1, "C");


$header = array('Estudiante', 'Curso', 'Nota');


// Colors, line width and bold font
$pdf->SetFillColor(255, 0, 0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128, 0, 0);
$pdf->SetLineWidth(.3);
$pdf->SetFont('', 'B');
// Header
$w = array(70, 70, 50);
for ($i = 0; $i < count($header); $i++)
    $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C', TRUE);
$pdf->Ln();
// Color and font restoration
$pdf->SetFillColor(224, 235, 255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
// Data
$fill = false;

for ($i = 0; $i < count($data); $i++) {
    $pdf->Cell($w[0], 18, $data[$i][0], 1);
    $pdf->Cell($w[1], 18, $data[$i][1], 1);
    $pdf->Cell($w[2], 18, number_format($data[$i][2]), 1);
    $pdf->Ln();
}

// Closing line
$pdf->Cell(array_sum($w), 0, '', 'T');

$pdf->Output();