<?php
require('fpdf.php');
include_once('../bd/coneccion.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Registro de productos',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(10,7,'Id', 1, 0, 'C', 0);
	$this->Cell(60,7,'Descripcion', 1, 0, 'C', 0);
	$this->Cell(40,7,'Precio compra', 1, 0, 'C', 0);
	$this->Cell(40,7,'Precio venta', 1, 0, 'C', 0);
	$this->Cell(30,7,'Stock', 1, 1, 'C', 0);
  
}


// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina 1 de '.$this->PageNo().'',0,0,'C');
}
}

$sql="SELECT * FROM tbl_productos";
$result=mysqli_query($con,$sql);             

						
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
while ($mostar= mysqli_fetch_assoc($result)) {
	$pdf->Cell(10,7,$mostar['id_produ'], 1, 0, 'C', 0);
	$pdf->Cell(60,7,$mostar['nom_produ'], 1, 0, 'C', 0);
	$pdf->Cell(40,7,$mostar['precio_compra'], 1, 0, 'C', 0);
	$pdf->Cell(40,7,$mostar['precio_venta'], 1, 0, 'C', 0);
	$pdf->Cell(30,7,$mostar['stock_produ'], 1, 1, 'C', 0);
}
$pdf->Output();
?>