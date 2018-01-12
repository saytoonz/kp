<?php 
  include_once '../runners/connect_db.php';
  include_once '../runners/session.php';
  $id=$_GET['withusIs'];


require('../fpdf/fpdf.php');



class PDF extends FPDF{

    function Header(){
      $this->setFont('Arial','B',26);
      $this->Cell(20);
      $this->Image('../images/KOCLLOGO.png',10,10,20);
      $this->Cell(175,10,'KWASI OPPONG COMPANY LIMITED',0,1,'C');
      $this->setFont('Arial','B',12);
$id=$_GET['withusIs'];
$qq=mysql_query("SELECT * FROM customerinfo WHERE id='$id'");
$get=mysql_fetch_assoc($qq);
$name=mb_strtoupper($get['Customername']);
$Companyname=mb_strtoupper($get['Companyname']);

      $this->Cell(180,10,'IN ACCOUNT WITH '.$name.' ('.$Companyname.')',0,1,'C');
      $this->Ln(5);

      $this->Image('../images/watermark.png',12,70,189);

   
$this->setFont("Arial","B",10);
$this->SetFillColor(180,180,255);
$this->SetDrawColor(50,50,100);
   
$this->Cell(20,5,'DATE',1,0,'C',true);
$this->Cell(50,10,'DESCRIPTION',1,0,'C',true);
$this->Cell(20,10,'QUANTITY',1,0,'C',true);
$this->Cell(25,10,'WAY BILL NO.',1,0,'C',true);
$this->Cell(20,10,'DEBIT',1,0,'C',true);
$this->Cell(20,10,'DISCOUNT',1,0,'C',true);
$this->Cell(20,10,'CREDIT',1,0,'C',true);
$this->Cell(20,10,'BALANCE',1,0,'C',true);
$this->Cell(0,5,'',0,1);


$this->cell(0.0001,5,'',0,0);
$this->setFont("Arial","",9);
$this->cell(20,5,'yyyy-mm-dd',1,1,'C',true);

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
$tBALANCE="";
$tdisCountAllowed="";
$query=mysql_query("SELECT * FROM customers_account WHERE cust_id='$id' AND active='yes' ORDER BY acc_date ASC");
while ($data=mysql_fetch_array($query)) {
  $BALANCE=$data['BALANCE'];
  $CREDIT=$data['CREDIT'];
  $DEBIT=$data['DEBIT'];
  $tDEBIT+=$data['DEBIT'];
  $tCREDIT+=$data['CREDIT'];
  $tdisCountAllowed+=$data['discountAllowed'];
  $disCountAllowed=$data['discountAllowed'];

if ($disCountAllowed=="") {
  $disCountAllowed="0.00";
} elseif (strpos($disCountAllowed, '.')) {
    $disCountAllowed=$disCountAllowed;
  } else {
    $disCountAllowed="$disCountAllowed.00";
  }



  
if ($BALANCE=="") {
  $BALANCE="0.00";
} elseif (strpos($BALANCE, '.')) {
    $BALANCE=$BALANCE;
  } else {
    $BALANCE="$BALANCE.00";
  }





if ($CREDIT=="") {
  $CREDIT="";
} elseif (strpos($CREDIT, '.')) {
    $CREDIT=$CREDIT;
  } else {
    $CREDIT="$CREDIT.00";
  }

  if ($tCREDIT=="") {
  $tCREDIT="";
} elseif (strpos($tCREDIT, '.')) {
    $tCREDIT=$tCREDIT;
  } else {
    $tCREDIT="$tCREDIT.00";
  }






if ($DEBIT=="") {
  $DEBIT="";
} elseif (strpos($DEBIT, '.')) {
    $DEBIT=$DEBIT;
} else {
    $DEBIT="$DEBIT.00";
}


if ($tDEBIT=="") {
  $tDEBIT="";
} elseif (strpos($tDEBIT, '.')) {
    $tDEBIT=$tDEBIT;
} else {
    $tDEBIT="$tDEBIT.00";
}


if ($tdisCountAllowed=="") {
  $tdisCountAllowed="";
} elseif (strpos($tdisCountAllowed, '.')) {
    $tdisCountAllowed=$tdisCountAllowed;
} else {
    $tdisCountAllowed="$tdisCountAllowed.00";
}


  
  $tBALANCE=$tDEBIT-$tCREDIT-$tdisCountAllowed;

if ($tBALANCE=="") {
  $tBALANCE="0.00";
} elseif (strpos($tBALANCE, '.')) {
    $tBALANCE=$tBALANCE;
} else {
    $tBALANCE="$tBALANCE.00";
}

  $pdf->Cell(20,10,$data['acc_date'],1,0,'C');
  $pdf->Cell(50,10,$data['DESCRIPTION'],1,0);
  $pdf->Cell(20,10,$data['QUANTITY'],1,0,'C');
  $pdf->Cell(25,10,$data['WAYBILL'],1,0,'C');
  $pdf->Cell(20,10,$DEBIT,1,0,'C');
  $pdf->Cell(20,10,$disCountAllowed,1,0,'C');
  $pdf->Cell(20,10,$CREDIT,1,0,'C');
  $pdf->Cell(20,10,$BALANCE,1,1,'C');
}

$pdf->setFont('Arial','B',14);
$pdf->Cell(115,10,'Totals',1,0);
$pdf->Cell(20,10,$tDEBIT,1,0,'C');
$pdf->Cell(20,10,$tdisCountAllowed,1,0,'C');
$pdf->Cell(20,10,$tCREDIT,1,0,'C');
$pdf->Cell(20,10,$tBALANCE,1,1,'C');
$pdf->Output();
?>
