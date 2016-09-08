<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-stethoscope fa-fw"></i>Diagnosis Record</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index">Home</a></li>
				<li><a href="<?php echo base_url(); ?>dr">Diagnosis Record</a></li>
				<li class="active">Create New</li>
			</ol>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<form name="create_dr" id="create_dr" action="<?php echo base_url(); ?>dr/create/submit" method="post">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Create New Diagnosis Record
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Pet</label>
									<select class="form-control" name="drpet" id="select-pet" required></select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Vet</label>
									<select class="form-control" name="drvet" id="select-vet" required></select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Date of Record</label>
									<input class="form-control" id="drdate" name="drdate" placeholder="DD/MM/YYYY">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Details</label>
									<textarea class="form-control" id="drdetail" name="drdetail" required></textarea>
								</div>
							</div>
						</div>
					</div>
					<!-- /.panel-body -->
					<div class="panel-footer text-center">
						<button class="btn btn-success btn-sm" type="submit" name="submit" value="1" id="submit">
							<i class="fa fa-save fa-fw"></i> Save
						</button>
					</div>
					<!-- /.panel-footer -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->
		</form>
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12 alert-place">
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->
