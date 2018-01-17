
<?php 

		       /////////When click Change/////////

      if (isset($_POST['change'])) {
      
      	$old_password=md5($_POST['old_password']);
        $new_password=$_POST['new_password'];
        $new_password2=$_POST['new_password2'];

        if ($old_password!=="" AND  $new_password!=="" AND  $new_password2!=="") {
        		  $query = mysql_query("SELECT * FROM users WHERE user_id='$login_user'");

        $fetch=mysql_fetch_assoc($query);

        $user_id=$fetch['user_id'];
        $password=$fetch['password'];
        $name=$fetch['fullname'];
        

          if ( $old_password == $password) {

            if ($new_password !="" AND $new_password2!="") {
              
            
            if ($new_password == $new_password2) {
              
              $new_password = md5($new_password);
              
              $update=("UPDATE users SET password='$new_password' WHERE user_id='$login_user' ");

            $queryupdaate=mysql_query($update,$cn);

            if ($queryupdaate) {


        ////////////When database password is equal to entered password//////////////

          echo "

          <script>
          alert (\" Password Has Been Successfully Changed\");
          </script>

          ";
                    
        } else {
            ?>
              <script>
              alert("Error In Changing Password, Try Again!!!")
              </script>
           <?php
            }
                  

            } else {
              
              ?>
                <script>
                  alert("New Password Does Not Match!!!")
                </script>
              <?php
            }
            

          
            }else{
              ?>
              <script>
                alert("Enter New Password!!!")
              </script>
            <?php
            }

          } else {
            
            ?>
              <script>
                alert("Old Password Does Not Match!!!")
              </script>
            <?php
          }
        } else {
        	 ?>
              <script>
              	alert("All fields must be fill!!!");
              </script>
           <?php
        }
        
  
      }///////Ends Change password////
 



 ?>







<!DOCTYPE html>
<html lang="en" ng-app>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewpoint" content="width=device-width, initial-scale=1">

	<title>Nsromapa Sales Management</title>

	<script type="text/javascript" src="js/angular.min.js"></script>

	<link rel="icon" href="images/logo.png" sizes="16x16" type="image/png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/auto.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/left_pannel.css">
	<link rel="stylesheet" type="text/css" href="css/other_Side.css">
	<link rel="stylesheet" type="text/css" href="css/homeHome.css">
	<link rel="stylesheet" type="text/css" href="css2/auto.css">
	<link rel="stylesheet" type="text/css" href="css2/header.css">
	<link rel="stylesheet" type="text/css" href="css2/left_pannel.css">
	<link rel="stylesheet" type="text/css" href="css2/other_Side.css">
	<link rel="stylesheet" type="text/css" href="css2/homeHome.css">


	
	
</head>


<?php 
	$var=mysql_query("SELECT * FROM theme WHERE themes='other_Side_all' AND id='1'");
	if (mysql_num_rows($var)!==0) {
		$body='body1';
	} else {
		$body='body2';
	}
	
 ?>

<body id="<?php echo "$body" ?>" onload="getTime()">
	<div id="nav_all">

		<div class="title_bar">
			<div class="close" onclick="window.close()">
				x
			</div>
			<div class="maximize">
				<img src="images/box.png" width="11px">
			</div>
			<div class="minimize">
				&ndash;
			</div>
		</div>

		<div class="menu_bar">

			<!--For File-->
			<div class="dropdown create" id="file">
				<span class="dropdown-toggle" data-toggle="dropdown">
					<span style="margin-left: 5px; cursor: pointer;" class="File">File</span>
				</span>
					<ul class="dropdown-menu" aria-labelledby="file">
						<li id="menu_list" onclick="document.getElementById('new_back').style.display='block'"><a>New...</a></li>
						<hr style="margin-top: 2px;margin-bottom: 2px; border-top: 1px solid #646464;">

						<li id="menu_list" onclick="window.open(document.location.href)"><a>Open in New Tab</a></li>
						<li id="menu_list" onclick="window.close()"><a>Close this Tab</a></li>
						<hr style="margin-top: 2px;margin-bottom: 2px; border-top: 1px solid #646464;">

						<li id="menu_list" onclick="window.open(document.location.href,'','_blank','directories=yes,fullscreen=yes,location=yes,menubar=yes,resizable=yes,status=yes,titlebar=yes,scrollbars=yes')"><a>Open in New Window</a></li>
						<li id="menu_list" onclick="window.close()"><a>Close this Window</a></li>
						<hr style="margin-top: 2px;margin-bottom: 2px; border-top: 1px solid #646464;">

						<li id="menu_list" onclick="location.replace('runners/logout.php');"><a>RelogIn</a></li>
						<li id="menu_list" onclick="location.replace('runners/logout.php');"><a>Log Out</a></li>
				
					</ul>

			</div>
			<!--Ends File-->




			<!--For  Edit-->
			<div class="dropdown create" id="edit">
				<span class="dropdown-toggle" data-toggle="dropdown">
					<span style="margin-left: 5px;cursor: pointer;" class="Edit">Edit</span>
				</span>
					<ul class="dropdown-menu" aria-labelledby="edit">
						
						<li style="cursor: pointer;"><a data-toggle="modal" data-target="#changePassword"> Change Password</a></li>
						<!-- <li id="menu_list"><a>Edit</a></li>
						<li id="menu_list"><a>Edit</a></li>
						<li id="menu_list"><a>Edit</a></li> -->
					</ul>

			</div>
			<!--Ends Edit-->



			<!--For  View-->
			<div class="dropdown create" id="view">
				<span class="dropdown-toggle" data-toggle="dropdown">
					 <span  style="margin-left: 5px;cursor: pointer;" class="View">View</span>
				</span>
					<ul class="dropdown-menu" aria-labelledby="view">
						<li id="menu_list" onclick="location.reload();"><a>Reload</a></li>
						<li id="menu_list" onclick="location.reload();"><a>Refresh Page</a></li>
						<hr style="margin-top: 2px;margin-bottom: 2px; border-top: 1px solid #646464;">

						<li id="menu_list" onclick="document.getElementById('theme_back').style.display='block'" title="Change Theme"><a>Theme</a></li>
						<li id="menu_list" onclick="location.replace('home.php?SERVER=themeChange1s');"><a>Day View</a></li>
						<li id="menu_list" onclick="location.replace('home.php?SERVER=themeChange1b');"><a>Night View</a></li>
					</ul>

			</div>
			<!--Ends View-->


				<!--For  Help-->
			<div class="dropdown create" id="help">
				<span class="dropdown-toggle" data-toggle="dropdown">
					   <span  style="margin-left: 5px;cursor: pointer;" class="Help">Help</span>
				</span>
					<ul class="dropdown-menu" aria-labelledby="help">
						<li id="menu_list"><a onclick="alert('Please there isn\'t any update yet\nContanct Nsromapa for personal update!')">Check Updates</a></li>
						<li id="menu_list"><a href="http://www.nsromapa.ga/includes/terms.php?termsandconditionforallourproducts=dATaBaseDevwlopmentAndDataBaseDevlopmetOnlyHere" target="_blank">Terms and Conditions</a></li>
						<hr style="margin-top: 2px;margin-bottom: 2px; border-top: 1px solid #646464;">

						<li id="menu_list"><a href="http://www.nsromapa.ga/includes/contact_us.php?ContacustHome=Emsdsdbsdbsnbdndfddbxvcaisdsland&hhhsChsd//8765433hhsdatuslive" target="_blank">Contact Us</a></li>

					</ul>

			</div>

			<!--Ends Help-->



				<!--For  About-->
			<div class="dropdown create" id="history">
				<span class="dropdown-toggle" data-toggle="dropdown">
					  <span  style="margin-left: 5px;cursor: pointer;" class="History">About</span> 
				</span>
					<ul class="dropdown-menu" aria-labelledby="history">
						<li id="menu_list"><a href="http://www.nsromapa.ga/includes/projects.php?NsoNsroMapaProjectsforbothproducs=Managementonlyforall" target="_blank">Our Sales Management</a></li>
						<li id="menu_list"><a href="http://www.nsromapa.ga/includes/projects.php?NsoNsroMapaProjectsforbothproducs=Managementonlyforall" target="_blank" target="_blank">Our Shop Management</a></li>
						<li id="menu_list"><a href="http://www.nsromapa.ga/includes/projects.php?NsoNsroMapaProjectsforbothproducs=Managementonlyforall" target="_blank" target="_blank">Our School Management</a></li>
						<li id="menu_list"><a href="http://www.nsromapa.ga/includes/projects.php?NsoNsroMapaProjectsforbothproducs=Managementonlyforall" target="_blank" target="_blank">Our Students Portal</a></li>
						
						<hr style="margin-top: 2px;margin-bottom: 2px; border-top: 1px solid #646464;">
						<li id="menu_list"><a href="http://www.nsromapa.ga" target="_blank">Our Website</a></li>
					</ul>

			</div>
			<!--Ends About-->
			
		</div>


		<div class="real_nav" >


		<div class="dropdown create" id="newDrop" style="float: left;">
          
             <button class="butt1" onclick="document.getElementById('new_back').style.display='block';"  title="Create New">
             	<img src="images/plus.png"  width="17px"> New
             </button><span class="dropdown-toggle" data-toggle="dropdown" ><button class="butt2" title="Create New">
             	<img src="images/play.png"  width="17px">
             </button></span>

             <ul class="dropdown-menu" aria-labelledby="newDrop" style="margin-left: 10px;">

				<li id="new_list" onclick="location.replace('home.php?SERVER=newStaffAdd')"><img src="images/staff.png" width="27px"> &nbsp;&nbsp;Staff</li>
				<li id="new_list"  onclick="location.replace('home.php?SERVER=newCustomerAdd')"><img src="images/customer.png" width="27px"> &nbsp;&nbsp;Customer</li>
				<li id="new_list" onclick="location.replace('home.php?SERVER=newStockAdd')"><img src="images/stock.png" width="27px"> &nbsp;&nbsp;Inventory</li>

				<li id="new_list"  onclick="location.replace('home.php?SERVER=newItemAdd');"><img src="images/item.png" width="27px"> &nbsp;&nbsp;Item</li>
				<li id="new_list"  onclick="location.replace('home.php?SERVER=newBranchAdd');"><img src="images/branch.png" width="27px"> &nbsp;&nbsp;Branch</li>
				<li id="new_list"  onclick="location.replace('home.php?SERVER=newItemPriceAdd');"><img src="images/item_price.png" width="27px"> &nbsp;&nbsp;Item Price</li>
				      
			</ul>

		</div>
     

         			 <button class="navbutts" style="float: left; margin-left: 20px;" onclick="location.replace('home.php?SERVER=home');" title="Goto Home">
					 	Home
					 </button>

					 <button class="navbutts" style="float: left; margin-left: 2px;" onclick="document.getElementById('theme_back').style.display='block'" title="Change Theme">
					 	Theme
					 </button>

			<div class="dropdown create" id="HmebuttsDrop" style="float: left;">
				<span class="dropdown-toggle" data-toggle="dropdown">
					   <span  style="margin-left: 5px;cursor: pointer;" class="Help"><br>
						   <span class="navbutts" style="float: none; margin-left: 2px; padding-top: 10px; padding-bottom: 10px;" title="">
							 	<img src="images/AddFolder.png" height="19px">
							 </span>
						</span>
				</span>
					<ul class="dropdown-menu" aria-labelledby="help">
						<li id="new_list" onclick="location.replace('home.php?SERVER=salesAndSupplies')"><img src="images/sales.png" width="27px"> &nbsp;&nbsp;Sales & Supply</li>
					<li id="new_list"  onclick="document.getElementById('customer_list_back').style.display='block'"><img src="images/customerHome.png" width="27px"> &nbsp;&nbsp;Customers</li>
					<li id="new_list" onclick="location.replace('home.php?SERVER=productInfo')"><img src="images/products.png" width="27px"> &nbsp;&nbsp;Product Infos</li>

					<li id="new_list"  onclick="location.replace('home.php?SERVER=branchesWorking');"><img src="images/branchesHome.png" width="27px"> &nbsp;&nbsp;Branches</li>
					<li id="new_list"  onclick="location.replace('home.php?SERVER=invents');"><img src="images/inventsHome.png" width="27px"> &nbsp;&nbsp;Inventories</li>
					<li id="new_list"  onclick="location.replace('home.php?SERVER=StaffsInfo');"><img src="images/staffsHome.png" width="27px"> &nbsp;&nbsp;Staffs</li>
				      

					</ul>

			</div>

					  	
		

					
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;

					 <button class="navbutts" style="float: none; margin-left: 2px; padding-top: 8px; padding-bottom: 8px;" onclick="window.history.go('-1');">
					 	<img src="images/previous.png" height="19px" title="Previous">
					 </button>


					 <button class="navbutts" style="float: none; margin-left: 2px; padding-top: 8px; padding-bottom: 8px;" onclick="window.history.go('1')">
					 	<img src="images/forward.png" height="19px" title="Forward">
					 </button>


					 <button class="navbutts" onclick="location.replace('runners/logout.php');" style="margin-right: 10px;">
					 	LogOut
					 </button>


					



					<div style="float: right; margin-left: 80px; cursor: pointer; margin-top: -7px;">
						<br>
						 <img src="images/upload.png"  height="30px;" title="upload to Cloud" onclick="window.open('backup.php','_blank')">
					 </div>




					<div id="date">
						<br>
						System Date: <?php $dated =  date("jS F, Y"); echo "$dated &ndash; "; ?> <span id="clock"></span>
					 </div>








					  <!--Change Password-->
  <!--modal div-->
  <div class="modal fade "  id="changePassword" tabindex="-1" role="dialog" aria-labelledby="">
    <!--modal dialog-->
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">

        <form action="#" method="post">
        <div class="modal-header">
           
        <button type="button" id="" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span> </button>
        <h3 class="modal-title" id="">Change Password</h3>
        </div>
        <div class="modal-body">
          
          <!-- Old Password-->
            <div class="form-group">
              <label for="oldpass">Old Password</label>
              <input type="text" name="old_password" id="oldpassword" class="form-control" placeholder="Old assword">
            </div>
            <!-- ends Old Password-->

            <!-- New Password-->
            <div class="form-group">
              <label for="new_password">New Password</label>
              <input type="password" name="new_password" id="new_password" class="form-control" placeholder="New Password">
            </div>
            <!-- ends New Password-->

            <!-- Repeat Password-->
            <div class="form-group">
              <label for="new_password2">Repeat Password</label>
              <input type="password" name="new_password2" id="new_password2" class="form-control" placeholder="Repeat Password">
            </div>
            <!-- ends Repeat Password-->

            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" name="change" class="btn btn-primary" value="CHANGE">
        </div>

        </form><!--Form ends-->
      </div>
    </div><!--modal dialog-->



     <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<!-- 	<script type="text/javascript">
		
		$(document).ready(function(){

			$('#file,#edit,#view,#history,#help').on('mouseenter mouseleave click tap', function() {

				$(this).toggleClass("open");
			});

				
		});
	</script> -->

	

</div>
</div>


	
	
	<script>
		function getTime() {
			
			var now = new Date();
			var h = now.getHours();
			var m = now.getMinutes();
			var s = now.getSeconds();

			m = checkTime(m);
			s = checkTime(s);

			document.getElementById('clock').innerHTML = h + ":" + m + ":" + s;
			setTimeout("getTime()", 1000);
		}

		function checkTime(time) {
			
			if (time<=0) {

				time="0", + time;
			}
			return time;
		}
		
	</script>




