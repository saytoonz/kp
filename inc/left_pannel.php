
<?php 
	$var=mysql_query("SELECT * FROM theme WHERE themes='other_Side_all' AND id='1'");
	if (mysql_num_rows($var)!==0) {
		$left_pannel_all='left_pannel_all';
	} else {
		$left_pannel_all='left_pannel_all2';
	}
	
 ?>

<div id="<?php echo "$left_pannel_all" ?>">

<br>

<center>
	
	<img src="images/kocl.png" width="270px">

<br>
<br>
<br>

<div>
	<ul id="myUL">
		<li><a href="home.php?SERVER=ItemsiNFO">Items Informations</a></li>
		<li><a href="home.php?SERVER=salesAndSupplies">Sales And Supply</a></li>
		<li onclick="document.getElementById('customer_list_back').style.display='block'" style="cursor: pointer;"><a>Customers</a></li>
		<li><a href="home.php?SERVER=productInfo">Products Informations</a></li>
		<li><a href="home.php?SERVER=branchesWorking">Branches Informations</a></li>
		<li><a href="home.php?SERVER=invents">Inventories</a></li>
		<li><a href="home.php?SERVER=StaffsInfo">Staffs Informations</a></li>
		<li><a href="backup.php" target="_blank" style="border:0px;">Upload to Cloud</a></li>
	</ul>
</div>



</center>
</div>