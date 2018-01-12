<div id="Invents_bigDiv">
	
<?php
	$get = $_GET['SERVER'];


		if (strpos($get, "salesAndSuppliesCnfirm")!==false) {
				echo "<center>
						<div class=\"itemsContainer\" style=\"width: 70%;\">";


				$BRid=substr($get, 22);
				$var="";
							$query = mysql_query("SELECT * FROM salesandsupplies  WHERE branch='$BRid' AND active='not'");
							if (mysql_num_rows($query)!==0) {
							
							while ($get=mysql_fetch_assoc($query)) {
								$id=$get['id'];
								$branch=$get['branch'];
								$itemID=$get['itemID'];
								$DESCRIPTION=$get['DESCRIPTION'];
								$WAY_BILL=$get['WAY_BILL'];
								$QTY=$get['QTY'];
								$invent_Date=$get['invent_Date'];

								$itemsInf = mysql_query("SELECT * FROM items WHERE id ='$itemID' AND active='yes'");
									$fetch=mysql_fetch_assoc($itemsInf);
										$itemName=$fetch['itemName'];
										$differentiator=$fetch['differentiator'];
										$itemPrice=$fetch['itemPrice'];


				$var.="<ul id=\"myUL\" style=\"width: 100%; text-align: left;\">
						<li style=\"padding-left: 27px;\" onclick=\"document.getElementById('neworExistSS_back$id').style.display='block'\"><a>$differentiator $itemName <span style=\"float: right; font-size: 12px;color: red; cursor: pointer;\"><span onclick=\"document.getElementById('cnfirm_Invent_reached_back$itemID').style.display='block';\">confirm</span>  &nbsp;  &nbsp; <span onclick=\"document.getElementById('status_updating_back2$itemID').style.display='block';\">Del</span></span></a></li>
					  </ul>





 <div id=\"status_updating_back2$itemID\" class=\"status_updating_back2\">
          <center>

	<form action=\"#\" method=\"POST\" enctype=\"multipart/form-data\">
            <div id=\"status_updating\">
              <div id=\"menu_bar\">
                <div id=\"close\" title=\"Close\" onclick=\"document.getElementById('status_updating_back2$itemID').style.display='none'\">
                  x
                </div>
                <div id=\"title\">
                    DELETING ALERT!
                </div>
              </div>
                <div id=\"record_holder\">

                    <span style=\"text-align: center;font-family: Lucida Fax; font-size: 13px; color: #6a6b6b;\">Deleted inventories can not be fixed!<br>Please confirm Delete if you really want to perform this action...</span>
                        <br>
                        <br>
                        <br>
                        <br>

                    <input type=\"submit\" name=\"CancelOperation$itemID\" value=\"Cancel\" title=\"Cancel this Operation\" style=\"font-size: 14px; background-color: #eee; color: #8f8c8c; float: left; margin-left: 12px; padding: 10px; padding-left: 20px; padding-right: 20px;\">

                    <input type=\"submit\" name=\"ContDelete$itemID\" value=\"Delete\" title=\"Delete\" style=\"font-size: 14px; float: right; margin-right: 12px; padding: 10px; padding-left: 32px; padding-right: 32px;\">


                </div>
	        </div>
	</form>
          </center>
        </div><!---------- End of deleting toggle div---------->






		        <div id=\"cnfirm_Invent_reached_back$itemID\" class=\"cnfirm_Invent_reached_back\">
		          <center>
		            <div id=\"accnt_with_custmer\">
		              <div id=\"menu_bar\">
		                <div id=\"close\" title=\"Close\"  onclick=\"document.getElementById('cnfirm_Invent_reached_back$itemID').style.display='none';\">
		                  x
		                </div>
		                <div id=\"title\">
		                    CONFIRM INVENTORY RECEIVE
		                </div>
		              </div>
		                <div id=\"record_holder\">
				<form action=\"#\" method=\"POST\">

		                <input type='date' name='date' placeholder='DATE' value=\"$invent_Date\" required='required' style=\"width: 150px;\"><input type='text' name='DESCRIPTION' placeholder='DESCRIPTION' value=\"$DESCRIPTION\"  required=\"required\"><input type='text' name='WAY_BILL' value=\"$WAY_BILL\"  placeholder='INVOICE' required=\"required\"><input type='text' name='QTY' value=\"$QTY\"  placeholder='RECEIPT' required=\"required\"><input type='text' name='itemprice1' value=\"$itemPrice\" placeholder='Price Per 1'><br><br>
		                    <input type=\"submit\" name=\"Confirm$id\" value=\"Confirm\">
				</form>
		                </div>

		                <div style=\"background-color: #eee; height: 35px; text-align: right;color: #03b9b9; font-family: Lucida Bright; font-size: 0px; width: 100%;\">kdj
		                    <span style=\" margin-right: 10px;\"><br><br><i>Nsromapa</i></span>

		                </div>
		        </div>
		          </center>
		        </div>
		        ";


		        if (isset($_POST["ContDelete$itemID"])) {
					mysql_query("UPDATE salesandsupplies SET active='no' WHERE itemid ='$itemID' AND branch='$BRid' AND id='$id' AND active='not'");

						?>
							<script type="text/javascript">
								alert("Deleted!");
								location.replace("home.php?SERVER=salesAndSuppliesCnfirm<?php echo $BRid ?>");
							</script>
								<?php

		        }

		        if (isset($_POST["CancelOperation$itemID"])) {
						?>
							<script type="text/javascript">
								location.replace("home.php?SERVER=salesAndSuppliesCnfirm<?php echo $BRid ?>");
							</script>
								<?php

		        }
		        
		        





					if (isset($_POST["Confirm$id"])) {
						$date = $_POST['date'];
						$DESCRIPTION = $_POST['DESCRIPTION'];
						$WAY_BILL = $_POST['WAY_BILL'];
						$QTY = $_POST['QTY'];
						$itemprice1 = $_POST['itemprice1'];


						$COST_PRICE = $itemPrice*$QTY;

						$today = date("Y-m-d");


						if ($date!="" AND $DESCRIPTION!="" AND $QTY!="") {

							$itemsInfo = mysql_query("SELECT * FROM branchitems WHERE itemid ='$itemID' AND branch='$BRid' AND active='yes'");
								$fet=mysql_fetch_assoc($itemsInfo);
								$quantity=$fet['quantity'];
							 	$itemBal = $quantity + $QTY;
								$totalqtyReceives=$fet['totalqtyReceives'];
							 	$totalqtyReceives=$totalqtyReceives + $QTY;


							 	$date_info = $date;
								$array = array($date_info);
								$explode = explode("-", $date_info);
								$count = count($explode);
								$year = current($explode);
								$month = next($explode);
								$day = next($explode);



							mysql_query("UPDATE salesandsupplies SET invent_Date='$date',DESCRIPTION='$DESCRIPTION',WAY_BILL='$WAY_BILL',QTY='$QTY',COST_PRICE='$COST_PRICE',active='yes',BALANCE='$itemBal',Year='$year',Month='$month',Day='$day' WHERE branch='$BRid' AND id='$id' AND itemID='$itemID' AND active='not'");


							if (mysql_num_rows($itemsInfo)===1) {	
					 			mysql_query("UPDATE branchitems SET quantity='$itemBal',lastupdate='$EnteryDate',totalqtyReceives='$totalqtyReceives',itemPrice='$itemprice1'  WHERE itemid ='$itemID' AND branch='$BRid' AND active='yes'");
							 } else {
							 	mysql_query("INSERT INTO branchitems (branch,itemid,totalqtyReceives,quantity,lastupdate,itemPrice) VALUES ('$BRid','$itemID','$QTY','$QTY','$today','$itemprice1')");
							 }
					 



							?>
							<script type="text/javascript">
								alert("Confirmed!");
								location.replace("home.php?SERVER=salesAndSuppliesCnfirm<?php echo $BRid ?>");
							</script>
								<?php

						}else{
								?>
							<script type="text/javascript">
								alert("DATE, DESCRIPTION & INVOICE \n must not be empty!");
								location.replace("home.php?SERVER=salesAndSuppliesCnfirm<?php echo $BRid ?>");
							</script>
								<?php
						}
					}


				}
			}else{
								?>
							<script type="text/javascript">
								alert("There is nothing to Confirm!");
								location.replace("home.php?SERVER=salesAndSupplies");
							</script>
								<?php

			}



				echo "<ul id=\"myUL\" style=\"width: 100%; text-align: left;\">
						$var
					</ul>

							</div>
					</center>";


		}




		elseif (strpos($get, "salesAndSuppliesCreatingNew")!==false) {
			$brid=substr($get, 27);

				$items="";
				$query = mysql_query("SELECT * FROM branchitems WHERE branch='$brid' AND quantity>='1'AND active='yes'");
				if (mysql_num_rows($query)===0) {
					$items="";
				}else{
					while ($grab=mysql_fetch_assoc($query)) {
						$itemid=$grab['itemid'];


						$QQQ = mysql_query("SELECT * FROM items WHERE id='$itemid' AND active='yes'");
							$grab=mysql_fetch_assoc($QQQ);
									$id=$grab['id'];
									$itemName=$grab['itemName'];
									$differentiator=$grab['differentiator'];
									$itemPrice=$grab['itemPrice'];


						$items.="<option value=\"$id\">$itemName ($differentiator)</option>";
					}
				}


				$destinations="";
				$qqqq = mysql_query("SELECT * FROM braches WHERE id!='$brid' AND active='Yes'");
					while ($grabget = mysql_fetch_assoc($qqqq)) {
									$bbid=$grabget['id'];
									$branchName=$grabget['branchName'];
									$Location=$grabget['Location'];

						$branches.="<option value=\"$bbid\">$branchName ($Location)</option>";
						
					}


				$today=date("Y-m-d");


			echo "
			  <div id=\"cnfirm_Invent_reached_back2\" class=\"cnfirm_Invent_reached_back\" style=\"display: block;\">
		          <center>
		            <div id=\"accnt_with_custmer\">
		              <div id=\"menu_bar\">
		                <div id=\"close\" title=\"Close\"  onclick=\"location.replace('home.php?SERVER=salesAndSupplies')\">
		                  x
		                </div>
		                <div id=\"title\">
		                    CONFIRM INVENTORY RECEIVE
		                </div>
		              </div>
		                <div id=\"record_holder\">
				<form action=\"#\" method=\"POST\">


					<input type=\"radio\" name=\"method\" id=\"Internalsupply\" value=\"Internal\" />Internal Supply
					 &nbsp;&nbsp;&nbsp;		
					<input type=\"radio\" name=\"method\"  value=\"External\"  checked=\"checked\"/>External Supply
					<br />

						<select name='itemName' required=\"required\">
                   			 <option value=''></option>
                    		$items
               			 </select>
						<select name='DESCRIPTION' placeholder='DESCRIPTION'  id=\"descriptn\" style=\"display: none; width: 220px;\">
                   			 <option value=''></option>
                    		$branches
               			 </select>
		                <input type='text' name='WBILL'  placeholder='WAY BILL' id=\"WBILL\" style=\"display:none\">
		                <input type='text' name='quantity'  placeholder='SALES/SUPPLY' required=\"required\">
		                <input type='date' name='dated' value=\"$today\" placeholder='DATE: yyyy-mm-dd' required='required' style=\"width: 150px;\"><br><br>
		                    <input type=\"submit\" name=\"Sell\" value=\"Add\">
				</form>
		                </div>

				         <div style=\"background-color: #eee; height: 35px; text-align: right;color: #03b9b9; font-family: Lucida Bright; font-size: 0px; width: 100%;\">
		                    <input type=\"submit\" value=\"Done\" style=\"float: left; padding: 10px; margin-top: -1px; font-size: 11px; border-radius: 3px; margin-left: 15px;\" onclick=\"location.replace('home.php?SERVER=salesAndSupplies')\">
		                    <span style=\" margin-right: 10px;\"><br><i>Nsromapa</i></span>

		                </div>
		        </div>
		          </center>
		        </div>
		        "	;


		        if (isset($_POST["Sell"])) {
		        	$method = $_POST['method'];
		        	$itemID = $_POST['itemName'];
		        	$quantityENT = $_POST['quantity'];
		        	$inv_Date = $_POST['dated'];
		        	$WBILL = $_POST['WBILL'];
		        	$DESCRIPTION = $_POST['DESCRIPTION'];




						$QQQ = mysql_query("SELECT * FROM items WHERE id='$itemID' AND active='yes'");
							$grab=mysql_fetch_assoc($QQQ);
									$id=$grab['id'];
									$itemName=$grab['itemName'];
									$differentiator=$grab['differentiator'];
									$costPer1=$grab['itemPrice'];
									$iTEMquantity=$grab['quantity'];

									$newiTMQuantity=$iTEMquantity-$quantityENT;




		        	if ($itemID!="" AND $quantityENT!="") {
		        		
		        		if ($method=="External") {
		        			$DESCRIPTION="SALES/SUPPLY";



								        		if ($costPer1!="") {
								        			$sAmt=$quantityENT*$costPer1;
								        		}else {
								        			$sAmt="";
								        		}

								        		$QQQ = mysql_query("SELECT * FROM branchitems WHERE branch='$brid' AND itemid='$itemID' AND active='yes'");
													$grab=mysql_fetch_assoc($QQQ);
															$id=$grab['id'];
															$quan=$grab['quantity'];
															$tAmt=$grab['tAmt'];


															$BALANCE=$quan-$quantityENT;

															$NtAmt=$tAmt+$sAmt;




									mysql_query("UPDATE branchitems SET quantity='$BALANCE',tAmt='$NtAmt' WHERE  branch='$brid' AND itemid='$itemID' AND active='yes'");
								        		
								mysql_query("INSERT INTO salesandsupplies (branch,itemID,DESCRIPTION,SALESandSUPPLY,SALES_AMT,TOTAL_AMT,BALANCE,invent_Date,active) VALUES ('$brid','$itemID','$DESCRIPTION','$quantityENT','$sAmt','$NtAmt','$BALANCE','$inv_Date','yes')");


									mysql_query("UPDATE items SET quantity='$newiTMQuantity'  WHERE id ='$itemID' AND active='yes'");



		        		} else {
		        			$DESCRIPTION = $_POST['DESCRIPTION'];


					$qqqq = mysql_query("SELECT * FROM braches WHERE id='$DESCRIPTION' AND active='Yes'");
								$grabget = mysql_fetch_assoc($qqqq);
									$id=$grabget['id'];
									$branchName=$grabget['branchName'];
									$Location=$grabget['Location'];

							$DESCRIPTION1="$branchName($Location)";


						$qquery = mysql_query("SELECT max(id) FROM inventories WHERE itemName='$itemName' AND itemDifferentiator='$differentiator' AND active='yes'");
						      $getQuery = mysql_fetch_assoc($qquery);
						      $lastid = mysql_result($qquery, 0);

						      $qq= mysql_query("SELECT Total FROM inventories WHERE id='$lastid'");
							      $filter=mysql_fetch_assoc($qq);
							      	$lastTotal = $filter['Total'];

							      	$Total=$lastTotal+$quantityENT;

						$EnteryDate=date("jS F, Y");

						$date_info = $inv_Date;
						$array = array($date_info);
						$explode = explode("-", $date_info);
						$count = count($explode);
						$year = current($explode);
						$month = next($explode);
						$day = next($explode);




		        		$QQQ = mysql_query("SELECT * FROM braches WHERE id='$brid' AND active='yes'");
							$grab=mysql_fetch_assoc($QQQ);
									$branchInfo=$grab['branchName'];
									$Location2=$grab['Location'];
									$BrnchInfo="$branchInfo($Location2)";



							mysql_query("INSERT INTO inventories (itemName,itemDifferentiator,Description,WAY_BILL,Quantity,Total,destination,invent_Date,EnteryDate,year,month,day,Price_Before_Invent) VALUES ('$itemName','$differentiator','$BrnchInfo','$WBILL','$quantityENT','$Total','$DESCRIPTION','$inv_Date','$EnteryDate','$year','$month','$day','$costPer1')");









						        			$sAmt="";
						        	

						        		$QQQ = mysql_query("SELECT * FROM branchitems WHERE branch='$brid' AND itemid='$itemID' AND active='yes'");
											$grab=mysql_fetch_assoc($QQQ);
													$id=$grab['id'];
													$quan=$grab['quantity'];
													$tAmt=$grab['tAmt'];


													$BALANCE=$quan-$quantityENT;

													$NtAmt=$tAmt+$sAmt;



			 	$itemsInfo = mysql_query("SELECT * FROM branchitems WHERE itemid ='$itemID' AND branch='$DESCRIPTION' AND active='yes'");
				$fet=mysql_fetch_assoc($itemsInfo);
				$quantity=$fet['quantity'];
			 	$itemBal = $quantity + $quantityENT;

		        			$lastInall=mysql_query("SELECT * FROM salesandsupplies WHERE itemID='$itemID' AND (branch='$brid' AND DESCRIPTION='$DESCRIPTION1') OR (branch='$DESCRIPTION' AND DESCRIPTION='$BrnchInfo') AND WAY_BILL='$WBILL'");

							if (mysql_num_rows($lastInall)!==0) {
									?>
		        						<script type="text/javascript">
		        							alert("Way Bill Number already exists.");
		        						</script>
		        					<?php
							} else {
											mysql_query("UPDATE branchitems SET quantity='$BALANCE',tAmt='$NtAmt' WHERE  branch='$brid' AND itemid='$itemID' AND active='yes'");
										        		
										mysql_query("INSERT INTO salesandsupplies (branch,itemID,DESCRIPTION,SALESandSUPPLY,SALES_AMT,TOTAL_AMT,BALANCE,invent_Date,active) VALUES ('$brid','$itemID','$DESCRIPTION1','$quantityENT','$sAmt','$NtAmt','$BALANCE','$inv_Date','yes')");

									 mysql_query("INSERT INTO salesAndSupplies (branch,itemID,DESCRIPTION,WAY_BILL,QTY,BALANCE,invent_Date) VALUES ('$DESCRIPTION','$itemID','$BrnchInfo','$WBILL','$quantityENT','$itemBal','$inv_Date')");
					 

		        					?>
		        						<script type="text/javascript">
		        							alert("Supply successful!");
		        						</script>
		        					<?php
		        			
							}
							
		        		}

		        	} else {
		        			?>
							<script type="text/javascript">
								alert("Select an item name & quantity \n must not be empty!");
								location.replace("home.php?SERVER=salesAndSuppliesCreatingNew<?php echo $brid ?>");
							</script>
								<?php
		        	}
		        	
		        	
		        }

		        ?>

		        <!------Check Number Hide Or Display Code Jquery-------->
			<script type="text/javascript">
							$(document).ready(function() {
						   $('input[type="radio"]').click(function() {
						       if($(this).attr('id') == 'Internalsupply') {
						            $('#descriptn').fadeIn();
						            $('#WBILL').fadeIn();
						            
						       }

						       else {
						            $('#descriptn').hide();   
						            $('#WBILL').hide();   
						       }
						   });
						});
				</script>


				<?php
		}






		elseif (strpos($get, "salesAndSuppliesExistLists")!==false) {
			$bRid=substr($get, 26);
				echo "<center>
					<div class=\"itemsContainer\" style=\"width: 70%;\">";
						 
							$var="";
							$query = mysql_query("SELECT DISTINCT itemID FROM salesandsupplies WHERE branch='$bRid' AND active='yes'");
							while ($get=mysql_fetch_assoc($query)) {
								$itemID=$get['itemID'];

								


						$QQQ = mysql_query("SELECT * FROM items WHERE id='$itemID' AND active='yes'");
							$grab=mysql_fetch_assoc($QQQ);
									$id=$grab['id'];
									$itemName=$grab['itemName'];
									$differentiator=$grab['differentiator'];


								$var.="<li style=\"padding-left: 40px;\"><a href=\"topdfs/salesAndsuppliesItemsList.php?getthem=$id,$bRid\" target=\"_blank\">$differentiator $itemName<span style=\"float: right; font-size:12px;\">$id </span></a></li>";
								
							}


						

						echo "<ul id=\"myUL\" style=\"width: 100%; text-align: left;\">
							$var
						</ul>
					</div>
				</center>";








		} 












		 else {
				echo "<center>
					<div class=\"itemsContainer\" style=\"width: 70%;\">";
						 
							$var="";
							$query = mysql_query("SELECT * FROM braches ORDER BY branchName ASC");
							while ($get=mysql_fetch_assoc($query)) {
								$id=$get['id'];
								$branchName=$get['branchName'];
								$Location=$get['Location'];
								$Contact=$get['Contact'];

								$qqq = mysql_query("SELECT * FROM salesandsupplies WHERE branch='$id' AND active='not'");
								if (mysql_num_rows($qqq)===0) {
									$cnfirm = "<br />";
								} else {
									$cnfirm = "<br /><li><a href=\"home.php?SERVER=salesAndSuppliesCnfirm$id\">Confirm Inventories</a></li>";
								}
								



								$var.="<li style=\"padding-left: 27px;\" onclick=\"document.getElementById('neworExistSS_back$id').style.display='block'\"><a href=\"#\">$branchName ($Location)<span style=\"float: right;\">$Contact </span></a></li>
				
										   <!----------Create neworExistSales / Sopplies toggle div---------->
									        <div class=\"neworExistSS_back\" id=\"neworExistSS_back$id\">
									          <center>
									            <div id=\"neworExistSS\">
									              <div id=\"menu_bar\">
									                <div id=\"close\" title=\"Close\" onclick=\"document.getElementById('neworExistSS_back$id').style.display='none'\">
									                  x
									                </div>
									                <div id=\"title\">
									                    SALES AND SUPPLLIES 
									                </div>
									              </div>
									                <div id=\"record_holder\">

									                <ul id=\"UL\">
									                	$cnfirm
									                    <br />
									                    <li><a href=\"home.php?SERVER=salesAndSuppliesCreatingNew$id\">New Sales/Supply</a></li>
									                    <br />
									                    <li><a href=\"home.php?SERVER=salesAndSuppliesExistLists$id\">Sales/Supply Lists</a></li>
									                </ul>

									                </div>

									                <div style=\"background-color: #eee; height: 35px; text-align: right;color: #03b9b9; font-family: Lucida Bright; font-size: 10px; width: 100%;\">
									                    <span style=\" margin-right: 10px;\"><br><i>Nsromapa</i></span>
									                </div>
									        </div>
									          </center>
									        </div><!---------- End of neworExistSS toggle div---------->
			        ";
								
							}


						

						echo "<ul id=\"myUL\" style=\"width: 100%; text-align: left;\">
							$var
						</ul>
					</div>
				</center>";
		}
?>
</div>


