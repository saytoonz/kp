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
$id=$_GET['it'];
$qq=mysql_query("SELECT * FROM items WHERE id='$id'");
$get=mysql_fetch_assoc($qq);
$itemName=$get['itemName'];
$differentiator=$get['differentiator'];

      $this->Cell(190,10,'INVENTORIES OF '.mb_strtoupper($differentiator).' '.mb_strtoupper($itemName).' ',0,1,'C');
      $this->Ln(5);

      $this->Image('../images/watermark.png',12,70,189);

   
$this->setFont("Arial","B",11);
$this->SetFillColor(180,180,255);
$this->SetDrawColor(50,50,100);
   
$this->Cell(60,10,'BRANCH NAME',1,0,'C',true);
$this->Cell(45,10,'TOTAL RECEIVED',1,0,'C',true);
$this->Cell(40,10,'QUANTITY SOLD',1,0,'C',true);
$this->Cell(40,10,'QUANTITY LEFT',1,1,'C',true);

    }



    function Footer(){
      $this->SetY(-15);
      $this->setFont('Arial','I',10);
      $this->Cell(170,10,'Sheet '.$this->PageNo().' / {pages}                 Designed and Managed Nsromapa',0,0,'R');
    }
}

$pdf = new PDF("P","mm","A4");
$pdf->AddPage();

$pdf->AliasNbPages('{pages}');


$pdf->setFont("Arial","",11);
$pdf->SetDrawColor(50,50,100);



$id=$_GET['it'];
$totalRec="";
$quantity="";
$query=mysql_query("SELECT * FROM branchitems WHERE itemid='$id' AND active='yes'  ORDER BY id ASC");
while ($data=mysql_fetch_array($query)) {
	$branch=$data['branch'];
	$totalRec+=$data['totalqtyReceives'];
	$quantity+=$data['quantity'];


    $qq = mysql_query("SELECT * FROM braches WHERE id='$branch' AND active='yes'");
      $grab=mysql_fetch_assoc($qq);
      $branchName=$grab['branchName'];
      $Location=$grab['Location'];

      $branc="$branchName - $Location";



    $pdf->Cell(60,10,$branc,1,0,'L');
    $pdf->Cell(45,10,$data['totalqtyReceives'],1,0,'C');
    $pdf->Cell(40,10,$data['totalqtyReceives']-$data['quantity'],1,0,'C');
    $pdf->Cell(40,10,$data['quantity'],1,1,'C');

}

$pdf->setFont('Arial','B',11);
$pdf->Cell(145,10,'Balance',1,0);
$pdf->Cell(40,10,$quantity,1,1,'C');

$pdf->Output();
?>
