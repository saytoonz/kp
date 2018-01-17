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
$id=$_GET['it'];
$qq=mysql_query("SELECT * FROM items WHERE id='$id'");
$get=mysql_fetch_assoc($qq);
$itemName=$get['itemName'];
$differentiator=$get['differentiator'];

      $this->Cell(300,10,'INVENTORIES OF '.mb_strtoupper($differentiator).' '.mb_strtoupper($itemName).' ',0,1,'C');
      $this->Ln(5);

      $this->Image('../images/watermark.png',35,25,220);

   
$this->setFont("Arial","B",9);
$this->SetFillColor(180,180,255);
$this->SetDrawColor(50,50,100);
   
$this->Cell(20,5,'DATE',1,0,'C',true);
$this->Cell(47,10,'DESCRIPTION',1,0,'C',true);
$this->Cell(47,10,'WAY BILL NO.',1,0,'C',true);
$this->Cell(18,10,'QUANTITY',1,0,'C',true);
$this->Cell(17,10,'TOTAL',1,0,'C',true);
$this->Cell(35,10,'DRIVER INFO',1,0,'C',true);
$this->Cell(45,10,'CONTACTS',1,0,'C',true);
$this->Cell(52,10,'DESTINATION',1,0,'C',true);
$this->Cell(0,5,'',0,1);


$this->cell(0.0001,5,'',0,0);
$this->setFont("Arial","",9);
$this->cell(20,5,'yyyy-mm-dd',1,1,'C',true);

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


$pdf->setFont("Arial","",8);
$pdf->SetDrawColor(50,50,100);



$id=$_GET['it'];
$qq=mysql_query("SELECT * FROM items WHERE id='$id'");
$get=mysql_fetch_assoc($qq);
$itemName=$get['itemName'];
$differentiator=$get['differentiator'];

$tQuantity="";
$query=mysql_query("SELECT * FROM inventories WHERE itemName='$itemName' AND itemDifferentiator='$differentiator' AND active='yes'  ORDER BY invent_Date ASC");
while ($data=mysql_fetch_array($query)) {
  $tQuantity+=$data['Quantity'];
  $destination=$data['destination'];

    $qq = mysql_query("SELECT * FROM braches WHERE id='$destination' AND active='yes'");
      $grab=mysql_fetch_assoc($qq);
      $branchName=$grab['branchName'];
      $Location=$grab['Location'];

      $desti="$branchName - $Location";

    $pdf->Cell(20,10,$data['invent_Date'],1,0,'C');
    $pdf->Cell(47,10,$data['Description'],1,0,'C');
    $pdf->Cell(47,10,$data['WAY_BILL'],1,0,'C');
    $pdf->Cell(18,10,$data['Quantity'],1,0,'C');
    $pdf->Cell(17,10,$data['Total'],1,0,'C');
    $pdf->Cell(35,10,$data['Driver_Info'],1,0,'C');
    $pdf->Cell(45,10,$data['Contact'],1,0,'C');
    $pdf->Cell(52,10,$desti,1,1,'C');

}

$pdf->setFont('Arial','B',11);
$pdf->Cell(114,10,'Total',1,0);
$pdf->Cell(18,10,$tQuantity,1,0,'C');
$pdf->Output();
?>
