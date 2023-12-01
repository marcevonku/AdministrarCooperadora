<?php

$f = $data["recibo"]["fecha"];

$fecha = date("d-m-Y", strtotime($f));

//var_dump($fecha);
//var_dump($data['usuario']['nombre']); 
//var_dump($data['usuario']['apellido']);

require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logos
    $this->Image('Reportes/logocoop.png',10,10,35,25);
    $this->Image('Reportes/logoBlanco.png',50,13,25,17);  
}

}

// Creación del objeto de la clase heredada
$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(1);
$pdf->cell(80);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(1,1, utf8_decode('|'),0,1,'L',false);
$pdf->cell(85);
$pdf->Cell(40,16, utf8_decode('Recibo N°: '.$data["sucursal"].' - '.$data["factura"].''),0,0,'L',false);
$pdf->Ln(1);
$pdf->cell(80);
$pdf->Cell(1,1, utf8_decode('|'),0,1,'L',false);
$pdf->Ln(1);
$pdf->cell(80);
$pdf->Cell(1,1, utf8_decode('|'),0,1,'L',false);
$pdf->Ln(1);
$pdf->cell(80);
$pdf->Cell(1,1, utf8_decode('|'),0,1,'L',false);
$pdf->Ln(1);
$pdf->cell(80);
$pdf->Cell(1,1, utf8_decode('|'),0,1,'L',false);
$pdf->Ln(1);
$pdf->cell(80);
$pdf->Cell(1,1, utf8_decode('|'),0,1,'L',false);
$pdf->Ln(1);
$pdf->cell(80);
$pdf->Cell(1,1, utf8_decode('|'),0,1,'L',false);
$pdf->cell(85);
$pdf->setFillColor(230);
$pdf->Cell(45,8, utf8_decode('FECHA: '.$fecha.''),1,0,'L',1);
$pdf->Ln(1);
$pdf->cell(80);
$pdf->Cell(1,1, utf8_decode('|'),0,1,'L',false);
$pdf->Ln(1);
$pdf->cell(80);
$pdf->Cell(1,1, utf8_decode('|'),0,1,'L',false);
$pdf->Ln(1);
$pdf->cell(80);
$pdf->Cell(1,1, utf8_decode('|'),0,1,'L',false);
$pdf->Ln(1);
$pdf->cell(80);
$pdf->Cell(1,1, utf8_decode('|'),0,1,'L',false);
$pdf->Ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,10, utf8_decode('COOPERADORA'),0,1,'L',false);
$pdf->Ln(1);
$pdf->SetFont('Arial','',8);
$pdf->Cell(10,2, utf8_decode('Colocar datos de contacto, dirección, esto aparecerá en el pié de página del recibo'),0,1,'L',false);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1,2, utf8_decode('________________________________________________________________________________________________'),0,1,'L',false);
$pdf->Ln(2);
$pdf->SetFont('Arial','',11);
$pdf->Cell(21,4, utf8_decode('Del Sr/a:'),0,0,'L',false);
$pdf->SetFillColor(230);
$pdf->Cell(120,4, utf8_decode(''.$data["persona"]["apellido"].', '.$data["persona"]["nombre"].''),1,0,'L',1);
$pdf->Cell(16,4, utf8_decode('DNI: '),0,0,'C',false);
$pdf->SetFillColor(230);
$pdf->Cell(25,4, utf8_decode(''.$data["persona"]["dni"].''),1,1,'C',1);
$pdf->Ln(2);
$pdf->Cell(67,4, utf8_decode('Recibimos la suma de pesos: '),0,0,'L',false);
$pdf->Cell(40,4, utf8_decode('$'.$data["recibo"]["monto"].''),1,0,'R',1);
$pdf->Cell(10,4, utf8_decode('En concepto de Inscripción / Cuota '),0,1,'L',false);
$pdf->Ln(2);
$pdf->Cell(68,4, utf8_decode('De la Carrera/Curso/Postitulo/Evento: '),0,0,'L',false);
$pdf->MultiCell(120,4, utf8_decode(''.$data["carrera"]["nombrecarrera"].''),1,'L',true);
$pdf->Ln(2);
$pdf->Cell(30,4, utf8_decode('Transacción N°: '.$data["recibo"]["trans"].''),0,0,'L',false);
$pdf->MultiCell(158,4, utf8_decode(''.$data["recibo"]["trans"].''),1,'L',true);
$pdf->Ln(2);
$pdf->MultiCell(190,4, utf8_decode('Detalle de la operación: '.$data["recibo"]["detalle"].''),0,'L',false);
$pdf->Ln(17);
$pdf->Cell(1,5, utf8_decode('Auxiliar :  '.$data['usuario']['nombre'].','.$data['usuario']['apellido'].''),0,0,'L',false);
$pdf->Cell(100);
$pdf->Cell(40,5, utf8_decode('$ '.$data["recibo"]["monto"].''),1,1,'R',1);
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1,2, utf8_decode('________________________________________________________________________________________________'),0,1,'L',false);
$pdf->Ln(2);
$pdf->SetFont('Arial','',10);
$pdf->Cell(40);
$pdf->Cell(25,2, utf8_decode('Aquí podemos colocar datos de la cuenta donde se puede hacer la transferencia'),0,0,'L',false);
$pdf->Output(''.$data["digitosnombre"].' - '.$data["persona"]["apellido"].', '.$data["persona"]["nombre"].'.pdf','D');
$pdf->close();
?>