<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-paw fa-fw"></i>Pet</h1>
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
					<a class="btn btn-success btn-xs pull-right" href="<?php echo base_url(); ?>pet/create" role="button" title="Add New Pet"><i class="fa fa-plus fa-fw"></i> Add New Pet</a>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<?php
						if(!$num_rows){
							echo "<p>The data is empty</p>";
						} else {
							echo '<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-1">';
							echo "<thead><tr><th>Manage</th><th>Pet ID</th><th>Name</th><th>Breed</th><th>Sex</th><th>Date of Birth</th><th>Owner</th></tr></thead>";
							echo "<tbody>";
							foreach ($pet as $result) {
								echo "<tr id='rowof".$result['PET_ID']."'><td style='text-align:center;'>";
								echo "<a href='".base_url()."pet/details/".$result['PET_ID']."' class='btn btn-success btn-xs' role='button' title='Edit'><i class='fa fa-pencil fa-fw' ></i></a>&nbsp;";
								echo "<a href='javascript:void(0)' class='btn btn-danger btn-xs del-btn' role='button' title='Delete' data-id='".$result['PET_ID']."' data-url='pet/ajax/delpet/'><i class='fa fa-trash fa-fw' ></i></a>";
								echo "</td>";
								echo "<td>".$result['PET_ID']."</td>";
								echo "<td>".$result['PET_NAME']."</td>";
								echo "<td>".$result['BREED']."</td>";
								echo "<td>".$result['SEX']."</td>";
								echo "<td class='sql-date'>".$result['DATE_OF_BIRTH']."</td>";
								echo "<td>";
								$owner = $this->owner_model->get_owner($result['OWNER_ID']);
								echo $owner['F_NAME']." ".$owner['L_NAME'];
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
