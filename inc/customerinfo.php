<div id="Customerinfo_bigDiv">
	
<?php 

	$Get=$_GET['SERVER'];
	$customer_id=substr($Get, 12);
	$ViewInfocustomer_id=substr($Get, 20);
	$New_accwithCus_id=substr($Get, 26);


if (strpos($Get, "customerinfoNew_accwithCus")!==false) {

	?>

	<script type="text/javascript">
		document.getElementById('accnt_with_custmer_back').style.display='block';
	</script>

	<?php


}



elseif (strpos($Get, "customerinfoViewInfo")!==false) {
	$COSTOMER="";
			$query = mysql_query("SELECT * FROM customerinfo WHERE id='$ViewInfocustomer_id' AND active!='no'");
			if (mysql_num_rows($query)===0) {
				?>
					<script type="text/javascript">
						alert("Customer has been deleted\nYou can add customer again as new\n\nor contact Nsromapa to retrieve\nthis customer info back");
						location.replace("home.php?SERVER=home");
					</script>
					<?php 
			}else {
				$grab=mysql_fetch_assoc($query);
					$id=$grab['id'];
					$Customername=$grab['Customername'];
					$Companyname=$grab['Companyname'];
					$mobile=$grab['mobile'];
					$tel=$grab['tel'];
					$address=$grab['address'];
					$Folio=$grab['Folio'];
					$active=$grab['active'];

					if ($active=="yes") {
						$status="Active";
					}elseif ($active=="not") {
						$status="Black Listed";
					}
					 if ($id <= 9) {
			        $custNumber = "000$id";
			      }elseif ($id <=99) {
			        $custNumber = "00$id";
			      }elseif ($id <=999) {
			        $custNumber = "0$id";
			      }elseif ($id <=9999) {
			        $custNumber = "$id";
				 }

				 $date=date("jS F, Y");



			echo " <div id=\"content\">
      
      
        <div class=\"printList\">
        <table cellpadding=\"0\" cellspacing=\"0\">
           <tr class=\"top\">
                <td colspan=\"2\">
                    <table>
                        <tr>
                            <td class=\"title\">
                                <img src=\"images/KOCLLOGO.png\" style=\"width:350px; max-width:120px; margin-bottom: 30px;\">
                                
                            </td>
                            
                            <td>
                                Customer No: $custNumber<br>
                                Printed on:  $date<br>
                                Due: ........................
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class=\"information\">
                <td colspan=\"2\">
                    <table>
                        <tr>
                            <td>
                                <span style=\"font-size:18px; font-family:Lucida Fax; font-weight:bolder;\">
                                  Kwasi Oppong Company Limited
                                </span><br>
                                P. O. Box KS 5680,<br>
                                Tel: 024 480 9988
                            </td>
                            
                            <td>
                                L/Folio: $Folio<br>
                                Status: $status<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class=\"heading\">
                <td>
                    Customer Name
                </td>
                
                <td>
                  $Customername
                </td>
            </tr>
            
            <tr class=\"item\">
                <td>
                    Company Name
                </td>
                
                <td>
                   $Companyname
                </td>
            </tr>
            
            <tr class=\"item\">
                <td>
                    Mobile
                </td>
                
                <td>
                    $mobile
                </td>
            </tr>
            
            <tr class=\"item\">
                <td>
                    Tel
                </td>
                
                <td>
                    $tel
                </td>
            </tr>

            
            <tr class=\"item\">
                <td>
                    Address
                </td>
                
                <td>
                    $address
                </td>
            </tr>
            
        </table>
        <br><br>
            <h6 style=\"text-align: center; font-decoration: italic;\" >Designed and Managed <span style=\"color:#ff0000;\">Nsromapa</span></h6>
    </div>
      </div>
      <div id=\"editor\"></div>
        <button onclick=\"printDiv(content)\" id=\"buttonPrint\">Print</button>
        <button onclick=\"location.replace('home.php?SERVER=newCustomerAddEDITcUSTomerIngo$ViewInfocustomer_id')\" id=\"buttonPrint\">Edit</button>
      
      <br /><br /><br /><br /><br /><br />
      
  
";


			}


}else {

			$COSTOMER="";
			$query = mysql_query("SELECT * FROM customerinfo WHERE id='$customer_id' AND active!='no'");
			if (mysql_num_rows($query)===0) {
				?>
					<script type="text/javascript">
						alert("Customer has been deleted\nYou can add customer again as new\n\nor contact Nsromapa to retrieve\nthis customer info back");
						location.replace("home.php?SERVER=home");
					</script>
					<?php 
			}else {
				$grab=mysql_fetch_assoc($query);
					$id=$grab['id'];
					$Customername=$grab['Customername'];
					$Companyname=$grab['Companyname'];
					$active=$grab['active'];

					if ($active=="yes") {
						$status="Active";
					}elseif ($active=="not") {
						$status="Black Listed";
					}
			}

		echo "		<center>
			<h2>$Customername ($Companyname)</h2>
			<ul id=\"myUL\" style=\"margin-top: 40px; width: 400px;\">
				<li><a href=\"home.php?SERVER=customerinfoViewInfo$customer_id\">View Information</a></li>
				";
			if ($status=="Black Listed") {
				echo "
                <li><a href=\"topdfs/IndividualcustomerAccountswithUs.php?withusIs=$id\" target=\"_blank\">Account with us</a></li>
                <li><a href=\"#\" onclick=\"document.getElementById('settleDept_list_back').style.display='block';\">Settle Debt</a></li>
				<li><a href=\"#\" onclick=\"document.getElementById('status_updating_back2').style.display='block'\">Remove from <span style=\"color: #03b9b9;\">BlackList</span></a></li>";
			} else {
				echo "<li><a href=\"home.php?SERVER=customerinfoNew_accwithCus$customer_id\">New Account</a></li>
                <li><a href=\"topdfs/IndividualcustomerAccountswithUs.php?withusIs=$id\" target=\"_blank\">Account with us</a></li>
                <li><a href=\"#\" onclick=\"document.getElementById('settleDept_list_back').style.display='block';\">Settle Debt</a></li>
				<li><a href=\"#\" onclick=\"document.getElementById('status_updating_back').style.display='block'\">Add to <span style=\"color: #ff0000;\">BlackList</span></a></li>";
			}

		echo"
			</ul>
		</center>";	

}
?>

</div>


<script type="text/javascript">
  function printDiv(content) {
     var printContents = document.getElementById("content").innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
  }
</script>


