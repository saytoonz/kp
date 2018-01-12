<?php

	echo "<center>
					<div class=\"itemsContainer\" style=\"width: 70%;\">";
						 
							$var="";
							$query = mysql_query("SELECT * FROM items ORDER BY itemName ASC");
							while ($get=mysql_fetch_assoc($query)) {
								$id=$get['id'];
								$itemName=$get['itemName'];
								$differentiator=$get['differentiator'];
								$quantity=$get['quantity'];				



								$var.="<li style=\"padding-left: 27px;\"><a href=\"topdfs/itemsInformations.php?it=$id\" target=\"_blank\">$differentiator $itemName<span style=\"float: right;\">$quantity </span></a></li>";
								
							}

					echo "<ul id=\"myUL\" style=\"width: 100%; text-align: left;\">
							$var
						</ul>
					</div>
				</center>";


?>