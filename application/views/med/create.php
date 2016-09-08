<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-medkit fa-fw"></i>Medicine</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index">Home</a></li>
				<li><a href="<?php echo base_url(); ?>med">Medicine</a></li>
				<li class="active">Create New</li>
			</ol>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<form name="create_med" id="create_med" action="<?php echo base_url(); ?>med/create/submit" method="post">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Create New Medicine
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Name</label>
									<input class="form-control" id="medname" name="medname" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Price</label>
									<input class="form-control" id="medprice" name="medprice" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Description</label>
									<textarea class="form-control" id="meddescription" name="meddescription" required></textarea>
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
