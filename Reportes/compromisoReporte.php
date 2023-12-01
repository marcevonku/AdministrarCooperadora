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
    //Logos institucionales
    $this->Image('Reportes/logoBlanco.png',10,13,25,17);
    $this->Image('Reportes/logocoop.png',40,12,30,20);
    $this->Ln(8);
    // Movernos a la derecha
    $this->Cell(120);    
    // Título
    $this->Cell(10,10,utf8_decode('"ACTA" Compromiso de Pago: "COOPERADORA"'),0,0,'C');
    // Salto de línea
    $this->Ln(18);
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

// Una tabla más completa
function ImprovedTable($header, $data)
{
    // Anchuras de las columnas
    $w = array(15, 50, 60, 20, 20, 25);

    // Cabeceras
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],6,$header[$i],'1',0,'C');
        $this->Ln();

    // Datos
    foreach($data as $row)
    {
        $this->Cell($w[0],5,utf8_decode($row[0]),'1',0,'R');
        $this->Cell($w[1],5,utf8_decode($row[1]),'1',0,'L');
        $this->Cell($w[2],5,utf8_decode($row[2]),'1',0,'L');
        $this->Cell($w[3],5,utf8_decode($row[3]),'1',0,'C');
        $this->Cell($w[4],5,utf8_decode($row[4]),'1',0,'C');
        $this->Cell($w[5],5,utf8_decode($row[5]),'1',0,'R');   
        $this->Ln();
    }

    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}

// Una tabla más completa
function ImprovedTablee($headerr, $dataa)
{
    // Anchuras de las columnas
    $w = array(15, 50, 60, 20, 20, 25);

    // Cabeceras
    for($i=0;$i<count($headerr);$i++)
        $this->Cell($w[$i],6,$headerr[$i],'1',0,'C');
        $this->Ln();

    // Datos
    foreach($dataa as $row)
    {
        $this->Cell($w[0],5,utf8_decode($row[0]),'1',0,'R');
        $this->Cell($w[1],5,utf8_decode($row[1]),'1',0,'L');
        $this->Cell($w[2],5,utf8_decode($row[2]),'1',0,'L');
        $this->Cell($w[3],5,utf8_decode($row[3]),'1',0,'C');
        $this->Cell($w[4],5,utf8_decode($row[4]),'1',0,'C'); 
        $this->Cell($w[5],5,utf8_decode($row[5]),'1',0,'R');  
        $this->Ln();
    }

    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}

}


$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(5);
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(0,6, utf8_decode(
'
En el Instituto, se hace presente el alumno/a '.$data["imprimir"]["apellido"].' '.$data["imprimir"]["nombre"].', DNI número '.$data["imprimir"]["dni"].', de la carrera  '.$data["imprimir"]["nombrecarrera"].' cohorte  '.$data["imprimir"]["anio"].' para firmar la presente acta compromiso de pago de las siguientes obligaciones contraidas según registro de inscripción de los ciclos que se detallan a continuación: 

'),1,'L',false);

// Títulos de las columnas
$header = array(utf8_decode('N° insc.'),'APELLIDO', 'NOMBRE', 'DNI', 'CICLO','MONTO');

$pdf->SetFont('Arial','',7);
$pdf->ImprovedTable($header,$data1[0]);

$pdf->Ln();
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(0,6, utf8_decode('En el siguiente cuadro se pueden apreciar los aportes reflejados en el registro de recibos emitidos a su nombre hasta la fecha'),1,'L',false);

// Títulos de las columnas
$headerr = array(utf8_decode('N° REC.'),'APELLIDO', 'NOMBRE', 'DNI', 'fecha','MONTO');

$pdf->SetFont('Arial','',7);
$pdf->ImprovedTablee($headerr,$data2[0]);

$pdf->Ln();
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(0,6, utf8_decode(
    '   TOTAL OBLIGACIONES: '.$data["imprimir"]["obligaciones"].'
        TOTAL APORTES     : '.$data["imprimir"]["aportes"].'
        MONTO ACTA COMPROMISO DE PAGO: '.$data["imprimir"]["notificacion"].'
        
        El día de la fecha '.$data["imprimir"]["fecha"].' Se firma el acta compromiso de pago por un total de '.$data["imprimir"]["notificacion"].'.-

        
                                                                        --------------------------------------------
                                                                                               FIRMA'),1,'L',false);
$pdf->Output(''.$data["imprimir"]["apellido"].', '.$data["imprimir"]["nombre"].'.pdf','D');
$pdf->close();
?>