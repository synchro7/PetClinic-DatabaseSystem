<?php include ('includes/header.php'); ?>
<?php include ("includes/pet_connection.php"); ?>
<?php
	// Get all Employee
	$a = new PetConnection;
	$pet =  $a->getPets();
?>
<div class="container">
	<div class="row">
		<div class="page-header" style="margin: 0px;">
		  <h1>Pet <small>Database Manager</small></h1>
		</div>
	</div>
	</br>
</div>
<div class="container">
	<div class="row">
		<?php
		if (is_array($pet) || is_object($pet))
			{
				echo "<table class='table table-bordered table-hover'>";
				echo "<thead><tr><th>Pet ID</th><th>Name</th><th>Breed</th><th>Sex</th><th>Date of Birth</th><th>Owner</th></tr></thead>";
				foreach ($pet as $result) {
					echo "<tr><td><a href='pet_show.php?id=".$result['PET_ID']."'>".$result['PET_ID']."</a></td>";
					echo "<td>".$result['PET_NAME']."</td>";
					echo "<td>".$result['BREED']."</td>";
					echo "<td>".$result['SEX']."</td>";
					echo "<td>".$result['DATE_OF_BIRTH']."</td>";
					echo "<td>";
					echo $a->getOwner($result['OWNER_ID'])["F_NAME"];
					echo "</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		?>
	</div>
</div>


<?php include ('includes/footer.php'); ?>
