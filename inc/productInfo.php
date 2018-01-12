	<div id="homeHome_bigDiv">
	
<?php
$Get=$_GET['SERVER'];

if (strpos($Get, 'productInfoSingeItemSelected')!==false) {

			$itemId = substr($Get, "28");

			$query = mysql_query("SELECT * FROM items WHERE id='$itemId'");
				$get=mysql_fetch_assoc($query);
				$itemIdget=$get['id'];
				$itemName=$get['itemName'];
				$differentiator=$get['differentiator'];
				$quantity=$get['quantity'];		




			$varmonth="";
			$monthInWrds="";
			$varyear="";
		$qq = mysql_query ("SELECT DISTINCT Year FROM salesandsupplies WHERE active='yes' AND itemID='$itemId' AND WAY_BILL='' AND QTY='' AND COST_PRICE='' ORDER BY Year ASC");
		while ($grab=mysql_fetch_assoc($qq)) {
			$year = $grab['Year'];

			$varyear.="<option value='$year'>$year</option>";
		}


		$qq = mysql_query("SELECT DISTINCT Month FROM salesandsupplies WHERE active='yes' AND itemID='$itemId' AND WAY_BILL='' AND QTY='' AND COST_PRICE=''  ORDER BY Month ASC");
		while ($grab=mysql_fetch_assoc($qq)) {
			$month = $grab['Month'];

			if ($month=="01") {
				$monthInWrds="January";
			}elseif ($month=="02") {
				$monthInWrds="February";
			}elseif ($month=="03") {
				$monthInWrds="March";
			}elseif ($month=="04") {
				$monthInWrds="April";
			}elseif ($month=="05") {
				$monthInWrds="May";
			}elseif ($month=="06") {
				$monthInWrds="June";
			}elseif ($month=="07") {
				$monthInWrds="July";
			}elseif ($month=="08") {
				$monthInWrds="August";
			}elseif ($month=="09") {
				$monthInWrds="September";
			}elseif ($month=="10") {
				$monthInWrds="October";
			}elseif ($month=="11") {
				$monthInWrds="November";
			}elseif ($month=="12") {
				$monthInWrds="December";
			}else {

			}
			
 
			$varmonth.="<option value='$month'>$monthInWrds</option>";
		}












			$varmonth2="";
			$monthInWrds2="";
			$varyear2="";
		$qq2 = mysql_query("SELECT DISTINCT year FROM inventories WHERE itemName='$itemName' AND itemDifferentiator='$differentiator' AND active='yes'  ORDER BY year ASC");
		while ($grab=mysql_fetch_assoc($qq2)) {
			$year = $grab['year'];

			$varyear2.="<option value='$year'>$year</option>";
		}


		$qq2 = mysql_query("SELECT DISTINCT month FROM inventories WHERE itemName='$itemName' AND itemDifferentiator='$differentiator' AND active='yes'  ORDER BY month ASC");
		while ($grab=mysql_fetch_assoc($qq2)) {
			$month2 = $grab['month'];

			if ($month2=="01") {
				$monthInWrds2="January";
			}elseif ($month2=="02") {
				$monthInWrds2="February";
			}elseif ($month2=="03") {
				$monthInWrds2="March";
			}elseif ($month2=="04") {
				$monthInWrds2="April";
			}elseif ($month2=="05") {
				$monthInWrds2="May";
			}elseif ($month2=="06") {
				$monthInWrds2="June";
			}elseif ($month2=="07") {
				$monthInWrds2="July";
			}elseif ($month2=="08") {
				$monthInWrds2="August";
			}elseif ($month2=="09") {
				$monthInWrds2="September";
			}elseif ($month2=="10") {
				$monthInWrds2="October";
			}elseif ($month2=="11") {
				$monthInWrds2="November";
			}elseif ($month2=="12") {
				$monthInWrds2="December";
			}else {

			}
			
 
			$varmonth2.="<option value='$month2'>$monthInWrds2</option>";
		}










			$varmonth3="";
			$monthInWrds3="";
			$varyear3="";
		$qq3 = mysql_query("SELECT DISTINCT Year FROM salesandsupplies WHERE active='yes' AND itemID='$itemId'  ORDER BY Year ASC");
		while ($grab=mysql_fetch_assoc($qq3)) {
			$year = $grab['Year'];

			$varyear3.="<option value='$year'>$year</option>";
		}


		$qq3 = mysql_query("SELECT DISTINCT Month FROM salesandsupplies WHERE active='yes' AND itemID='$itemId'  ORDER BY Month ASC");
		while ($grab=mysql_fetch_assoc($qq3)) {
			$month3 = $grab['Month'];

			if ($month3=="01") {
				$monthInWrds3="January";
			}elseif ($month3=="02") {
				$monthInWrds3="February";
			}elseif ($month3=="03") {
				$monthInWrds3="March";
			}elseif ($month3=="04") {
				$monthInWrds3="April";
			}elseif ($month3=="05") {
				$monthInWrds3="May";
			}elseif ($month3=="06") {
				$monthInWrds3="June";
			}elseif ($month3=="07") {
				$monthInWrds3="July";
			}elseif ($month3=="08") {
				$monthInWrds3="August";
			}elseif ($month3=="09") {
				$monthInWrds3="September";
			}elseif ($month3=="10") {
				$monthInWrds3="October";
			}elseif ($month3=="11") {
				$monthInWrds3="November";
			}elseif ($month3=="12") {
				$monthInWrds3="December";
			}else {

			}
			
 
			$varmonth3.="<option value='$month3'>$monthInWrds3</option>";
		}



	echo "<br><br><center><span class=\"smDiv1\" style=\"font-size: 25px; float: none; color: #adadad;\">Sales / Supplies Of $differentiator $itemName</span><br>

	<form action=\"#\" method=\"POST\" target=\"_blank\">
				<select name='Year1' title=\"Year\" style=\"width: 150px; border:1px solid #03d0s0; padding: 5px; height: 35px; font-size: 14px;\">
                    <option value='All'>All</option>
                    $varyear
                </select>

                <select name='Month1' title=\"Month\" style=\"width: 150px; border:1px solid #03d0s0; padding: 5px; height: 35px; font-size: 14px;\">
                    <option value='All'>All</option>
                    $varmonth
                </select>
            <input type=\"submit\" name=\"Fetch1\" value=\"Fetch\" style=\"background: #03b9b9; color: #eef; padding: 7px; font-size: 15px; border: 0px;\">
	</form>




	<br><br><br><br><br><br><br><br>
	<span class=\"smDiv1\" style=\"font-size: 25px; float: none; color: #adadad;\">Inventories  Of $differentiator $itemName</span><br>

	<form action=\"#\" method=\"POST\" target=\"_blank\">
				<select name='Year2' title=\"Year\" style=\"width: 150px; border:1px solid #03d0s0; padding: 5px; height: 35px; font-size: 14px;\">
                    <option value='All'>All</option>
                    $varyear2
                </select>

                <select name='Month2' title=\"Month\" style=\"width: 150px; border:1px solid #03d0s0; padding: 5px; height: 35px; font-size: 14px;\">
                    <option value='All'>All</option>
                    $varmonth2
                </select>
            <input type=\"submit\" name=\"Fetch2\" value=\"Fetch\" style=\"background: #03b9b9; color: #eef; padding: 7px; font-size: 15px; border: 0px;\">
	</form>



	<br><br><br><br><br><br><br><br>
	<span class=\"smDiv1\" style=\"font-size: 25px; float: none; color: #adadad;\">Inventories and Sales  Of $differentiator $itemName</span><br><br><br>
		
	<form action=\"#\" method=\"POST\" target=\"_blank\">
				<select name='Year3' title=\"Year\" style=\"width: 150px; border:1px solid #03d0s0; padding: 5px; height: 35px; font-size: 14px;\">
                    <option value='All'>All</option>
                    $varyear3
                </select>

                <select name='Month3' title=\"Month\" style=\"width: 150px; border:1px solid #03d0s0; padding: 5px; height: 35px; font-size: 14px;\">
                    <option value='All'>All</option>
                    $varmonth3
                </select>
            <input type=\"submit\" name=\"Fetch3\" value=\"Fetch\" style=\"background: #03b9b9; color: #eef; padding: 7px; font-size: 15px; border: 0px;\">
	</form>

		</center>
	";


				if (isset($_POST['Fetch1'])) {

					$Year1 = $_POST['Year1'];
					$Month1 = $_POST['Month1'];

					if ($Year1=='All' AND $Month1=='All') {
						?>
						<script type="text/javascript">
							location.replace("topdfs/SalesANDSuppliesAll.php?itt=<?php echo $itemId ?>");
						</script>
						<?php
					}elseif ($Year1!='All' AND $Month1!='All') {
						?>
						<script type="text/javascript">
							location.replace('topdfs/SalesANDSuppliesYM.php?itt=<?php echo "$itemId,$Year1,$Month1"?>');
						</script>
						<?php
					 }elseif ($Year1=='All' AND $Month1!='All') {
					 	?>
					 	<script type="text/javascript">
					 		alert("Please select Year to specify the Month");
							window.close();
					 	</script>
					 	<?php
					 }elseif ($Year1!='All' AND $Month1=='All') {
					 	?>
					 	<script type="text/javascript">
					 		location.replace('topdfs/SalesANDSuppliesYM.php?itt=<?php echo "$itemId,$Year1"?>');
					 	</script>
					 	<?php
					}

				}









				if (isset($_POST['Fetch2'])) {
					$Year1 = $_POST['Year2'];
					$Month1 = $_POST['Month2'];

					if ($Year1=='All' AND $Month1=='All') {
						?>
						<script type="text/javascript">
							location.replace("topdfs/iteminventorieslisttopdf.php?it=<?php echo $itemId ?>");
						</script>
						<?php
					}elseif ($Year1!='All' AND $Month1!='All') {
						?>
						<script type="text/javascript">
							location.replace('topdfs/InventoriesYM.php?it=<?php echo "$itemId,$Year1,$Month1"?>');
						</script>
						<?php
					 }elseif ($Year1=='All' AND $Month1!='All') {
					 	?>
					 	<script type="text/javascript">
					 		alert("Please select Year to specify the Month");
							window.close();
					 	</script>
					 	<?php
					 }elseif ($Year1!='All' AND $Month1=='All') {
					 	?>
					 	<script type="text/javascript">
					 		location.replace('topdfs/InventoriesY.php?it=<?php echo "$itemId,$Year1"?>');
					 	</script>
					 	<?php
					}

				}







				if (isset($_POST['Fetch3'])) {
						$Year1 = $_POST['Year3'];
						$Month1 = $_POST['Month3'];

						if ($Year1=='All' AND $Month1=='All') {
							?>
							<script type="text/javascript">
								location.replace("topdfs/InventoriesAndSalesOfProducts_Info.php?it=<?php echo $itemId ?>");
							</script>
							<?php
						}elseif ($Year1!='All' AND $Month1!='All') {
							?>
							<script type="text/javascript">
								location.replace('topdfs/InventoriesAndSalesOfProducts_InfoYM.php?it=<?php echo "$itemId,$Year1,$Month1"?>');
							</script>
							<?php
						 }elseif ($Year1=='All' AND $Month1!='All') {
						 	?>
						 	<script type="text/javascript">
						 		alert("Please select Year to specify the Month");
								window.close();
						 	</script>
						 	<?php
						 }elseif ($Year1!='All' AND $Month1=='All') {
						 	?>
						 	<script type="text/javascript">
						 		location.replace('topdfs/InventInventoriesAndSalesOfProducts_InfoYoriesY.php?it=<?php echo "$itemId,$Year1"?>');
						 	</script>
						 	<?php
						}

					}




} else {
	echo "<center>
					<div class=\"itemsContainer\" style=\"width: 70%;\">";
						 
							$var="";
							$query = mysql_query("SELECT * FROM items ORDER BY itemName ASC");
							while ($get=mysql_fetch_assoc($query)) {
								$id=$get['id'];
								$itemName=$get['itemName'];
								$differentiator=$get['differentiator'];
								$quantity=$get['quantity'];				



								$var.="<li style=\"padding-left: 27px;\" onclick=\"location.replace('home.php?SERVER=productInfoSingeItemSelected$id')\"><a href=\"#\">$differentiator $itemName<span style=\"float: right;\">$quantity </span></a></li>";
								
							}

					echo "<ul id=\"myUL\" style=\"width: 100%; text-align: left;\">
							$var
						</ul>
					</div>
				</center>";
}





?>



</div>