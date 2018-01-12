<div id="newStaffAdd_bigDiv">
	

<center>

<?php 

	if (isset($_POST["add_staff"])) {



	 			$staffid=$_POST['StaffID'];
	 			$full_name=$_POST['fullname'];
	 			$username=$_POST['username'];
	 			$mobile=$_POST['mobile'];
	 			$tel=$_POST['tel'];
	 			$email=$_POST['email'];
	 			$address=$_POST['address'];
	 			
			 			//////////////When fields are not empty////////////
			 				if ($full_name !='' || $username !="" || $mobile !="" || $staffid !="") {

			 					$selectuserid = mysql_query("SELECT user_id FROM users WHERE user_id='$staffid' AND active='yes'");
			 					
			 					if (mysql_num_rows($selectuserid)!==0) {
			 						?>
			 							<script>
			 								alert("Staff ID already exits!");
			 								location.replace('home.php?SERVER=newStaffAdd');
			 							</script>
			 						<?php
			 					} else {
			 						
			 						$selectuserid = mysql_query("SELECT username FROM users WHERE username='$username' AND active='yes'");
			 					
			 					if (mysql_num_rows($selectuserid)!==0) {
			 						?>
			 							<script>
			 								alert("Username ID already exits!");
			 								location.replace('home.php?SERVER=newStaffAdd');
			 							</script>
			 						<?php
			 					}else{
								 						  

		 							$password=md5($staffid);

			 						mysql_query("INSERT INTO users (user_id, fullname, username, password, mobile, address, tel, email) VALUES ('$staffid', '$full_name', '$username', '$password', '$mobile', '$address','$tel','$email')");

			 						echo "
										<div id=\"successResponse\">

											<span style=\"font-family: Lucida Fax;  color: #fff; font-size: 22px;\">Staff Added <br><br></span><span style=\"font-family: Lucida Calligraphy; font-size: 30px;  color: #fff;\">Successfully</span><br><br><br>
											<img src=\"images/ok.png\" onclick=\"location.replace('home.php?SERVER=newStaffAdd');\" width=\"180px\" style=\"cursor: pointer;\" title=\"click to continue\">
											
										</div>

										";


														





									}
			 				
			 					}
			 					
			 				} else {
			 					
			 					?>
			 						<script>
			 							alert("Full name, Username, Mobile and Staff ID\nMust be Filled!");
			 							location.replace('home.php?SERVER=newStaffAdd');
			 						</script>
			 					<?php
			 				}
			 				
			 					
			 			
		
}else{
 		

		echo "
		<form action=\"#\" method=\"post\" id=\"addNew\">

			<img src=\"images/logo2.png\" width=\"290px\"><br>
				<span style=\"color: #079292; font-size: 14px;\">Add a new Staff Info</span>
			<br><br>
			<input type=\"text\" name=\"fullname\" placeholder=\"Full Name\" required=\"required\"> <br>
			<input type=\"text\" name=\"username\" placeholder=\"Username\" required=\"required\"> <br>
			<input type=\"text\" name=\"mobile\" placeholder=\"Mobile Number\" required=\"required\"> <br>
			<input type=\"text\" name=\"tel\" placeholder=\"Telephone Number\"> <br>
			<input type=\"text\" name=\"address\" placeholder=\"Address\"> <br>
			<input type=\"email\" name=\"email\" placeholder=\"E-mail\"> <br>
			<input type=\"text\" name=\"StaffID\" placeholder=\"Staff ID\" required=\"required\"><br>


			<input type=\"submit\" name=\"add_staff\" value=\"Add Staff\" id=\"add_StaffButt\" style=\"display: none;\"><br><br>

		</form>

		<span style=\" color: #adadad;\" id=\"chckbx\">
		<input type=\"checkbox\" name=\"agreedToTC\" id=\"aggree\"> I agree to the <a href=\"http://www.nsromapa.ga/includes/terms.php?termsandconditionforallourproducts=databasemanagementincludesalltermsandconditions235//8\" target=\"_blank\" style=\"color: #079292; text-decoration: underline;\">NsroSales-T&C</a></span>

		";
	}




?>

	</center>




</div>



 <!------Check Number Hide Or Display Code Jquery-------->
					<script type="text/javascript">
							$(document).ready(function() {
						   $('input[type="checkbox"]').click(function() {
						       if($(this).attr('id') == 'aggree') {
						            $('#add_StaffButt').fadeIn(); 
						            $('#chckbx').hide();            
						       }

						       else {
						            $('#add_StaffButt').hide();   
						       }
						   });
						});
				</script>