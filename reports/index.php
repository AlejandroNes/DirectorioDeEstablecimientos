<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
   // Logo
   $this->Image('logoEmp.png',20,8,50);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(65);
    // Título
    $this->Cell(60,10,'REPORTES DE USUARIOS',0,10,'C');
    // Salto de línea
    $this->Ln(20);
   
    $this->Cell(40,10,"USUARIO", 1,0,'C',0);
    $this->Cell(40,10,"CUIDAD", 1,0,'C',0);
    $this->Cell(40,10,"CORREO", 1,0,'C',0);
    $this->Cell(40,10,"FECHA", 1,1,'C',0);
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
$consulta = "SELECT * FROM users";
$resultado = $mysqli->query($consulta);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',11);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(40,10,$row['first_name'], 1,0,'C',0);
    $pdf->Cell(40,10,$row['city_name'], 1,0,'C',0);
    $pdf->Cell(40,10,$row['email'], 1,0,'C',0);
    $pdf->Cell(40,10,$row['created'], 1,1,'C',0);
};

$pdf->Output();
?>