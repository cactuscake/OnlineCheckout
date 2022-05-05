<?php
require('fpdf/fpdf.php');

$Name = $_POST[ 'Name' ];
$lastName = $_POST[ 'lastName' ];
$middleName = $_POST[ 'middleName' ];
$passportNumber = $_POST[ 'passportNumber' ];
$passportSeries = $_POST[ 'passportSeries' ];


//create a FPDF object
$pdf=new FPDF();

//set document properties
$pdf->AddFont('tahoma','','tahoma.php');

$pdf->SetTitle($Name);
//set font for the entire document
$pdf->SetFont('tahoma','',35);
$pdf->SetTextColor(50,60,100);
//set up a page
$pdf->AddPage('P');
$pdf->SetDisplayMode(real,'default');
//insert an image and make it a link
$pdf->Image('qrcode.png',90,30,33,0);
//display the title with a border around it
$pdf->SetXY(50,20);
//$pdf->SetDrawColor(50,60,100);
$pdf->Cell(100,10,'Ёлектронный билет',0,0,'',0);
//Set x and y position for the main text, reduce font size and write content
$pdf->SetXY (10,50);
$pdf->SetFontSize(10);
$pdf->Write(5,'');
$pdf->Write(5,'билет');
//Output the document
$pdf->Output('example1.pdf','I');