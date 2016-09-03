<?php include ('header.php'); ?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Tables</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					DataTables Advanced Tables
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

						<?php
							include ("../core/pet_connection.php");
							// Get all pet
							$a = new PetConnection;
							$pet =  $a->getPets();
							if (is_array($pet) || is_object($pet)) {
								echo "<thead><tr><th>Pet ID</th><th>Name</th><th>Breed</th><th>Sex</th><th>Date of Birth</th><th>Owner</th></tr></thead>";
								echo "<tbody>";
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
								echo "</tbody>";
							}
						?>

					</table>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->

<?php include ('footer.php'); ?>
