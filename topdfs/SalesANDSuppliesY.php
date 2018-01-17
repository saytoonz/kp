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


				$grabO=$_GET['itt'];
				$array = array($grabO);
				$explode = explode(",", $grabO);
				$count = count($explode);
				$itemId= current($explode);
				$Year= next($explode);
        

$qq=mysql_query("SELECT * FROM items WHERE id='$itemId'");
$get=mysql_fetch_assoc($qq);
$itemName=$get['itemName'];
$differentiator=$get['differentiator'];





        
     


      $this->Cell(300,10,$Year.' Sales/Supplies Of  '.mb_strtoupper($differentiator).' '.mb_strtoupper($itemName).' ',0,1,'C');
      $this->Ln(5);

      $this->Image('../images/watermark.png',35,25,220);

   
$this->setFont("Arial","B",10);
$this->SetFillColor(180,180,255);
$this->SetDrawColor(50,50,100);
   
$this->Cell(25,5,'DATE',1,0,'C',true);
$this->Cell(50,10,'DESCRIPTION',1,0,'C',true);
$this->Cell(30,10,'SALES/SUPPLY',1,0,'C',true);
$this->Cell(30,10,'SALES AMOUNT',1,0,'C',true);
$this->Cell(45,10,'TOTAL SALES AMOUNT',1,0,'C',true);
$this->Cell(25,10,'BALANCE',1,0,'C',true);
$this->Cell(65,10,'BRANCH',1,0,'C',true);
$this->Cell(0,5,'',0,1);


$this->cell(0.0001,5,'',0,0);
$this->setFont("Arial","",9);
$this->cell(25,5,'yyyy-mm-dd',1,1,'C',true);

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






        $grabO=$_GET['itt'];
        $array = array($grabO);
        $explode = explode(",", $grabO);
        $count = count($explode);
        $itemId= current($explode);
        $Year= next($explode);
        $Month= next($explode);

        


$tCOST_PRICE="";
$tQuantity="";
$tSALESandSUPPLY="";
$tSALES_AMT="";
$tTOTAL_AMT="";
$query=mysql_query("SELECT * FROM salesandsupplies WHERE itemID='$itemId' AND active='yes' AND WAY_BILL='' AND QTY='' AND COST_PRICE=''ORDER BY invent_Date ASC");
while ($data=mysql_fetch_array($query)) {
  $date=$data['invent_Date'];

  if (strpos($date, $Year)!==false) {
    
  $tQuantity+=$data['QTY'];
  $tSALESandSUPPLY+=$data['SALESandSUPPLY'];
  $tCOST_PRICE+=$data['COST_PRICE'];
  $SALES_AMT=$data['SALES_AMT'];
  $tTOTAL_AMT+=$data['TOTAL_AMT'];
  $tSALES_AMT+=$data['SALES_AMT'];
  $branch=$data['branch'];


$qq=mysql_query("SELECT * FROM braches WHERE id='$branch'");
$get=mysql_fetch_assoc($qq);
$branchName=$get['branchName'];
$Location=$get['Location'];


if ($tCOST_PRICE=="") {
  $tCOST_PRICE="";
} elseif (strpos($tCOST_PRICE, '.')) {
    $tCOST_PRICE=$tCOST_PRICE;
} else {
    $tCOST_PRICE="$tCOST_PRICE.00";
}


if ($SALES_AMT=="") {
  $SALES_AMT="";
} elseif (strpos($SALES_AMT, '.')) {
    $SALES_AMT=$SALES_AMT;
} else {
    $SALES_AMT="$SALES_AMT.00";
}

if ($tSALES_AMT=="") {
  $tSALES_AMT="";
} elseif (strpos($tSALES_AMT, '.')) {
    $tSALES_AMT=$tSALES_AMT;
} else {
    $tSALES_AMT="$tSALES_AMT.00";
}

if ($tTOTAL_AMT=="") {
  $tTOTAL_AMT="";
} elseif (strpos($tTOTAL_AMT, '.')) {
    $tTOTAL_AMT=$tTOTAL_AMT;
} else {
    $tTOTAL_AMT="$tTOTAL_AMT.00";
}




if ($tSALESandSUPPLY=="") {
  $tSALESandSUPPLY="";
} else {
    $tSALESandSUPPLY="$tSALESandSUPPLY";
}


    $pdf->Cell(25,10,$data['invent_Date'],1,0,'C');
    $pdf->Cell(50,10,$data['DESCRIPTION'],1,0,'C');
    $pdf->Cell(30,10,$data['SALESandSUPPLY'],1,0,'C');
    $pdf->Cell(30,10,$SALES_AMT,1,0,'C');
    $pdf->Cell(45,10,$data['TOTAL_AMT'],1,0,'C');
    $pdf->Cell(25,10,$data['BALANCE'],1,0,'C');
    $pdf->Cell(65,10,$branchName.' ('.$Location.')',1,1,'C');
  } else {
    # code...
  }
  

}

$pdf->setFont('Arial','B',11);
$pdf->Cell(75,10,'Totals',1,0);
$pdf->Cell(30,10,$tSALESandSUPPLY,1,0,'C');
$pdf->Cell(30,10,$tSALES_AMT,1,0,'C');
$pdf->Cell(45,10,$tTOTAL_AMT,1,0,'C');
$pdf->Cell(25,10,$tSALESandSUPPLY+$tQuantity-$tSALESandSUPPLY,1,1,'C');


$pdf->Cell(75,10,'BALANCES',1,0);
$pdf->Cell(30,10,$tQuantity-$tSALESandSUPPLY,1,0,'C');
$pdf->Cell(30,10,$tCOST_PRICE-$tSALES_AMT,1,0,'C');
$pdf->Cell(45,10,"",1,0,'C');
$pdf->Cell(25,10,$tQuantity-$tSALESandSUPPLY,1,1,'C');

$pdf->Output();


?>
