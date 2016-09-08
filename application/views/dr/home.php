<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-stethoscope fa-fw"></i>Diagnosis Record</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index">Home</a></li>
				<li class="active">Diagnosis Record</li>
			</ol>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					List of all Diagnosis Records
					<a class="btn btn-success btn-xs pull-right" href="<?php echo base_url(); ?>dr/create" role="button" title="Add New Record"><i class="fa fa-plus fa-fw"></i> Add New Record</a>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<?php
						if(!$num_rows){
							echo "<p>The data is empty</p>";
						} else {
							echo '<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-1">';
							echo "<thead><tr><th>Manage</th><th>DR ID</th><th>Pet Name</th><th>Vet Name</th><th>Date</th></tr></thead>";
							echo "<tbody>";
							foreach ($dr as $result) {
								echo "<tr id='rowof".$result['DR_ID']."'><td style='text-align:center;'>";
								echo "<a href='".base_url()."dr/details/".$result['DR_ID']."' class='btn btn-success btn-xs' role='button' title='Edit'><i class='fa fa-pencil fa-fw' ></i></a>&nbsp;";
								echo "<a href='javascript:void(0)' class='btn btn-danger btn-xs del-btn' role='button' title='Delete' data-id='".$result['DR_ID']."' data-url='dr/ajax/deldr/'><i class='fa fa-trash fa-fw' ></i></a>";
								echo "</td>";
								echo "<td>".$result['DR_ID']."</td>";
								$pet = $this->pet_model->get_pet($result['PET_ID']);
								echo "<td>".$pet['PET_NAME']."</td>";
								$vet = $this->vet_model->get_vet($result['VET_ID']);
								echo "<td>".$vet['F_NAME']." ".$vet['L_NAME']."</td>";
								echo "<td class='sql-date'>".$result['DATE_OF_RECORD']."</td>";
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
