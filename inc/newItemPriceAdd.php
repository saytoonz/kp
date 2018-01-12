<div id="newItemPriceAdd_bigDiv">
	

<center>

<?php 
	
		$idgrab=$_GET['SERVER'];



	if (isset($_POST['add_ItemPriceAdd'])) {
			$newPrice=$_POST['newPrice'];	


		$id=substr($idgrab, 23);

			mysql_query("UPDATE items SET itemPrice='$newPrice' WHERE id='$id' AND active='yes'");

			echo "<div id=\"successResponse\">

					<span style=\"font-family: Lucida Fax;  color: #fff; font-size: 22px;\">Item Price Updated <br><br></span><span style=\"font-family: Lucida Calligraphy; font-size: 30px;  color: #fff;\">Successfully</span><br><br><br>
					<img src=\"images/ok.png\" onclick=\"location.replace('home.php?SERVER=newItemPriceAdd');\" width=\"180px\" style=\"cursor: pointer;\" title=\"click to continue\">
					
				</div>

				";	



	} elseif (strpos($_GET['SERVER'], "newItemPriceAddSelected")!==false) {

		$id=substr($idgrab, 23);

		$itemsInf = mysql_query("SELECT * FROM items WHERE id ='$id' AND active='yes'");
			$fetch=mysql_fetch_assoc($itemsInf);
				$itemName=$fetch['itemName'];
				$itemPrice=$fetch['itemPrice'];
				$differentiator=$fetch['differentiator'];

			
	
		echo "
		<form action=\"#\" method=\"post\" id=\"addNew\">

			<img src=\"images/logo2.png\" width=\"290px\"><br>
				<span style=\"color: #079292; font-size: 14px;\">Update the price of items</span>
			<br><br>
			<input type=\"text\" name=\"itemName\" value=\"$itemName ($differentiator)\" placeholder=\"Item Name\" disabled=\"disabled\"> <br>
			<input type=\"text\" name=\"oldPrice\" value=\"GH&#8373; $itemPrice\" placeholder=\"Old Price\" disabled=\"disabled\">  <br>
			<input type=\"text\" name=\"newPrice\" placeholder=\"New Price\" required=\"required\"> <br>


			<input type=\"submit\" name=\"add_ItemPriceAdd\" value=\"Update Price\">

		</form>

		<button style=\"background-color: red; color: #fff; float: right; margin-right: 60px; border: 0px; padding: 2px;\" onclick=\"location.replace('home.php?SERVER=newItemPriceAdd')\">Cancel</button>

		";
	} else {
				
		$deList="";
		$itemsList = mysql_query("SELECT * FROM items WHERE active='yes' ORDER BY itemName ASC");
			while ($fetch=mysql_fetch_assoc($itemsList)) {
				$id=$fetch['id'];
				$itemName=$fetch['itemName'];
				$itemPrice=$fetch['itemPrice'];
				$differentiator=$fetch['differentiator'];

				$deList.="<li><a href=\"home.php?SERVER=newItemPriceAddSelected$id\">$itemName ($differentiator) - GH&#8373; $itemPrice </a></li>";
			}
		echo "
		<form action=\"#\" method=\"post\" id=\"addNew\">

			<img src=\"images/logo2.png\" width=\"290px\"><br>
				<span style=\"color: #079292; font-size: 14px;\">Update the price of items</span>
			<br><br>
			<input type=\"text\" name=\"itemName\" placeholder=\"Enter to Select Item Name\" id=\"myInput\" onkeyup=\"myfunction()\" required=\"required\"> <br>

				<ul id=\"myUL\" style=\"display:none;\">
					$deList					
				</ul>
		</form>

		";
	}
	

 ?>


	<!------------------------Display Whilest typing Search JavaScript Code-------------------------------->
	<script type="text/javascript">
		function myfunction() {
			var input, filter, ul, li, a, i;

			input = document.getElementById('myInput');
			filter=input.value.toUpperCase();
			ul= document.getElementById('myUL');
			li=ul.getElementsByTagName('li');
			
			if (filter=="") {
				ul.style.display="none";
			} else {
				ul.style.display="block";
			}
			

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
</div>