<?php include ('includes/header.php'); ?>
<?php include ("includes/pet_connection.php"); ?>
<div class="container">
	<div class="page-header" style="margin: 0px;">
	<ul class="nav nav-pills">
		  <li role="presentation" class="active"><a data-toggle="pill" href="#petdetails">Pet Details</a></li>
		  <li role="presentation"><a data-toggle="pill" href="#ownerdetails">Owner Details</a></li>
<!--		  <li role="presentation"><a data-toggle="tab" href="#">Messages</a></li>-->
	</ul>
	</div>

	<div class="tab-content">
		<div id="petdetails" class="tab-pane fade in active">
			<?php
				$a = new PetConnection;
				$petid = $_GET["id"];
				$result = $a->getPet($petid);
				//			echo "<center><img src='images/logo.png' style='width:250px;'></center>";
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
		</div>

		<div id="ownerdetails" class="tab-pane fade">
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
	</div>
</div>
<?php include ('includes/footer.php'); ?>
