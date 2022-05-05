<?
define('FPDF_FONTPATH', __system_directory__ .'API/font/');
	
	require('E:/Server/home/test/www/fpdf/fpdf.php');
	
	$pdf=new FPDF('L');
	
	$pdf->AddFont('ArialMT','','119379869a251bdd6a14438b3c5514f2_arial.php');
	$pdf->AddPage();
	
	$pdf->SetFont('ArialMT','',35);
	$pdf->Cell(40,10,'русский текст!');
	$pdf->Output();
?>