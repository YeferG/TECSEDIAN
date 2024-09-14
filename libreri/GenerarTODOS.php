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
    $this->Cell(70,10,'Registro de usuarios',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(10,7,'Id', 1, 0, 'C', 0);
	$this->Cell(30,7,'Nombres', 1, 0, 'C', 0);
	$this->Cell(30,7,'Apellidos', 1, 0, 'C', 0);
	$this->Cell(20,7,'Rol', 1, 0, 'C', 0);
	$this->Cell(30,7,'Usuario', 1, 0, 'C', 0);
    $this->Cell(30,7,'Estado', 1, 0, 'C', 0);
    $this->Cell(35,7,'Fecha registro', 1, 1, 'C', 0);
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

$sql="SELECT * FROM tusuario";
$result=mysqli_query($con,$sql);             

						
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
while ($mostar= mysqli_fetch_assoc($result)) {
	$pdf->Cell(10,7,$mostar['idUsu'], 1, 0, 'C', 0);
	$pdf->Cell(30,7,$mostar['nombresUsu'], 1, 0, 'C', 0);
	$pdf->Cell(30,7,$mostar['apellidosUsu'], 1, 0, 'C', 0);
	$pdf->Cell(20,7,$mostar['rolUsu'], 1, 0, 'C', 0);
	$pdf->Cell(30,7,$mostar['usuarioUsu'], 1, 0, 'C', 0);
    $pdf->Cell(30,7,$mostar['estadoUsu'], 1, 0, 'C', 0);
    $pdf->Cell(35,7,$mostar['fechaRegistroUsu'], 1, 1, 'C', 0);
}
$pdf->Output();
?>