<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-paw fa-fw"></i>Pet</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index">Home</a></li>
				<li><a href="<?php echo base_url(); ?>pet">Pet</a></li>
				<li class="active">Create New</li>
			</ol>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<form name="create_pet" id="create_pet" action="<?php echo base_url(); ?>pet/create/submit" method="post">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Create New Pet
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Owner</label>
									<select class="form-control" name="owner" id="select-owner" required></select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Name</label>
									<input class="form-control" id="petname" name="petname" maxlength="30" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Breed</label>
									<input class="form-control" id="breed" name="breed" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Date of Birth</label>
									<input class="form-control" id="DoB" name="DoB" placeholder="DD/MM/YYYY">
								</div>
							</div>
							<div class="col-lg-12 text-center">
								<div class="form-group">
									<label>Sex</label>
									<div class="radio">
										<label>
											<input type="radio" name="sex" class="sex" value="M" required>Male
										</label>
										&nbsp;
										<label>
											<input type="radio" name="sex" class="sex" value="F" required>Female
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
