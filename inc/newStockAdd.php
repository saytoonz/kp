



<div id="newStockAdd_bigDiv">
	

<center>


<?php 


$idgrab=$_GET['SERVER'];



	
	if (isset($_POST['add_invent'])) {
			$itemName =$_POST['itemName'];
			$itemDifferentiator =$_POST['itemDifferentiator'];
			$Description =$_POST['Description'];
			$WAY_BILL =$_POST['WAY_BILL'];
			$Quantity =$_POST['Quantity'];
			$Driver_Info =$_POST['Driver_Info'];
			$Contact =$_POST['Contact'];
			$destination =$_POST['destination'];
			$invent_Date =$_POST['invent_Date'];


			if ($itemName !="" || $itemDifferentiator !="" || $WAY_BILL !="" || $Driver_Info !="" || $destination !="" || $invent_Date !="") {
					if ($destination!="Select a branch...") {
					
				$selectuserid = mysql_query("SELECT * FROM inventories WHERE WAY_BILL='$WAY_BILL' AND itemName='$itemName' AND itemDifferentiator='$itemDifferentiator' AND active='yes'");
			 					
				if (mysql_num_rows($selectuserid)!==0) {
					?>
						<script>
							alert("There is an inventory with\nthe same Item and Differentiator\nas well as Way Bill Number!");
							location.replace('home.php?SERVER=newStockAdd');
						</script>
					<?php
			 	}else{


			 		$qquery = mysql_query("SELECT max(id) FROM inventories WHERE itemName='$itemName' AND itemDifferentiator='$itemDifferentiator' AND active='yes'");
				      $getQuery = mysql_fetch_assoc($qquery);
				      $lastid = mysql_result($qquery, 0);

				      $qq= mysql_query("SELECT Total FROM inventories WHERE id='$lastid'");
					      $filter=mysql_fetch_assoc($qq);
					      	$lastTotal = $filter['Total'];

					      	$Total=$lastTotal+$Quantity;


			 		$EnteryDate=date("jS F, Y");

						$date_info = $invent_Date;
						$array = array($date_info);
						$explode = explode("-", $date_info);
						$count = count($explode);
						$year = current($explode);
						$month = next($explode);
						$day = next($explode);


			$id=substr($idgrab, 26);

			$itemsInf = mysql_query("SELECT itemPrice,quantity FROM items WHERE id ='$id' AND active='yes'");
				$fetch=mysql_fetch_assoc($itemsInf);
				$Price_Before_Invent=$fetch['itemPrice'];
			 	$quantity = $fetch['quantity'];
			 	$newQuantity = $quantity + $Quantity;


			 	$itemsInfo = mysql_query("SELECT * FROM branchitems WHERE itemid ='$id' AND branch='$destination' AND active='yes'");
				$fet=mysql_fetch_assoc($itemsInfo);
				$quantity=$fet['quantity'];
			 	$itemBal = $quantity + $Quantity;


			 		mysql_query("UPDATE items SET quantity='$newQuantity'  WHERE id ='$id' AND active='yes'");



					 mysql_query("INSERT INTO inventories (itemName,itemDifferentiator,Description,WAY_BILL,Quantity,Total,Driver_Info,Contact,destination,invent_Date,EnteryDate,year,month,day,Price_Before_Invent) VALUES ('$itemName','$itemDifferentiator','$Description','$WAY_BILL','$Quantity','$Total','$Driver_Info','$Contact','$destination','$invent_Date','$EnteryDate','$year','$month','$day','$Price_Before_Invent')");

					 mysql_query("INSERT INTO salesAndSupplies (branch,itemID,DESCRIPTION,WAY_BILL,QTY,BALANCE,invent_Date) VALUES ('$destination','$id','$Description','$WAY_BILL','$Quantity','$itemBal','$invent_Date')");

					 

					echo "
						<div id=\"successResponse\">

							<span style=\"font-family: Lucida Fax;  color: #fff; font-size: 22px;\">Inventory Added <br><br></span><span style=\"font-family: Lucida Calligraphy; font-size: 30px;  color: #fff;\">Successfully</span><br><br><br>
							<img src=\"images/ok.png\" onclick=\"location.replace('home.php?SERVER=newStockAdd');\" width=\"180px\" style=\"cursor: pointer;\" title=\"click to continue\">
							
						</div>

						";
				}
			}else {
				
 					?>
 						<script>
			 				alert("No Destination is Selected");
 							location.replace('home.php?SERVER=newStockAdd');
 						</script>
 					<?php
			}
		} else {
				
 					?>
 						<script>
			 				alert("item Name and Differentiator, WAY_BILL,\nDriver's Info, Destination and Date\nMust be Filled!");
 							location.replace('home.php?SERVER=newStockAdd');
 						</script>
 					<?php
			}
			

		



	}



	elseif (strpos($_GET['SERVER'], "newStockAddIDIAmSelectedis")!==false) {

		$id=substr($idgrab, 26);

		$itemsInf = mysql_query("SELECT * FROM items WHERE id ='$id' AND active='yes'");
			$fetch=mysql_fetch_assoc($itemsInf);
				$itemName=$fetch['itemName'];
				$itemPrice=$fetch['itemPrice'];
				$differentiator=$fetch['differentiator'];


	$destinations="";
		$destqq = mysql_query("SELECT * FROM braches WHERE active='yes'");
		while ($get = mysql_fetch_assoc($destqq)) {
				$id=$get['id'];
				$branchName=$get['branchName'];
				$Location=$get['Location'];

			$destinations.="<option value=\"$id\">$branchName ($Location)</option>";
		}

			
	
		echo "
		<form action=\"#\" method=\"post\" id=\"addNew\">

			<img src=\"images/logo2.png\" width=\"290px\"><br>
				<span style=\"color: #079292; font-size: 14px;\">Add a new Inventory with Existing  Items</span>
			<br><br>

			<input type=\"text\" name=\"itemName\" value=\"$itemName\" placeholder=\"item Name\" required=\"required\" style=\"width: 20%;\"><input type=\"text\" name=\"itemDifferentiator\" value=\"$differentiator\" placeholder=\"Differentiator\" required=\"required\" style=\"width: 20%;\"> <br>

			<input type=\"text\" name=\"Description\" placeholder=\"Description\" required=\"required\"> <br>
			<input type=\"text\" name=\"WAY_BILL\" placeholder=\"Way Bill Number\" required=\"required\"> <br>
			<input type=\"text\" name=\"Quantity\" placeholder=\"Quantity\"  required=\"required\"> <br>
			<input type=\"text\" name=\"Driver_Info\" placeholder=\"Driver Info\"  required=\"required\"> <br>
			<input type=\"text\" name=\"Contact\" placeholder=\"Contact\"  required=\"required\"> <br>

			<select name=\"destination\">
				<option value=\"Select a branch...\">Select a branch...</option>
				$destinations
			</select> <br>
			
			<input type=\"date\" name=\"invent_Date\" placeholder=\"Date\" value=\"".date("Y-m-d")."\"> <br>
	

			<input type=\"submit\" name=\"add_invent\" value=\"Add Stock\">

		<button style=\"background-color: red; color: #fff; float: right; margin-right: 60px; border: 1px; padding: 2px;\" onclick=\"location.replace('home.php?SERVER=newStockAdd')\">Cancel</button>

		";
	}





	else {
		$deList="";
		$itemsList = mysql_query("SELECT * FROM items WHERE active='yes' ORDER BY itemName ASC");
			while ($fetch=mysql_fetch_assoc($itemsList)) {
				$id=$fetch['id'];
				$itemName=$fetch['itemName'];
				$itemPrice=$fetch['itemPrice'];
				$differentiator=$fetch['differentiator'];

				$deList.="<li><a href=\"home.php?SERVER=newStockAddIDIAmSelectedis$id\">$itemName ($differentiator) - GH&#8373; $itemPrice </a></li>";
			}
		echo "
		<form action=\"#\" method=\"post\" id=\"addNew\">

			<img src=\"images/logo2.png\" width=\"290px\"><br>
				<span style=\"color: #079292; font-size: 14px;\">Add a new Inventory with Existing  Items</span>
			<br><br>

			<input type=\"text\" name=\"itemName\" placeholder=\"Enter to Select Item Name\" id=\"myInput\" onkeyup=\"myfunction()\" required=\"required\"> <br>

				<ul id=\"myUL\" style=\"display:none;\">
					$deList					
				</ul>


		</form>

		";
	}
	

 ?>
	<!------------------------Display Whilest typing Search JavaScript Code-------------------------------->
	<script type="text/javascript">
		function myfunction() {
			var input, filter, ul, li, a, i;

			input = document.getElementById('myInput');
			filter=input.value.toUpperCase();
			ul= document.getElementById('myUL');
			li=ul.getElementsByTagName('li');
			
			if (filter=="") {
				ul.style.display="none";
			} else {
				ul.style.display="block";
			}
			

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
</div>