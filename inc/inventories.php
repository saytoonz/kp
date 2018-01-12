<div id="Invents_bigDiv">
	
	<center>
		<div class="itemsContainer" style="width: 70%;">
			<?php 
				$var="";
				$query = mysql_query("SELECT * FROM items WHERE active='yes' ORDER BY itemName ASC");
				while ($get=mysql_fetch_assoc($query)) {
					$id=$get['id'];
					$itemName=$get['itemName'];
					$quantity=$get['quantity'];
					$differentiator=$get['differentiator'];


					if ($quantity=="") {
						$quantity="0";
					}else{
						$quantity=$quantity;
					}


					$var.="<li style=\"padding-left: 27px;\"><a href=\"topdfs/iteminventorieslisttopdf.php?it=$id\" target=\"_blank\">$differentiator $itemName<span style=\"float: right;\">$quantity</span></a></li>";
					
				}


			?>

			<ul id="myUL" style="width: 100%; text-align: left;">
				<?php echo $var; ?>
			</ul>
		</div>
	</center>
</div>
