<div id="newItemAdd_bigDiv">
	

<center>


<?php 
	
	if (isset($_POST['add_Item'])) {
			$itemName =$_POST['itemName'];
			$differentiator =$_POST['differentiator'];
			$itemPrice =$_POST['itemPrice'];
			$date_added=date("jS F, Y");

			if ($differentiator !="" || $itemName !="") {

				$selectuserid = mysql_query("SELECT * FROM items WHERE itemName='$itemName' AND differentiator='$differentiator' AND active='yes'");
			 					
				if (mysql_num_rows($selectuserid)!==0) {
					?>
						<script>
							alert("Item already exist with this Item Name and Differentiator!");
							location.replace('home.php?SERVER=newItemAdd');
						</script>
					<?php
			 	}else{
					mysql_query("INSERT INTO items (itemName, differentiator,  date_added, itemPrice) VALUES ('$itemName', '$differentiator', '$date_added', '$itemPrice')");
					echo "
						<div id=\"successResponse\">

							<span style=\"font-family: Lucida Fax;  color: #fff; font-size: 22px;\">Item Added <br><br></span><span style=\"font-family: Lucida Calligraphy; font-size: 30px;  color: #fff;\">Successfully</span><br><br><br>
							<img src=\"images/ok.png\" onclick=\"location.replace('home.php?SERVER=newItemAdd');\" width=\"180px\" style=\"cursor: pointer;\" title=\"click to continue\">
							
						</div>

						";
				}
			} else {
				
 					?>
 						<script>
			 				alert("All Fields must be Filled!");
 							location.replace('home.php?SERVER=newItemAdd');
 						</script>
 					<?php
			}
			

		



	} else {
		echo "
		<form action=\"#\" method=\"post\" id=\"addNew\">

			<img src=\"images/logo2.png\" width=\"290px\"><br>
				<span style=\"color: #079292; font-size: 14px;\">Add a New Item to Our Product List</span>
			<br><br>
			<input type=\"text\" name=\"itemName\" placeholder=\"Item Name\" required=\"required\"> <br>
			<input type=\"text\" name=\"differentiator\" placeholder=\"Brand/Size/Differentiator\"  required=\"required\"> <br>
			<input type=\"text\" name=\"itemPrice\" placeholder=\"Price\"  required=\"required\"> <br>


			<input type=\"submit\" name=\"add_Item\" value=\"Add Item\">

		</form>

		";
	}
	

 ?>

</center>
</div>