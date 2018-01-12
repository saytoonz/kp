<div id="homeHome_bigDiv">
	<br>
	<br>
	<br>
		<div id="smDiv" class="smDiv3" onclick="window.open('topdfs/staffsList.php','_blank')" style="box-shadow: 2px 5px 10px rgba(0,0,0,0.3); border-radius: 10px;">
			<div style="font-size: 25px;">
				<br>
				<br>
				PRINT STAFF LIST
			</div>
		</div>

		<div id="smDiv" class="smDiv2" onclick="document.getElementById('stafflist_Fr_Edit').style.display='block'" style="box-shadow: 2px 5px 10px rgba(0,0,0,0.3); border-radius: 10px;">
			<div style="font-size: 25px;">
				<br>
				<br>
				EDIT STAFF INFO
			</div>
		</div>

		<div id="smDiv" class="smDiv1"  onclick="location.replace('home.php?SERVER=newStaffAdd')" style="box-shadow: 2px 5px 10px rgba(0,0,0,0.3); border-radius: 10px;">
			<div style="font-size: 25px;">
				<br>
				<br>
				ADD NEW STAFF
			</div>
		</div>

		<br>

</div>





<?php 



		$staffS="";
	$query = mysql_query("SELECT * FROM users WHERE active='yes' AND user_id!='ADMINISTRATOR'");
	if (mysql_num_rows($query)===0) {
		$staffS="";
	}else{
		while ($grab=mysql_fetch_assoc($query)) {
			$id=$grab['id'];
			$fullname=$grab['fullname'];
			$user_id=$grab['user_id'];
			$username=$grab['username'];
			$mobile=$grab['mobile'];
			$tel=$grab['tel'];
			$email=$grab['email'];
			$address=$grab['address'];

			

			$staffS.="<li  style=\"cursor: pointer;\" onclick=\"document.getElementById('Enterstaff_Fr_Edit$id').style.display='block'\"><a>$fullname <span style=\"float: right;\">$user_id</span></a></li>

				<div id=\"Enterstaff_Fr_Edit$id\" class=\"customer_list_back\">
				  <center>
				    <div id=\"customer_list\">
				      <div id=\"menu_bar\">
				        <div id=\"close\" title=\"Close\" onclick=\"location.replace('home.php?SERVER=StaffsInfo')\">
				          x
				        </div>
				        <div id=\"title\">
				          $fullname 
				        </div>
				      </div>
				        <div id=\"record_holder\">

				       	<form action=\"#\" method=\"post\" id=\"addNew\">
							<br><br>
							<input type=\"text\" name=\"fullname\" placeholder=\"Full Name\" value=\"$fullname\" required=\"required\" style=\"width: 90%; margin-top: 5px;\"> <br>

							<input type=\"text\" name=\"username\" placeholder=\"Username\"  value=\"$username\" required=\"required\" style=\"width: 90%; margin-top: 5px;\"> <br>

							<input type=\"text\" name=\"mobile\" placeholder=\"Mobile Number\" value=\"$mobile\"  required=\"required\" style=\"width: 90%; margin-top: 5px;\"> <br>

							<input type=\"text\" name=\"tel\" placeholder=\"Telephone Number\" value=\"$tel\" style=\"width: 90%; margin-top: 5px;\"> <br>

							<input type=\"text\" name=\"address\" placeholder=\"Address\" value=\"$address\" style=\"width: 90%; margin-top: 5px;\"> <br>

							<input type=\"email\" name=\"email\" placeholder=\"E-mail\" value=\"$email\" style=\"width: 90%; margin-top: 5px;\"> <br>

							<input type=\"text\" name=\"StaffID\" placeholder=\"Staff ID\" value=\"$user_id\" required=\"required\" style=\"width: 90%; margin-top: 5px;\" disabled><br>


							<input type=\"submit\" name=\"update$id\" value=\"Update Staff\" id=\"add_StaffButt\"><br><br>

						</form>

				        </div>
				        <div style=\"background-color: #eee; height: 38px; text-align: right;color: #03b9b9; font-family: Lucida Bright; font-size: 10px; width: 100%;\">
				          <br>
				          <span style=\" margin-right: 5px; \"><br><i>Nsromapa</i></span>
				        </div>
				    </div>
				  </center>
				</div><!---------- End of Edit Staff toggle div---------->
";



	

			if (isset($_POST["update$id"])) {
				
	 			$full_name=$_POST['fullname'];
	 			$username=$_POST['username'];
	 			$mobile=$_POST['mobile'];
	 			$tel=$_POST['tel'];
	 			$email=$_POST['email'];
	 			$address=$_POST['address'];
	 			
			 			//////////////When fields are not empty////////////
			 				if ($full_name !='' || $username !="" || $mobile !="") {
								$selectuserid = mysql_query("SELECT username FROM users WHERE username='$username' AND id!='$id' AND active='yes'");
			 					
			 					if (mysql_num_rows($selectuserid)!==0) {
			 						?>
			 							<script>
			 								alert("Username ID already exits!");
			 								location.replace('home.php?SERVER=StaffsInfo');
			 							</script>
			 						<?php
			 					}else{

			 						mysql_query("UPDATE users SET fullname='$full_name',username='$username',mobile='$mobile',address='$address',tel='$tel',email='$email' WHERE id='$id' AND user_id='$user_id'");
			 					
			 						?>
				 						<script>
				 							alert("STAFF INFO UPDATED SUCCESSFULLY!");
				 							location.replace('home.php?SERVER=StaffsInfo');
				 						</script>
				 					<?php
			 					}

			 				} else {
			 					
			 					?>
			 						<script>
			 							alert("Full name, Username, Mobile\nMust be Filled!");
			 							location.replace('home.php?SERVER=StaffsInfo');
			 						</script>
			 					<?php
			 				}

			}
			
		}
	}



	 ?>
<!----------Edit Staffs toggle div---------->
<div id="stafflist_Fr_Edit" class="customer_list_back">
  <center>
    <div id="customer_list">
      <div id="menu_bar">
        <div id="close" title="Close" onclick="document.getElementById('stafflist_Fr_Edit').style.display='none'">
          x
        </div>
        <div id="title">
          STAFFS <input type="text" id="myInput" onkeyup="myfunction()">
        </div>
      </div>
        <div id="record_holder">


            <ul id="myUL" style="width: 100%; text-align: left;">

	             <?php echo "$staffS"; ?>

            </ul>

        </div>
        <div style="background-color: #eee; height: 38px; text-align: right;color: #03b9b9; font-family: Lucida Bright; font-size: 10px; width: 100%;">
          <br>
          <span style=" margin-right: 5px; "><br><i>Nsromapa</i></span>
        </div>
    </div>

    	<script type="text/javascript">
		function myfunction() {
			var input, filter, ul, li, a, i;

			input = document.getElementById('myInput');
			filter=input.value.toUpperCase();
			ul= document.getElementById('myUL');
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
</div><!---------- End of Edit Staff toggle div---------->



