<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Pet</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index">Home</a></li>
				<li class="active">Pet</li>
			</ol>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					List of all Pets
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<?php
						if(!$num_rows){
							echo "<p>The data is empty</p>";
						} else {
							echo '<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-1">';
							echo "<thead><tr><th>Pet ID</th><th>Name</th><th>Breed</th><th>Sex</th><th>Date of Birth</th><th>Owner</th></tr></thead>";
							echo "<tbody>";
							foreach ($pet as $result) {
								echo "<tr><td><a href='".base_url()."pet/".$result['PET_ID']."'>".$result['PET_ID']."</a></td>";
								echo "<td>".$result['PET_NAME']."</td>";
								echo "<td>".$result['BREED']."</td>";
								echo "<td>".$result['SEX']."</td>";
								echo "<td>".$result['DATE_OF_BIRTH']."</td>";
								echo "<td>";
								echo $num_rows;
								echo "</td>";
								echo "</tr>";
							}
							echo "</tbody>";
							echo "</table>";
						}
					?>
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