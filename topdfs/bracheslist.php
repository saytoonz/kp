<?php 
  include_once '../runners/connect_db.php';
  include_once '../runners/session.php';


require('../fpdf/fpdf.php');



class PDF extends FPDF{

    function Header(){
      $this->setFont('Arial','B',26);
      $this->Cell(20);
      $this->Image('../images/KOCLLOGO.png',10,10,20);
      $this->Cell(175,10,'KWASI OPPONG COMPANY LIMITED',0,1,'C');
      $this->setFont('Arial','B',12);

      $this->Cell(180,10,'IN ACCOUNT WITH ',0,1,'C');
      $this->Ln(5);

      $this->Image('../images/watermark.png',12,70,189);

   
$this->setFont("Arial","B",10);
$this->SetFillColor(180,180,255);
$this->SetDrawColor(50,50,100);
	   
	$this->Cell(25,10,'ID',1,0,'C',true);
	$this->Cell(60,10,'NAME',1,0,'C',true);
	$this->Cell(70,10,'LOCATION',1,0,'C',true);
	$this->Cell(40,10,'CONTACT',1,1,'C',true);
    }



    function Footer(){
      $this->SetY(-15);
      $this->setFont('Arial','I',10);
      $this->Cell(170,10,'Sheet '.$this->PageNo().' / {pages}',0,0,'R');
    }
}

$pdf = new PDF("P","mm","A4");
$pdf->AddPage();

$pdf->AliasNbPages('{pages}');


$pdf->setFont("Arial","",10);
$pdf->SetDrawColor(50,50,100);

$query=mysql_query("SELECT * FROM braches WHERE active='yes'");
while ($data=mysql_fetch_array($query)) {


  $pdf->Cell(25,10,$data['id'],1,0,'C');
  $pdf->Cell(60,10,$data['branchName'],1,0);
  $pdf->Cell(70,10,$data['Location'],1,0);
  $pdf->Cell(40,10,$data['Contact'],1,1);
}



$pdf->Output();
?>
