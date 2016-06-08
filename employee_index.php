<?php include ('includes/header.php'); ?>
<?php include ("includes/employee_connection.php"); ?>
<?php
	// Get all Employee
	$a = new EmployeeConnection;
	$employees =  $a->getEmployees();
?>
<div class="container">
	<div class="row">
		<div class="page-header" style="margin: 0px;">
		  <h1>Employee <small>Add / Remove the employee</small></h1>
		</div>
	</div>
	</br>
</div>
<div class="container">
	<div class="row">
		<?php
		if (is_array($employees) || is_object($employees))
			{
				echo "<table class='table table-bordered'>";
				echo "<tr><th>SSN</th><th>Name (TH)</th><th>Birth Date</th><th>Address</th><th>Sex</th><th>Salary</th><th>Manager</th><th>Department</th></tr>";
				foreach ($employees as $result) {
					echo "<tr typeid='".$result['SSN']."'><td><a href='employee_show.php?ssn=".$result['SSN']."'>".$result['SSN']."</a></td>";
					echo "<td>".$result['FNAME']."</td>";
					echo "<td>".$result['BDATE']."</td>";
					echo "<td>".$result['ADDRESS']."</td>";
					echo "<td>".$result['SEX']."</td>";
					echo "<td>".$result['SALARY']."</td>";
					echo "<td>";
					echo $a->getEmployee($result['SUPER_SSN'])["FNAME"];
					echo "</td>";
					echo "<td>";
					echo $a->getDepartment($result['DNO'])["DNAME"];
					echo "</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		?>
	</div>
</div>


<?php include ('includes/footer.php'); ?>
