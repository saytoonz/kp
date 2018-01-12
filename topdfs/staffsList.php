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

      $this->Cell(190,10,'LIST OF STAFFS WHO CAN OPERATE THIS SYSTEM',0,1,'C');
      $this->Ln(5);

      $this->Image('../images/watermark.png',12,70,189);

   
$this->setFont("Arial","B",10);
$this->SetFillColor(180,180,255);
$this->SetDrawColor(50,50,100);
   
$this->Cell(20,10,'STAFF ID',1,0,'C',true);
$this->Cell(40,10,'NAME',1,0,'C',true);
$this->Cell(42,10,'MOBILE / TEL',1,0,'C',true);
$this->Cell(50,10,'EMAIL',1,0,'C',true);
$this->Cell(45,10,'ADDRESS',1,1,'C',true);

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


$pdf->setFont("Arial","",9);
$pdf->SetDrawColor(50,50,100);


$tDEBIT="";
$tCREDIT="";
$query=mysql_query("SELECT * FROM users WHERE active='yes' AND user_id!='ADMINISTRATOR'  ORDER BY id ASC");
while ($data=mysql_fetch_array($query)) {

	$mobile = $data['mobile'];
	$tel = $data['tel'];


	$mobileTel="";

	if ($tel!="" AND $mobile!="") {
		$mobileTel="$mobile/$tel";
	} elseif ($tel!="" AND $mobile="") {
		$mobileTel="$tel";
	}elseif ($tel="" AND $mobile!="") {
		$mobileTel="$mobile";
	}
	

  $pdf->Cell(20,10,$data['user_id'],1,0,'C');
  $pdf->Cell(40,10,$data['fullname'],1,0);
  $pdf->Cell(42,10,$mobileTel,1,0,'C');
  $pdf->Cell(50,10,$data['email'],1,0,'C');
  $pdf->Cell(45,10,$data['address'],1,1,'C');
}



$pdf->Output();
?>
