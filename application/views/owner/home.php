<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-user fa-fw"></i>Owner</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index">Home</a></li>
				<li class="active">Owner</li>
			</ol>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					List of all Owners
					<a class="btn btn-success btn-xs pull-right" href="<?php echo base_url(); ?>owner/create" role="button" title="Add New Owner"><i class="fa fa-plus fa-fw"></i> Add New Owner</a>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<?php
						if(!$num_rows){
							echo "<p>The data is empty</p>";
						} else {
							echo '<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-1">';
							echo "<thead><tr><th>Manage</th><th>ID</th><th>Name</th><th>Phone</th></tr></thead>";
							echo "<tbody>";
							foreach ($owners as $result) {
								echo "<tr id='rowof".$result['OWNER_ID']."'><td style='text-align:center;'>";
								echo "<a href='".base_url()."owner/details/".$result['OWNER_ID']."' class='btn btn-success btn-xs' role='button' title='Edit'><i class='fa fa-pencil fa-fw' ></i></a>&nbsp;";
								echo "<a href='javascript:void(0)' class='btn btn-danger btn-xs del-btn' role='button' title='Delete' data-id='".$result['OWNER_ID']."' data-url='owner/ajax/delowner/'><i class='fa fa-trash fa-fw' ></i></a>";
								echo "</td>";
								echo "<td>".$result['OWNER_ID']."</td>";
								echo "<td>".$result['F_NAME']." ".$result['L_NAME']."</td>";
								echo "<td>".$result['PHONE']."</td>";
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
