<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-file-text fa-fw"></i>Prescription</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index">Home</a></li>
				<li><a href="<?php echo base_url(); ?>pres">Prescription</a></li>
				<li class="active">Create New</li>
			</ol>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<form name="create_pres" id="create_pres" action="<?php echo base_url(); ?>pres/create/submit" method="post">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Create New Prescription
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>DR_ID</label>
									<select class="form-control" name="presdr" id="select-dr" required></select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Medicine</label>
									<select class="form-control" name="presmed" id="select-med" required></select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Total Price</label>
									<input class="form-control" id="drprice" name="drprice">
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
