<div id="newCustomerAdd_bigDiv">
	

<center>


<?php 
	
	if (isset($_POST['add_customer'])) {
			$Customername =$_POST['Customername'];
			$Companyname =$_POST['Companyname'];
			$mobile =$_POST['mobile'];
			$tel =$_POST['tel'];
			$address =$_POST['address'];
			$Folio =$_POST['Folio'];


			if ($Customername !="" || $mobile !="") {

				$selectuserid = mysql_query("SELECT Customername,mobile FROM customerInfo WHERE Customername='$Customername' AND (mobile='$mobile' OR tel='$tel') AND active='yes'");
			 					
				if (mysql_num_rows($selectuserid)!==0) {
					?>
						<script>
							alert("A Customer already exist with\nthe same name and Number!");
							location.replace('home.php?SERVER=newCustomerAdd');
						</script>
					<?php
			 	}else{
					mysql_query("INSERT INTO customerInfo (Customername, Companyname, mobile, tel, address, Folio) VALUES ('$Customername', '$Companyname', '$mobile', '$tel', '$address', '$Folio')");
					echo "
						<div id=\"successResponse\">

							<span style=\"font-family: Lucida Fax;  color: #fff; font-size: 22px;\">Customer Added <br><br></span><span style=\"font-family: Lucida Calligraphy; font-size: 30px;  color: #fff;\">Successfully</span><br><br><br>
							<img src=\"images/ok.png\" onclick=\"location.replace('home.php?SERVER=newCustomerAdd');\" width=\"180px\" style=\"cursor: pointer;\" title=\"click to continue\">
							
						</div>

						";
				}
			} else {
				
 					?>
 						<script>
			 				alert("Customer and Mobile\nMust be Filled!");
 							location.replace('home.php?SERVER=newCustomerAdd');
 						</script>
 					<?php
			}
			

		



	}elseif (isset($_POST['Update_customer'])) {

			$customerID = substr($_GET['SERVER'], 30);

			$Customername =$_POST['CustomernameUpdate'];
			$Companyname =$_POST['CompanynameUpdate'];
			$mobile =$_POST['mobileUpdate'];
			$tel =$_POST['telUpdate'];
			$address =$_POST['addressUpdate'];
			$Folio =$_POST['FolioUpdate'];


			if ($Customername !="" || $mobile !="") {

				$selectuserid = mysql_query("SELECT id FROM customerInfo WHERE id='$customerID' AND active='yes'");
			 					
				if (mysql_num_rows($selectuserid)!==0) {
					
				mysql_query("UPDATE customerInfo  SET Customername='$Customername',Companyname='$Companyname',mobile='$mobile',tel='$tel',address='$address', Folio='$Folio' WHERE id='$customerID' AND active='yes'");
			 		?>
						<script>
							location.replace('home.php?SERVER=customerinfoViewInfo<?php echo $customerID ?>');
						</script>
					<?php
				
			 	}else{
			 		?>
						<script>
							alert("A Customer does not exist with\nthe same Customer ID!");
							location.replace('home.php?SERVER=newCustomerAddEDITcUSTomerIngo<?php echo $customerID ?>');
						</script>
					<?php
				}
			} else {
				
 					?>
 						<script>
			 				alert("Customer and Mobile\nMust be Filled!");
 							location.replace('home.php?SERVER=newCustomerAddEDITcUSTomerIngo<?php echo $customerID ?>');
 						</script>
 					<?php
			}
			

		



	}elseif (strpos($_GET['SERVER'], "EDITcUSTomerIngo")!==false) {

		$customerID = substr($_GET['SERVER'], 30);

		$query = mysql_query("SELECT * FROM customerinfo WHERE id='$customerID' AND active!='no'");
			$grab=mysql_fetch_assoc($query);
					$id=$grab['id'];
					$Customername=$grab['Customername'];
					$Companyname=$grab['Companyname'];
					$mobile=$grab['mobile'];
					$tel=$grab['tel'];
					$address=$grab['address'];
					$Folio=$grab['Folio'];
					$active=$grab['active'];

		echo "<form action=\"#\" method=\"post\" id=\"addNew\">

			<img src=\"images/logo2.png\" width=\"290px\"><br>
				<span style=\"color: #079292; font-size: 14px;\">Add a new Customer</span>
			<br><br>
			<input type=\"text\" name=\"CustomernameUpdate\" value=\"$Customername\" placeholder=\"Customer Name\" required=\"required\"> <br>
			<input type=\"text\" name=\"CompanynameUpdate\" value=\"$Companyname\" placeholder=\"Company Name\"> <br>
			<input type=\"text\" name=\"mobileUpdate\"  value=\"$mobile\" placeholder=\"Mobile Number\" required=\"required\"> <br>
			<input type=\"text\" name=\"telUpdate\" value=\"$tel\"  placeholder=\"Telephone Number\"> <br>
			<input type=\"text\" name=\"addressUpdate\"  value=\"$address\"placeholder=\"Address\"> <br>
			<input type=\"text\" name=\"FolioUpdate\"  value=\"$Folio\"placeholder=\"L / Folio\"> <br>


			<input type=\"submit\" name=\"Update_customer\" value=\"Update Info\">

		</form>

		";


	} else {
		echo "
		<form action=\"#\" method=\"post\" id=\"addNew\">

			<img src=\"images/logo2.png\" width=\"290px\"><br>
				<span style=\"color: #079292; font-size: 14px;\">Add a new Customer</span>
			<br><br>
			<input type=\"text\" name=\"Customername\" placeholder=\"Customer Name\" required=\"required\"> <br>
			<input type=\"text\" name=\"Companyname\" placeholder=\"Company Name\"> <br>
			<input type=\"text\" name=\"mobile\" placeholder=\"Mobile Number\" required=\"required\"> <br>
			<input type=\"text\" name=\"tel\" placeholder=\"Telephone Number\"> <br>
			<input type=\"text\" name=\"address\" placeholder=\"Address\"> <br>
			<input type=\"text\" name=\"Folio\" placeholder=\"L / Folio\"> <br>


			<input type=\"submit\" name=\"add_customer\" value=\"Add Customer\">

		</form>

		";
	}
	

 ?>

</center>
</div>