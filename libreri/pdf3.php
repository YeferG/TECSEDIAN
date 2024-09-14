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
    $this->Cell(70,10,'Registro de compras',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(10,7,'Id', 1, 0, 'C', 0);
    $this->Cell(50,7,'Fecha compra', 1, 0, 'C', 0);
    $this->Cell(20,7,'Cantidad', 1, 0, 'C', 0);
    $this->Cell(30,7,'Precio', 1, 0, 'C', 0);
    $this->Cell(35,7,'Proveedor', 1, 0, 'C', 0);
    $this->Cell(35,7,'Producto', 1, 1, 'C', 0);
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

$sql="SELECT * FROM Tcompras
            JOIN tproveedores ON Tcompras.idProv = tproveedores.idProv
            JOIN tproductos ON Tcompras.proId = tproductos.proId ORDER BY fechaCom desc";

        
        $result=mysqli_query($con,$sql);             

                        
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
while ($mostar= mysqli_fetch_assoc($result)) {
    $pdf->Cell(10,7,$mostar['idCom'], 1, 0, 'C', 0);
    $pdf->Cell(50,7,$mostar['fechaCom'], 1, 0, 'C', 0);
    $pdf->Cell(20,7,$mostar['cantidadCom'], 1, 0, 'C', 0);
    $pdf->Cell(30,7,$mostar['preCom'], 1, 0, 'C', 0);
    $pdf->Cell(35,7,$mostar['nombreProv'], 1, 0, 'C', 0);
    $pdf->Cell(35,7,$mostar['proNombre'], 1, 1, 'C', 0);
    
    
}
$pdf->Output();
?>