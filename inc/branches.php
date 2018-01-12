<div id="BranchesAll">
	

<?php 
$var="";
$query = mysql_query("SELECT * FROM braches WHERE active='yes'");
	if (mysql_num_rows($query)===0) {
		
		?>
			<script type="text/javascript">
				alert("There is no Branch Added!");
				location.replace("home.php?SERVER=home");
			</script>
		<?php
	} else {
		while ($while = mysql_fetch_assoc($query)) {
			$id=$while['id'];
			$branchName=$while['branchName'];
			$Location=$while['Location'];
			$Contact=$while['Contact'];

			$var.="<ul id=\"myUL\" style=\"width: 100%; text-align: left;\">
						<li style=\"padding-left: 27px;\"><a>$branchName  &nbsp; &nbsp; &ndash;  &nbsp; &nbsp; $Location  <span style=\"float: right; font-size: 12px;color: red; cursor: pointer;\"> &nbsp;&nbsp; <span onclick=\"document.getElementById('eDITbRANCH$id').style.display='block';\">Edit</span>  &nbsp;&nbsp; <span onclick=\"document.getElementById('_deling_back2$id').style.display='block';\">Del</span></span><span style=\"float: right; \">$Contact &nbsp;  &nbsp; &nbsp;  &nbsp;</span></a></li>
					  </ul>



 <div id=\"_deling_back2$id\" class=\"status_updating_back2\">
          <center>

	<form action=\"#\" method=\"POST\" enctype=\"multipart/form-data\">
            <div id=\"status_updating\">
              <div id=\"menu_bar\">
                <div id=\"close\" title=\"Close\" onclick=\"document.getElementById('_deling_back2$id').style.display='none'\">
                  x
                </div>
                <div id=\"title\">
                    DELETING ALERT!
                </div>
              </div>
                <div id=\"record_holder\">

                    <span style=\"text-align: center;font-family: Lucida Fax; font-size: 13px; color: #3a3b3b;\">Deleted Branches can not be brought back!<br>Please confirm Delete if you really want to perform this action...</span>
                        <br>
                        <br>
                        <br>
                        <br>

                    <input type=\"submit\" name=\"CanlOperation$id\" value=\"Cancel\" title=\"Cancel this Operation\" style=\"font-size: 14px; background-color: #eee; color: #8f8c8c; float: left; margin-left: 12px; padding: 10px; padding-left: 20px; padding-right: 20px;\">

                    <input type=\"submit\" name=\"CDelete$id\" value=\"Delete\" title=\"Delete\" style=\"font-size: 14px; float: right; margin-right: 12px; padding: 10px; padding-left: 32px; padding-right: 32px;\">


                </div>
	        </div>
	</form>
          </center>
        </div><!---------- End of deleting toggle div---------->



		        <div id=\"eDITbRANCH$id\" class=\"cnfirm_Invent_reached_back\">
		          <center>
		            <div id=\"accnt_with_custmer\">
		              <div id=\"menu_bar\">
		                <div id=\"close\" title=\"Close\"  onclick=\"document.getElementById('eDITbRANCH$id').style.display='none';\">
		                  x
		                </div>
		                <div id=\"title\">
		                    EDIT BRANCH INFO
		                </div>
		              </div>
		                <div id=\"record_holder\">
				<form action=\"#\" method=\"POST\">

		                <input type='text' name='BranchName' placeholder='Branch Name' value=\"$branchName\"   style=\"text-align: left; width: 270px;\" required=\"required\"><input type='text' name='Location' value=\"$Location\"  placeholder='Location'  style=\"text-align: left; width: 270px;\" required=\"required\"><input type='text' name='Contact' value=\"$Contact\"  placeholder='Contact'  style=\"text-align: left; width: 270px;\" required=\"required\">
		                <br><br>
		                    <input type=\"submit\" name=\"EditConfirm$id\" value=\"Confirm\">
				</form>
		                </div>

		                <div style=\"background-color: #eee; height: 35px; text-align: right;color: #03b9b9; font-family: Lucida Bright; font-size: 0px; width: 100%;\">
		                    <span style=\" margin-right: 10px;\"><br><br><i>Nsromapa</i></span>
		                </div>
		        </div>
		          </center>
		        </div>
        ";



		        if (isset($_POST["CDelete$id"])) {
					mysql_query("UPDATE braches SET active='no' WHERE id ='$id' AND active='yes'");

						?>
							<script type="text/javascript">
								alert("Deleted!");
								location.replace("home.php?SERVER=branchesWorking");
							</script>
								<?php

		        }

		        if (isset($_POST["CanlOperation$id"])) {
						?>
							<script type="text/javascript">
								location.replace("home.php?SERVER=branchesWorking");
							</script>
								<?php

		        }






					if (isset($_POST["EditConfirm$id"])) {
						$branchName = $_POST['BranchName'];
						$Location = $_POST['Location'];
						$Contact = $_POST['Contact'];



						if ($branchName!="") {


							mysql_query("UPDATE braches SET branchName='$branchName',Location='$Location',Contact='$Contact' WHERE id='$id' AND active='yes'");

					 
							?>
							<script type="text/javascript">
								alert("Branch Info Updated Successfully!");
								location.replace("home.php?SERVER=branchesWorking");
							</script>
								<?php




						}else{
								?>
							<script type="text/javascript">
								alert("Branch Name \n must not be empty!");
								location.replace("home.php?SERVER=branchesWorking");
							</script>
								<?php
						}
					}

		}

		echo "<center>
				<a href=\"topdfs/bracheslist.php\" style=\"color: #adadad;\" target=\"_black\">Print Branches List</a>
				<br><br>
				<input type=\"button\" value=\"Add New Branch\" onclick=\"location.replace('home.php?SERVER=newBranchAdd')\" style=\" padding:10px; background-color: #03b9b9; color: #eef; border:0px;\">

				<br>
				<br>
			<div class=\"itemsContainer\" style=\"width: 70%;\">
				<ul id=\"myUL\" style=\"width: 100%; text-align: left;\">
					$var
				</ul>
			</div>
					</center>";
	}
	



 ?>



</div>