<?php

include("../../../conexion.php");

require('../../Reportes/FPDF/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
	$this->Image('../../../Img/CineJungla.jpg', 135 , 10, 80 , 20, 'JPG');
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
	$this->Cell(215,65,'Listado de peliculas',0,0,'C');
    // Salto de línea
	$this->Ln(42);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

$sql = mysqli_query($con, "SELECT * FROM PELICULA ORDER BY nom_pelicula ASC");

$pdf = new PDF('L','mm','Legal');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',7);

$pdf->Cell(100,10, "Titulo", 1, 0, 'C', 0);
$pdf->Cell(100,10, "Idioma", 1, 0, 'C', 0);
$pdf->Cell(100,10, utf8_decode("Duración"), 1, 1, 'C', 0);

while($row = mysqli_fetch_assoc($sql))
{
	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(100,10, $row['nom_pelicula'], 1, 0, 'C', 0);
    $pdf->Cell(100,10, $row['idioma_pelicula'], 1, 0, 'C', 0);
    $pdf->Cell(100,10, $row['duracion_pelicula'], 1, 1, 'C', 0);

}
$pdf->Output();

?>