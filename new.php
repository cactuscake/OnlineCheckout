<?
	
	require('fpdf/fpdf.php');
	
	// объявляем класс и конструктор класса, в данном случае у меня альбомный лист
	$pdf=new FPDF('L');
	//нужно подключить шрифт, указав имя шрифта и имя файла.
	$pdf->AddFont('cyrillicchancellor','','cyrillicchancellor.php');
	$pdf->AddPage();
	// выбираем шрифт для текста.
	$pdf->SetFont('cyrillicchancellor','',35);
	$pdf->Cell(40,10,'������� �����!');
	$pdf->Output();
	?>