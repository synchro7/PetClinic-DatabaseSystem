<?php include ('includes/header.php'); ?>
<?php include ("includes/employee_connection.php"); ?>
<?php
	$a = new EmployeeConnection;
	$ssn = $_GET["ssn"];

	$result = $a->getEmployee($ssn);
	echo "Name: ".$result["FNAME"];
?>

<?php include ('includes/footer.php'); ?>
