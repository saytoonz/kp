<?php 
  include_once '../runners/connect_db.php';
  include_once '../runners/session.php';


require('../fpdf/fpdf.php');



class PDF extends FPDF{

    function Header(){
      $this->setFont('Arial','B',26);
      $this->Cell(70);
      $this->Image('../images/KOCLLOGO.png',50,10,20);
      $this->Cell(180,10,'KWASI OPPONG COMPANY LIMITED',0,1);
      $this->setFont('Arial','B',12);
      $this->Cell(300,10,'ACTIVE CUSTOMERS LIST',0,1,'C');
      $this->Ln(5);

      $this->Image('../images/watermark.png',35,25,220);

   
$this->setFont("Arial","B",10);
$this->SetFillColor(180,180,255);
$this->SetDrawColor(50,50,100);
   
$this->Cell(20,10,'ID',1,0,'C',true);
$this->Cell(55,10,'NAME',1,0,'C',true);
$this->Cell(53,10,'COMPANY',1,0,'C',true);
$this->Cell(25,10,'MOBILE',1,0,'C',true);
$this->Cell(25,10,'TEL',1,0,'C',true);
$this->Cell(55,10,'ADDRESS',1,0,'C',true);
$this->Cell(25,10,'L/FOLIO',1,0,'C',true);
$this->Cell(20,10,'DEPT',1,1,'C',true);
    }



    function Footer(){
      $this->SetY(-15);
      $this->setFont('Arial','I',10);
      $this->Cell(170,10,'Sheet '.$this->PageNo().' / {pages}                 Designed and Managed Nsromapa',0,0,'R');
    }
}

$pdf = new PDF("L","mm","A4");
$pdf->AddPage();

$pdf->AliasNbPages('{pages}');


$pdf->setFont("Arial","",9);
$pdf->SetDrawColor(50,50,100);

$branchId=$_GET['it'];

$query=mysql_query("SELECT * FROM customerinfo WHERE branch='$branchId' AND active='yes'");
while ($data=mysql_fetch_array($query)) {

  $DEBIT=$data['debt'];

  if ($DEBIT=="") {
  $DEBIT="";
} elseif (strpos($DEBIT, '.')) {
    $DEBIT=$DEBIT;
} else {
    $DEBIT="$DEBIT.00";
}

  $pdf->Cell(20,10,$data['id'],1,0,'C');
  $pdf->Cell(55,10,$data['Customername'],1,0);
  $pdf->Cell(53,10,$data['Companyname'],1,0);
  $pdf->Cell(25,10,$data['mobile'],1,0,'C');
  $pdf->Cell(25,10,$data['tel'],1,0,'C');
  $pdf->Cell(55,10,$data['address'],1,0,'C');
  $pdf->Cell(25,10,$data['Folio'],1,0,'C');
  $pdf->Cell(20,10,$DEBIT,1,1,'C');
}



$pdf->Output();
?>
