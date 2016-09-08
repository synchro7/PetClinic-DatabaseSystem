<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-user-md fa-fw"></i>Vet</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index">Home</a></li>
				<li><a href="<?php echo base_url(); ?>vet">Vet</a></li>
				<li class="active">Create New</li>
			</ol>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<form name="create_vet" id="create_vet" action="<?php echo base_url(); ?>vet/create/submit" method="post">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Create New Vet
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>First Name</label>
											<input class="form-control" id="vetfname" name="vetfname" required>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Last Name</label>
											<input class="form-control" id="vetlname" name="vetlname" required>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Phone</label>
											<input class="form-control" id="vetphone" name="vetphone" required >
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Address</label>
											<input class="form-control" id="vetaddress" name="vetaddress" required>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Sex</label>
											<div class="radio">
												<label>
													<input type="radio" name="vetsex" class="vetsex" value="M" required>Male
												</label>
												&nbsp;
												<label>
													<input type="radio" name="vetsex" class="vetsex" value="F" required>Female
												</label>
											</div>
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
