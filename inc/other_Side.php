
<?php 
	$var=mysql_query("SELECT * FROM theme WHERE themes='other_Side_all' AND id='1'");
	if (mysql_num_rows($var)!==0) {
		$theme='other_Side_all';
	} else {
		$theme='other_Side_all_dark';
	}
	
 ?>

<div id="<?php echo "$theme" ?>">


<!----------Create new toggle div---------->
<div id="new_back">
	<center>
		<div id="new">
			<div id="menu_bar">
				<div id="close" title="Close" onclick="document.getElementById('new_back').style.display='none'">
					x
				</div>
				<div id="title">
					Create New
				</div>
			</div>
				<div id="record_holder">


						<div class="new_Staff" onclick="location.replace('home.php?SERVER=newStockAdd');">
							<img src="images/stock.png" style="float: left">
							Inventory <br>	
							<span style="font-size: 14px; color: #6a6962; font-weight: lighter; font-family: Lucida Fax;">Add new stock</span>
						</div>


						<div class="new_costomers" onclick="location.replace('home.php?SERVER=newCustomerAdd')">
							<img src="images/customer.png" style="float: left">
							 &nbsp;Customer <br>	
							<span style="font-size: 14px; color: #6a6962; font-weight: lighter; font-family: Lucida Fax;">  &nbsp;Add Customer info</span>
							
						</div>


						<div class="new_stalk" onclick="location.replace('home.php?SERVER=newStaffAdd');">
							<img src="images/staff.png" style="float: left">
							Staff <br>	
							<span style="font-size: 14px; color: #6a6962; font-weight: lighter; font-family: Lucida Fax;">Add a staff to staff list</span>
							
						</div>


						<div class="new_Branch"  onclick="location.replace('home.php?SERVER=newItemPriceAdd');">
							<img src="images/item_price.png" style="float: left">
							 &nbsp;Item Price <br>	
							<span style="font-size: 14px; color: #6a6962; font-weight: lighter; font-family: Lucida Fax;">Change an item's price</span>
						</div>

						<div class="new_Item"  onclick="location.replace('home.php?SERVER=newBranchAdd');">
							<img src="images/branch.png" style="float: left">
							Branch <br>	
							<span style="font-size: 14px; color: #6a6962; font-weight: lighter; font-family: Lucida Fax;">Create new branch</span>
						</div>

						<div class="new_Item_Price"  onclick="location.replace('home.php?SERVER=newItemAdd');">
							<img src="images/item.png" style="float: left">
							Item <br>	
							<span style="font-size: 14px; color: #6a6962; font-weight: lighter; font-family: Lucida Fax;">Items to be changed</span>
						</div>




				</div>
				<div style="background-color: #eee; height: 38px; text-align: right;color: #03b9b9; font-family: Lucida Bright; font-size: 10px; width: 100%;">
					<span style=" margin-right: 10px; "><br><i>Nsromapa</i></span>
				</div>
		</div>
	</center>
</div><!---------- End of Create new toggle div---------->
	





<!----------Theme Chooser toggle div---------->
<div id="theme_back">
	<center>
		<div id="theme">
			<div id="menu_bar">
				<div id="close" title="Close" onclick="document.getElementById('theme_back').style.display='none'">
					x
				</div>
				<div id="title">
					Theme Chooser
				</div>
			</div>
				<div id="record_holder">

	
							<span style="font-size: 14px; color: #6a6962; font-weight: lighter; font-family: Lucida Fax;">Choose either the light or dark theme for your interface.</span><br><br><br><br>

									
							<input type="image" src="images/salesThem1.png" name="DaytimeTheme" class="theme_to_select" style="width: 250px; height: 170px;" onclick="location.replace('home.php?SERVER=themeChange1s');">
							&nbsp;
							&nbsp;
							&nbsp;
							<input type="image" src="images/salesThem2.png" name="NightTimeTheme" class="theme_to_select" style="width: 250px; height: 170px;" onclick="location.replace('home.php?SERVER=themeChange1b');">



				</div>
		</div>
	</center>
</div><!---------- End of Theme Chooser toggle div---------->








<?php 
		$COSTOMER="";
	$query = mysql_query("SELECT * FROM customerinfo WHERE active!='no'");
	if (mysql_num_rows($query)===0) {
		$COSTOMER="";
	}else{
		while ($grab=mysql_fetch_assoc($query)) {
			$id=$grab['id'];
			$Customername=$grab['Customername'];
			$Companyname=$grab['Companyname'];
			$active=$grab['active'];

			if ($active=="yes") {
				$stutus="Active";
			}elseif ($active=="not") {
				$stutus="Black Listed";
			}

			$COSTOMER.="<li><a href=\"home.php?SERVER=customerinfo$id\">$Customername ($Companyname) | $stutus</a></li>";
		}
	}


 ?>

<!----------Create customer_list toggle div---------->
<div id="customer_list_back">
  <center>
    <div id="customer_list">
      <div id="menu_bar">
        <div id="close" title="Close" onclick="document.getElementById('customer_list_back').style.display='none'">
          x
        </div>
        <div id="title">
          COSTOMERS <input type="text" id="myInput2" onkeyup="myfunction()">
        </div>
      </div>
        <div id="record_holder">


            <ul id="myUL2" style="width: 100%; text-align: left;">

	             <?php echo "$COSTOMER"; ?>

            </ul>

        </div>
        <div style="background-color: #eee; height: 38px; text-align: right;color: #03b9b9; font-family: Lucida Bright; font-size: 10px; width: 100%;">
          <input type="submit" value="Print All Costomers list" style="float: left; margin: 5px;" onclick="window.open('topdfs/costumerInfomationforAll.php','_blank');">
           <input type="submit" value="Print Active Costomers list" style="float: left; margin: 5px;" onclick="window.open('topdfs/costumerInfomationforAcativeOnly.php','_blank');"><br>
          <span style=" margin-right: 5px; "><br><i>Nsromapa</i></span>
        </div>
    </div>

    	<script type="text/javascript">
		function myfunction() {
			var input, filter, ul, li, a, i;

			input = document.getElementById('myInput2');
			filter=input.value.toUpperCase();
			ul= document.getElementById('myUL2');
			li=ul.getElementsByTagName('li');
			
			
			for (i = 0; i < li.length; i++) {
				a=li[i].getElementsByTagName('a')[0];

				if (a.innerHTML.toUpperCase().indexOf(filter)>-1) {
					li[i].style.display="";
				}else{
					li[i].style.display="none";
				}
			}
		}
	</script>

  </center>
</div><!---------- End of customer_list toggle div---------->

<?php 


	$Get=$_GET['SERVER'];
	$ViewInfocustomer_id=substr($Get, 12);

			$query = mysql_query("SELECT * FROM customerinfo WHERE id='$ViewInfocustomer_id' AND active!='no'");
			
				$grab=mysql_fetch_assoc($query);
					$id=$grab['id'];
					$debt=$grab['debt'];
			

if (isset($_POST["paying"])) {
	$method = $_POST['method'];
	$amountin = $_POST['cashin'];
	$disCountAllowed = $_POST['disCountAllowed'];

	if (strpos($amountin, "-")!==false) {
		?>
			<script type="text/javascript">
				alert("Mathematical operational signs are not allowed!");
			</script>
		<?php
	} elseif ($amountin!="") {

	$new_amnt = $debt - $amountin-$disCountAllowed;

		mysql_query("UPDATE customerinfo SET debt='$new_amnt' WHERE id='$ViewInfocustomer_id'");

		if ($method=="Cash") {
			$DESCRIPTION="Cash Payment";
		} elseif ($method=="Check"){
			$DESCRIPTION=$_POST['check_des'];
		}

		$acc_date=date("Y-m-d");

		mysql_query("INSERT INTO customers_account (cust_id, DESCRIPTION,CREDIT, BALANCE, acc_date, discountAllowed) VALUES('$ViewInfocustomer_id','$DESCRIPTION','$amountin',$new_amnt,'$acc_date', '$disCountAllowed')");
		?>
			<script type="text/javascript">
				alert("Amount Owed has been updated to <?php echo $new_amnt; ?>");
				location.replace("home.php?SERVER=customerinfo<?php echo $ViewInfocustomer_id; ?>");
			</script>
		<?php

	}else {
		?>
			<script type="text/javascript">
				alert("Amount Paying cannot be empty!!");
			</script>
		<?php
	}

}

 ?>

            <!----------Create settleDept_list toggle div---------->
        <div id="settleDept_list_back" onmouseenter="myfunctn()">
          <center>
<form action="#" method="POST" enctype="multipart/form-data">
            <div id="settleDept_list">
              <div id="menu_bar">
                <div id="close" title="Close" onclick="document.getElementById('settleDept_list_back').style.display='none'">
                  x
                </div>
                <div id="title">
                  SETTLING DEBT
                </div>
              </div>
                <div id="record_holder">
                    <h5 ng-model="AmtOwed">Amount Owed: GH&#8373; <?php echo $debt ?> </h5>
                    <br>
					<input type="radio" name="method" id="cash" value="Cash" checked="checked" />Cash &nbsp;&nbsp;&nbsp;		
					<input type="radio" name="method" id="check" value="Check" />Cheq<br />
                    <input type="text" name="check_des" placeholder="Check description" id="Methcheck" style="display: none;">
                    <input type="text" name="cashin" placeholder="Amount Paying">
                    <input type="text" name="disCountAllowed" placeholder="Discount Allowed" value="0.00">


                </div>
                <div style="background-color: #eee; height: 38px; text-align: right;color: #03b9b9; font-family: Lucida Bright; font-size: 10px; width: 100%;">
                  <input type="submit" value="Pay" name="paying"  style="float: left; margin: 5px;">
                  <span style=" margin-right: 5px; "><br><i>Nsromapa</i></span>
                </div>
            </div>
</form>
          </center>
        </div><!---------- End of settleDept_list toggle div---------->

<!------------------------Check if method is check display check discription-------------------------------->
	
		<!------Check Number Hide Or Display Code Jquery-------->
			<script type="text/javascript">
							$(document).ready(function() {
						   $('input[type="radio"]').click(function() {
						       if($(this).attr('id') == 'check') {
						            $('#Methcheck').fadeIn();           
						       }

						       else {
						            $('#Methcheck').hide();   
						       }
						   });
						});
				</script>


















<?php 

	if (isset($_POST["setCust"])) {
		mysql_query("UPDATE customerinfo SET active='not' WHERE id='$ViewInfocustomer_id'");
		?>
		<script type="text/javascript">
			alert("Customer Added to Black List Successfully");
			location.replace("home.php?SERVER=customerinfo<?php echo $ViewInfocustomer_id; ?>");
		</script>
		<?php
	}


	if (isset($_POST["RemveCust"])) {
		mysql_query("UPDATE customerinfo SET active='yes' WHERE id='$ViewInfocustomer_id'");
		?>
		<script type="text/javascript">
			alert("Customer Removed from Black List Successfully");
			location.replace("home.php?SERVER=customerinfo<?php echo $ViewInfocustomer_id; ?>");
		</script>
		<?php
	}


	if (isset($_POST["cancCust"])) {
		?>
		<script type="text/javascript">
			location.replace("home.php?SERVER=customerinfo<?php echo $ViewInfocustomer_id; ?>");
		</script>
		<?php
	}



	if (isset($_POST["DelCus"])) {
		mysql_query("UPDATE customerinfo SET active='no' WHERE id='$ViewInfocustomer_id'");
		?>
		<script type="text/javascript">
			alert("Customer Deleted from Customer List Successfully");
			location.replace("home.php?SERVER=home");
		</script>
		<?php
	}

 ?>



            <!----------Create status_updating frOm active tu blacklist toggle div---------->
        <div id="status_updating_back">
          <center>

	<form action="#" method="POST" enctype="multipart/form-data">
            <div id="status_updating">
              <div id="menu_bar">
                <div id="close" title="Close" onclick="document.getElementById('status_updating_back').style.display='none'">
                  x
                </div>
                <div id="title">
                    CUSTOMER STATUS
                </div>
              </div>
                <div id="record_holder">

                    <span style="text-align: center;font-family: Lucida Fax; font-size: 13px; color: #6a6b6b;">You are about to Add customer to blacklist.<br>Click SET to continue...</span>
                        <br>
                        <br>
                        <br>
                        <br>
                    <input type="submit" name="DelCus" value="Delete" title="Delete Customer" style="font-size: 14px; background-color: #eee; color: #8f8c8c; float: left; margin-left: 12px; padding: 10px; padding-left: 20px; padding-right: 20px;">

                    <input type="submit" name="setCust" value="Set" title="Cancel this Operation" style="font-size: 14px; float: right; margin-right: 12px; padding: 10px; padding-left: 32px; padding-right: 32px;">

                    <input type="submit" name="cancCust" value="Cancel" title="Cancel this Operation" style="font-size: 14px; background-color: #eff; color: #03b9b9; float: right; margin-right: 12px; padding: 10px; padding-left: 25px; padding-right: 25px;">

                </div>
	        </div>
	</form>
          </center>
        </div><!---------- End of status_updating toggle div---------->


       <!----------Create status_updating frOm blacklist tu active toggle div---------->
        <div id="status_updating_back2">
          <center>

	<form action="#" method="POST" enctype="multipart/form-data">
            <div id="status_updating">
              <div id="menu_bar">
                <div id="close" title="Close" onclick="document.getElementById('status_updating_back2').style.display='none'">
                  x
                </div>
                <div id="title">
                    CUSTOMER STATUS
                </div>
              </div>
                <div id="record_holder">

                    <span style="text-align: center;font-family: Lucida Fax; font-size: 13px; color: #6a6b6b;">You are about to Remove customer to blacklist.<br>Click Remove to continue...</span>
                        <br>
                        <br>
                        <br>
                        <br>

                    <input type="submit" name="DelCus" value="Delete" title="Delete Customer" style="font-size: 14px; background-color: #eee; color: #8f8c8c; float: left; margin-left: 12px; padding: 10px; padding-left: 20px; padding-right: 20px;">

                    <input type="submit" name="RemveCust" value="Remove" title="Cancel this Operation" style="font-size: 14px; float: right; margin-right: 12px; padding: 10px; padding-left: 32px; padding-right: 32px;">

                    <input type="submit" name="cancCust" value="Cancel" title="Cancel this Operation" style="font-size: 14px; background-color: #eff; color: #03b9b9; float: right; margin-right: 12px; padding: 10px; padding-left: 25px; padding-right: 25px;">

                </div>
	        </div>
	</form>
          </center>
        </div><!---------- End of status_updating toggle div---------->





















<?php 

	$New_accwithCus_id=substr($Get, 26);

	if (isset($_POST["AddAccnt"])) {
		$itemIDPost  = $_POST['itemName'];
		$branchIDPost  = $_POST['branchIDPost'];
		$quantity  = $_POST['quantity'];
		$wayBill  = $_POST['wayBill'];
		$Debt  = $_POST['Debt'];
		$Credit  = $_POST['CreditiingAmnt'];
		$date  = $_POST['date'];


		if ($Credit=="") {
			$Credit=0;
		} else {
			$Credit=$Credit;
		}
		


		if ($itemIDPost!="" AND $quantity!="" AND $date!="") {

			$waybcheck = mysql_query("SELECT * FROM customers_account WHERE cust_id ='$New_accwithCus_id' AND WAYBILL='$wayBill' AND active='yes'");
			if (mysql_num_rows($waybcheck)!==0) {
				?>
					<script type="text/javascript">
						alert("Way Bill Number already Exist!");
						location.replace("home.php?SERVER=customerinfoNew_accwithCus<?php echo $New_accwithCus_id; ?>");
					</script>

				<?php
			} else {
				
				






			$itemsInf = mysql_query("SELECT * FROM items WHERE id ='$itemIDPost' AND active='yes'");
				$fetch=mysql_fetch_assoc($itemsInf);
				$itemName = $fetch['itemName'];
				$differentiator = $fetch['differentiator'];
				$price_per_sing = $fetch['itemPrice'];
			 	$itemquantity = $fetch['quantity'];

			$itemsInf = mysql_query("SELECT * FROM branchitems WHERE branch ='$branchIDPost' AND itemid='$itemIDPost'  AND active='yes'");
				$fetch=mysql_fetch_assoc($itemsInf);
			 	$branchItemQuantity = $fetch['quantity'];

			 	if ($branchItemQuantity>=$quantity) {

			 		

			 	$newQuantity = $itemquantity - $quantity;
			 	$newbranchItemQuantity=$branchItemQuantity-$quantity;


			 		mysql_query("UPDATE items SET quantity='$newQuantity'  WHERE id ='$itemIDPost' AND active='yes'");
			 		mysql_query("UPDATE branchitems SET quantity='$newbranchItemQuantity'   WHERE branch ='$branchIDPost' AND itemid='$itemIDPost'  AND active='yes'");


				      
				$BALANCeqq= mysql_query("SELECT * FROM customerinfo WHERE id ='$New_accwithCus_id' AND active='yes'");
					$grb=mysql_fetch_assoc($BALANCeqq);
					$BALANCEget = $grb['debt'];
				     
				      



					$Debt=$quantity*$price_per_sing;
					$new_bal = ($BALANCEget+$Debt) - $Credit;


			 		$itemName = "$itemName ($differentiator)";
			
			 		mysql_query("UPDATE customerinfo SET debt='$new_bal'  WHERE id ='$New_accwithCus_id' AND active='yes'");

			mysql_query("INSERT INTO customers_account (cust_id, DESCRIPTION, QUANTITY, WAYBILL, DEBIT, CREDIT, BALANCE, acc_date, price_per_sing) VALUES('$New_accwithCus_id','$itemName', '$quantity', '$wayBill', '$Debt', '$Credit', '$new_bal','$date','$price_per_sing')");

			?>

				<script type="text/javascript">
					location.replace("home.php?SERVER=customerinfoNew_accwithCus<?php echo $New_accwithCus_id; ?>");
				</script> 
			<?php

			 	} else {
			?>
				<script type="text/javascript">
					alert("Item Quantity in this branch is not up to the needed quantity\nThe quantity left is <?php echo $branchItemQuantity ?>!");
					location.replace("home.php?SERVER=customerinfoNew_accwithCus<?php echo $New_accwithCus_id; ?>");
				</script>

			<?php
			 	}
			 	
			


		


			}
			

		} else {
			?>
				<script type="text/javascript">
					alert("select an item name and enter quantity as well as the date and Price per one!");
					location.replace("home.php?SERVER=customerinfoNew_accwithCus<?php echo $New_accwithCus_id; ?>");
				</script>

			<?php
		}
		
	} 







	$items="";
	$query = mysql_query("SELECT * FROM items WHERE quantity>='1' AND active='yes'");
	if (mysql_num_rows($query)===0) {
		$items="";
	}else{
		while ($grab=mysql_fetch_assoc($query)) {
			$id=$grab['id'];
			$itemName=$grab['itemName'];
			$differentiator=$grab['differentiator'];
			$itemPrice=$grab['itemPrice'];

			$items.="<option value=\"$id\">$itemName ($differentiator)</option>";
		}
	}


	$thebranch="";
	$query = mysql_query("SELECT * FROM braches WHERE active='yes'");
	if (mysql_num_rows($query)===0) {
		$thebranch="";
	}else{
		while ($grab=mysql_fetch_assoc($query)) {
			$id=$grab['id'];
			$branchName=$grab['branchName'];
			$Location=$grab['Location'];

			$thebranch.="<option value=\"$id\">$branchName($Location)</option>";
		}
	}

	$today=date("Y-m-d");

 ?>

 <!--------------------------------Create accnt_with_custmer toggle div------------------------>
        <div id="accnt_with_custmer_back">
          <center>
            <div id="accnt_with_custmer">
              <div id="menu_bar">
                <div id="close" title="Close"  onclick="location.replace('home.php?SERVER=customerinfo<?php echo $New_accwithCus_id; ?>')">
                  x
                </div>
                <div id="title">
                    ADD NEW ACCOUNT TO CUSTOMER
                </div>
              </div>
                <div id="record_holder">
<form action="#" method="POST">
    
                <select name='itemName' required="required">
                    <option value=''>Select item...</option>
                    <?php echo $items; ?>
                </select>
                <select name='branchIDPost' required="required">
                    <option value=''>Select Branch taking item from...</option>
                    <?php echo $thebranch; ?>
                </select>
                <input type='text' name='quantity' placeholder='QTY' required="required"><input type='text' name='wayBill' placeholder='W/BILL NO.'><input type='text' name='CreditiingAmnt' placeholder='CREDIT'><input type='date' name='date' value="<?php echo $today ?>" placeholder='DATE' required='required'><br>
                    <input type="submit" name="AddAccnt" value="Add">
</form>
                </div>

                <div style="background-color: #eee; height: 35px; text-align: right;color: #03b9b9; font-family: Lucida Bright; font-size: 0px; width: 100%;">
                    <input type="submit" value="Done" style="float: left; padding: 10px; margin-top: -1px; font-size: 11px; border-radius: 3px; margin-left: 15px;" onclick="location.replace('home.php?SERVER=customerinfo<?php echo $New_accwithCus_id; ?>')">
                    <span style=" margin-right: 10px;"><br><i>Nsromapa</i></span>

                </div>
        </div>
          </center>
        </div><!---------- End of accnt_with_custmer toggle div---------->












    <?php

    	$get = $_GET['SERVER'];

    	if (strpos($get, "newStaffAdd")!==false) {

    		include 'inc/newStaffAdd.php';

    	}elseif (strpos($get, "newCustomerAdd")!==false) {

    		include 'inc/newCustomerAdd.php';

    	}elseif (strpos($get, "newStockAdd")!==false) {

    		include 'inc/newStockAdd.php';

    	}elseif (strpos($get, "newItemAdd")!==false) {

    		include 'inc/newItemAdd.php';

    	}elseif (strpos($get, "newBranchAdd")!==false) {

    		include 'inc/newBranchAdd.php';

    	}elseif (strpos($get, "newItemPriceAdd")!==false) {

    		include 'inc/newItemPriceAdd.php';

    	}elseif (strpos($get, "customerinfo")!==false) {

    		include 'inc/customerinfo.php';

    	}elseif (strpos($get, "invents")!==false) {

    		include 'inc/inventories.php';

    	}elseif (strpos($get, "salesAndSupplies")!==false) {

    		include 'inc/salesAndSupplies.php';

    	}elseif (strpos($get, "branchesWorking")!==false) {

    		include 'inc/branches.php';

    	}elseif (strpos($get, "productInfo")!==false) {

    		include 'inc/productInfo.php';

    	}elseif (strpos($get, "StaffsInfo")!==false) {

    		include 'inc/StaffsInfo.php';

    	}elseif (strpos($get, "ItemsiNFO")!==false) {

    		include 'inc/ItemsiNFO.php';

    	}elseif (strpos($get, "themeChange")!==false) {

    		if ($get=='themeChange1s') {
				mysql_query("UPDATE theme SET themes='other_side_all' WHERE id='1'");
			} elseif ($get=='themeChange1b') {
				mysql_query("UPDATE theme SET themes='other_Side_all_dark' WHERE id='1'");
			}
			?>
				<script type="text/javascript">
					location.replace("home.php?SERVER=home")
				</script>
			<?php

    	}else{
    		include 'inc/homeHome.php';
    	}




    ?>




</div><!------------------------------------- End of other Side-------------------------->



    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>



	

<script type="text/javascript">

		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','js/google-analytics.js','ga');

		  ga('create', 'UA-73371388-2', 'auto');
		  ga('send', 'pageview');




/////////////////   Theme button toggle Display set none when anywhere else is clicked      //////////////////
		var theme_back_undisplay = document.getElementById('theme_back');

		
/////////////////   New button toggle Display set none when anywhere else is clicked      //////////////////
			var new_back_undisplay = document.getElementById('new_back');

/////////////////   HomeHome Customer toggle Display set none when anywhere else is clicked      //////////////////
			var customer_list_back_undisplay = document.getElementById('customer_list_back');


/////////////////   Settle Debt toggle Display set none when anywhere else is clicked      //////////////////
			var settleDept_list_back_undisplay = document.getElementById('settleDept_list_back');

/////////////////   Custmer status update toggle Display set none when anywhere else is clicked      //////////////////
			var status_updating_back_undisplay = document.getElementById('status_updating_back');
			var status_updating_back_undisplay2 = document.getElementById('status_updating_back2');


/////////////////   STAFF LIST toggle Display set none when anywhere else is clicked      //////////////////
			var stafflist_Fr_Editundisplay = document.getElementById('stafflist_Fr_Edit');


		window.onclick = function(event) {
		    if (event.target == new_back_undisplay) {
		        new_back_undisplay.style.display = "none";
		    }else if (event.target == theme_back_undisplay) {
		        theme_back_undisplay.style.display = "none";
		    }else if (event.target == customer_list_back_undisplay) {
		        customer_list_back_undisplay.style.display = "none";
		    }else if (event.target == settleDept_list_back_undisplay) {
		        settleDept_list_back_undisplay.style.display = "none";
		    }else if (event.target == status_updating_back_undisplay) {
		        status_updating_back_undisplay.style.display = "none";
		    }else if (event.target == status_updating_back_undisplay2) {
		        status_updating_back_undisplay2.style.display = "none";
		    }else if (event.target == stafflist_Fr_Editundisplay) {
		        stafflist_Fr_Editundisplay.style.display = "none";
		    }
		}


</script>



