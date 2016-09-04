<?php include ('header.php'); ?>

<div id="page-wrapper">
	<?php
		if ( !isset($_GET['a']) ) {
			$a = '';
		} else {
			$a = $_GET['a'];
		}
		switch ($a) {
			default:
				include ('pet/home.php');
				break;
		}
	?>
</div>
<!-- /#page-wrapper -->

<?php include ('footer.php'); ?>
