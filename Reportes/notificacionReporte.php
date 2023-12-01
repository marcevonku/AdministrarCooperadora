<?php
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    //$this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,utf8_decode('Notificación de falta de aportes: "COOPERADORA"'),0,0,'C');
    // Salto de línea
    $this->Ln(4);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(4);
$pdf->SetFont('Helvetica','',9);
$pdf->MultiCell(0,6, utf8_decode(
'En el día de la fecha:
'.$data["imprimir"]["fecha"].'
  Se notifica al señor: '.$data["imprimir"]["apellido"].', '. $data["imprimir"]["nombre"].'  DNI: '.$data["imprimir"]["dni"].' mediante correo electrónico a la dirección de Email declarada al momento de la inscripción: '.$data["imprimir"]["mail"].' que su situación respecto de los aportes de cooperadora se encuentran en el estado que se detalla a continuación:
Obligaciones contraidas:  $'.$data["imprimir"]["obligaciones"].'
Aportes voluntarios:        $'.$data["imprimir"]["aportes"].'
Saldos deudor:                $'.$data["imprimir"]["notificacion"].'
'),1,'L',false);
$pdf->Output(''.$data["imprimir"]["apellido"].', '.$data["imprimir"]["nombre"].'.pdf','D');
$pdf->close();
?>
