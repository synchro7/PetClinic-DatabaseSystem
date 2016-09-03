<?php include ('includes/header.php'); ?>
<?php include ("includes/pet_connection.php");
		//connect to database and get data
		$a = new PetConnection;
		$petid = $_GET["id"]; //get id from GET method
		$result = $a->getPet($petid);
?>
<div class="container" style="padding: 0px 9% 0px 9%;">

	<center>
		<img src="images/noimage.png" class="img-circle" style="width:200px; border: 1px solid #dddddd;">
		<h1><?php echo $result['PET_NAME']; ?></h1>
	</center>
	<div class="page-header" style="margin: 0px;">
		<h3>Pet <small>Details</small></h3>
	</div>
	<?php
		echo "<br>";
		echo "<table class='table table-bordered'>";
		echo "<thead><tr><th>Pet ID</th><th>Name</th><th>Date of Birth</th><th>Breed</th><th>Sex</th></tr></thead>";
		echo "<tr>";
		echo "<td>".$result['PET_ID']."</td>";
		echo "<td>".$result['PET_NAME']."</td>";
		echo "<td>".$result['DATE_OF_BIRTH']."</td>";
		echo "<td>".$result['BREED']."</td>";
		echo "<td>".$result['SEX']."</td>";
		echo "</tr></table>";
	?>

	<div class="page-header" style="margin: 0px;">
		<h3>Owner <small>Details</small></h3>
	</div>
	<?php
		$result2 = $a->getOwner($result['OWNER_ID']);
		echo "<br>";
		echo "<table class='table table-bordered'>";
		echo "<thead><tr><th>Owner ID</th><th>First Name</th><th>Last Name</th><th>Address</th><th>Phone</th><th>Sex</th></tr></thead>";
		echo "<tr>";
		echo "<td>".$result2['OWNER_ID']."</td>";
		echo "<td>".$result2['F_NAME']."</td>";
		echo "<td>".$result2['L_NAME']."</td>";
		echo "<td>".$result2['ADDRESS']."</td>";
		echo "<td>".$result2['PHONE']."</td>";
		echo "<td>".$result2['SEX']."</td>";
		echo "</tr></table>";
	?>

</div>
<?php include ('includes/footer.php'); ?>
