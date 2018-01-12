<div id="newBranchAdd_bigDiv">
	

<center>


<?php 
	
	if (isset($_POST['add_Branch'])) {
			$branchName =$_POST['branchName'];
			$Location =$_POST['Location'];
			$Contact=$_POST['Contact'];
			$date_added=date("jS F, Y");

			if ($branchName !="" || $Location !="") {

				$selectuserid = mysql_query("SELECT * FROM braches WHERE branchName='$branchName' AND Location='$Location' AND active='yes'");
			 					
				if (mysql_num_rows($selectuserid)!==0) {
					?>
						<script>
							alert("Branch already exist with the same Name and Location!");
							location.replace('home.php?SERVER=newBranchAdd');
						</script>
					<?php
			 	}else{
					mysql_query("INSERT INTO braches (branchName, Location, Contact, date_added) VALUES ('$branchName', '$Location', $Contact, '$date_added')");
					echo "
						<div id=\"successResponse\">

							<span style=\"font-family: Lucida Fax;  color: #fff; font-size: 22px;\">Item Added <br><br></span><span style=\"font-family: Lucida Calligraphy; font-size: 30px;  color: #fff;\">Successfully</span><br><br><br>
							<img src=\"images/ok.png\" onclick=\"location.replace('home.php?SERVER=newBranchAdd');\" width=\"180px\" style=\"cursor: pointer;\" title=\"click to continue\">
							
						</div>

						";
				}
			} else {
				
 					?>
 						<script>
			 				alert("All Fields must be Filled!");
 							location.replace('home.php?SERVER=newBranchAdd');
 						</script>
 					<?php
			}
			

		



	} else {
		echo "
		<form action=\"#\" method=\"post\" id=\"addNew\">

			<img src=\"images/logo2.png\" width=\"290px\"><br>
				<span style=\"color: #079292; font-size: 14px;\">Create a New Branch For Inventories</span>
			<br><br>
			<input type=\"text\" name=\"branchName\" placeholder=\"Branch Name\" required=\"required\"> <br>
			<input type=\"text\" name=\"Location\" placeholder=\"Location\" required=\"required\"> <br>
			<input type=\"text\" name=\"Contact\" placeholder=\"Contact\"> <br>


			<input type=\"submit\" name=\"add_Branch\" value=\"Add Branch\">

		</form>

		";
	}
	

 ?>

</center>
</div>