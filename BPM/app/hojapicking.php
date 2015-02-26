<?php
require("../library/fpdf/fpdf.php");

class PDF extends FPDF
{

// Una tabla más completa
function ImprovedTable($header, $pedido, $colegio, $motivo, $observaciones, $data)
{
	
	$this->Cell(50, 8, 'Nro. Picking: '.$header, 0, 0,'L');
	$this->Cell(130, 8, 'Nro. Pedido: '.$pedido, 0, 0,'R');
	$this->Ln();
	$this->Cell(100, 8, 'Cliente: '.$colegio, 0, 0,'L');
	$this->Cell(80, 8, 'Motivo: '.$motivo, 0, 0,'R');
	$this->Ln();
	$this->MultiCell(180, 8, 'Observaciones: '.$observaciones, 0, 'J',false);
	$this->Ln(12);
    // Anchuras de las columnas
    $w = array(23, 27, 57, 14, 14, 14, 14, 14, 14);
    // Cabeceras
	$this->SetFillColor(240,240,240);
    $this->SetFont('','B');
	
 //   for($i=0;$i<count($header);$i++)
//        $this->Cell($w[$i],8,$header[$i],1,0,'C',true);
//    $this->Ln();

	$this->Cell($w[0],16,'Pedido',1,0,'C',true);
	$this->Cell($w[1],16,'Codigo',1,0,'C',true);
	$this->Cell($w[2],16,'Titulo',1,0,'C',true);
	$this->Cell($w[3],8,'1',1,0,'C',true);
	$this->Cell($w[4],8,'2',1,0,'C',true);
	$this->Cell($w[5],8,'3',1,0,'C',true);
	$this->Cell($w[6],8,'4',1,0,'C',true);
	$this->Cell($w[7],8,'5',1,0,'C',true);
	$this->Cell($w[8],8,'6',1,0,'C',true);
	$this->Ln();

	$this->SetFont('','B',8);
	$this->SetX(107+$this->GetX());
	$this->Cell($w[3]/2,8,'QS',1,0,'C',true);
	$this->Cell($w[3]/2,8,'QP',1,0,'C',true);
	$this->Cell($w[4]/2,8,'QS',1,0,'C',true);
	$this->Cell($w[4]/2,8,'QP',1,0,'C',true);
	$this->Cell($w[5]/2,8,'QS',1,0,'C',true);
	$this->Cell($w[5]/2,8,'QP',1,0,'C',true);
	$this->Cell($w[6]/2,8,'QS',1,0,'C',true);
	$this->Cell($w[6]/2,8,'QP',1,0,'C',true);
	$this->Cell($w[7]/2,8,'QS',1,0,'C',true);
	$this->Cell($w[7]/2,8,'QP',1,0,'C',true);
	$this->Cell($w[8]/2,8,'QS',1,0,'C',true);
	$this->Cell($w[8]/2,8,'QP',1,0,'C',true);
	$this->Ln();

	$this->Cell($w[0],2,'','LR');
	$this->Cell($w[1],2,'','LR');
	$this->Cell($w[2],2,'','LR');
	$this->Cell($w[3]/2,2,'','LR',0,'R');
	$this->Cell($w[3]/2,2,'','LR',0,'R');
	$this->Cell($w[4]/2,2,'','LR',0,'R');
	$this->Cell($w[4]/2,2,'','LR',0,'R');
	$this->Cell($w[5]/2,2,'','LR',0,'R');
	$this->Cell($w[5]/2,2,'','LR',0,'R');
	$this->Cell($w[6]/2,2,'','LR',0,'R');
	$this->Cell($w[6]/2,2,'','LR',0,'R');
	$this->Cell($w[7]/2,2,'','LR',0,'R');
	$this->Cell($w[7]/2,2,'','LR',0,'R');
	$this->Cell($w[8]/2,2,'','LR',0,'R');
	$this->Cell($w[8]/2,2,'','LR',0,'R');
			
	$this->Ln();
    // Datos
    $this->SetTextColor(0);
    $this->SetFont('','',10);
	
	$bordes='LR';
	$pedidobreak='';
	
	
    foreach($data as $row)
    {
		if ($pedidobreak!=$row[0] && $pedidobreak != '')
			$bordes='LRT';
		
        $this->Cell($w[0],8,$row[0],$bordes);
        $this->Cell($w[1],8,$row[1],$bordes);
        $this->Cell($w[2],8,$row[2],$bordes);
        $this->Cell($w[3]/2,8,$row[3],$bordes,0,'R');
		$this->Cell($w[3]/2,8,$row[4],$bordes,0,'R');
		$this->Cell($w[4]/2,8,$row[5],$bordes,0,'R');
		$this->Cell($w[4]/2,8,$row[6],$bordes,0,'R');
        $this->Cell($w[5]/2,8,$row[7],$bordes,0,'R');
		$this->Cell($w[5]/2,8,$row[8],$bordes,0,'R');
		$this->Cell($w[6]/2,8,$row[9],$bordes,0,'R');
		$this->Cell($w[6]/2,8,$row[10],$bordes,0,'R');
        $this->Cell($w[7]/2,8,$row[11],$bordes,0,'R');
		$this->Cell($w[7]/2,8,$row[12],$bordes,0,'R');
		$this->Cell($w[8]/2,8,$row[13],$bordes,0,'R');
		$this->Cell($w[8]/2,8,$row[14],$bordes,0,'R');
		
		$pedidobreak = $row[0];
		$bordes = 'LR';
		
        $this->Ln();
    }
	// Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
	
	$this->Ln(20);
	
	$this->SetX(30+$this->GetX());
	$this->Cell(40, 7, 'Preparado por', 'T', 0, 'C');
	
	$this->SetX(40+$this->GetX());
	$this->Cell(40, 7, 'V. B.', 'T', 0, 'C');

}

// Cabecera de página
function Header()
{
    // Logo
    
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    //$this->Cell(80);
    // Título
    $this->Cell(190,10,'Hoja de Picking','B',0,'C');
    // Salto de línea
    $this->Ln(12);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pag. '.$this->PageNo().'/{nb}',0,0,'C');
}
}

require_once("../Conexion.php");
//include("../session.php");

$conexion = connectDB();

$pPicking = $_GET["picking"];

//mysqli_set_charset($conexion, "utf8");

if(!$result = mysqli_query($conexion, "CALL grupo_bpm.usp_sel_HojaPicking('$pPicking');")) die();

while($row = mysqli_fetch_array($result)) 
{ 

	$NroPicking = $row['picking'];
	$pedido		= $row['pedido'];
	$colegio	= $row['colegio'];
	$motivo		= $row['motivo'];
    $codigo		= $row['codigo'];
    $producto	= $row['producto'];
    $nivel_1	= $row['saldo_nivel_1'];
    $nivel_2	= $row['saldo_nivel_2'];
    $nivel_3	= $row['saldo_nivel_3'];
	$nivel_4	= $row['saldo_nivel_4'];
	$nivel_5	= $row['saldo_nivel_5'];
	$nivel_6	= $row['saldo_nivel_6'];
	$observaciones = $row['observaciones'];
	
	$pedidos[]=array($pedido, $codigo, $producto, $nivel_1, '.....', $nivel_2, '.....', $nivel_3, '.....', $nivel_4, '.....', $nivel_5, '.....', $nivel_6, '.....');
}

disconnectDB($conexion);

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->ImprovedTable($NroPicking, $pedido, $colegio, $motivo, $observaciones, $pedidos);
$pdf->Output();
?>