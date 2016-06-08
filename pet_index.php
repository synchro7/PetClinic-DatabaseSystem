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
		  <h1>Pet <small>Add / Remove the employee</small></h1>
		</div>
	</div>
	</br>
</div>
<div class="container">
	<div class="row">
		<?php
		if (is_array($pet) || is_object($pet))
			{
				echo "<table class='table table-bordered'>";
				echo "<tr><th>Pet ID</th><th>Name</th><th>Breed</th><th>Sex</th><th>Date of Birth</th><th>Owner</th></tr>";
				foreach ($pet as $result) {
//					echo "<tr typeid='".$result['SSN']."'><td><a href='employee_show.php?ssn=".$result['SSN']."'>".$result['SSN']."</a></td>";
					echo "<tr>";
					echo "<td>".$result['PET_ID']."</td>";
					echo "<td>".$result['PET_NAME']."</td>";
					echo "<td>".$result['BREED']."</td>";
					echo "<td>".$result['SEX']."</td>";
					echo "<td>".$result['DATE_OF_BIRTH']."</td>";
					echo "<td>".$result['OWNER_ID']."</td>";
//					echo "<td>";
//					echo $a->getEmployee($result['SUPER_SSN'])["FNAME"];
//					echo "</td>";
//					echo "<td>";
//					echo $a->getDepartment($result['DNO'])["DNAME"];
//					echo "</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		?>
	</div>
</div>


<?php include ('includes/footer.php'); ?>
