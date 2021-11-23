<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
   // Logo
   $this->Image('logoEmp.png',20,8,40);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(65);
    // Título
    $this->Cell(60,10,'REPORTES DE ESTABLECIMIENTOS',0,10,'C');
    // Salto de línea
    $this->Ln(20);
   
    $this->Cell(50,10,"NOMBRE", 1,0,'C',0);
    $this->Cell(40,10,"TELEFONO", 1,0,'C',0);
    $this->Cell(40,10,"ACEPTADO EL", 1,0,'C',0);
    $this->Cell(40,10,"VALIDO HASTA", 1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
}
}

//generar reporte
require 'conection.php';
$consulta = "SELECT * FROM places";
$resultado = $mysqli->query($consulta);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',11);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(50,10,$row['place_name'], 1,0,'C',0);
    $pdf->Cell(40,10,$row['phone'], 1,0,'C',0);
    $pdf->Cell(40,10,$row['submission_date'], 1,0,'C',0);
    $pdf->Cell(40,10,$row['valid_until'], 1,1,'C',0);
};

$pdf->Output();
?>