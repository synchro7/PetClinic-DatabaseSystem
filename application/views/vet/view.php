<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-user-md fa-fw"></i>Vet</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index">Home</a></li>
				<li><a href="<?php echo base_url(); ?>vet">Vet</a></li>
				<li class="active">Details</li>
			</ol>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#details" aria-controls="details" role="tab" data-toggle="tab">General Details</a></li>
<!--				<li role="presentation"><a href="#pet-details" aria-controls="pet-details" role="tab" data-toggle="tab">Pet Details</a></li>-->
				<!--
				<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
				<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
-->
			</ul>
			<br>
			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="details">
					<form name="edit_vet" id="edit_vet" action="<?php echo base_url(); ?>vet/ajax/update" method="post">
						<div class="panel panel-default">
							<div class="panel-heading">
								General Details
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>ID</label>
											<input class="form-control" id="vetid" name="vetid" readonly value="<?php echo $vet['VET_ID']; ?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Phone</label>
											<input class="form-control" id="vetphone" name="vetphone" required value="<?php echo $vet['PHONE']; ?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>First Name</label>
											<input class="form-control" id="vetfname" name="vetfname" value="<?php echo $vet['F_NAME'] ?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Last Name</label>
											<input class="form-control" id="vetlname" name="vetlname" value="<?php echo $vet['L_NAME'] ?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Address</label>
											<input class="form-control" id="vetaddress" name="vetaddress" value="<?php echo $vet['ADDRESS']; ?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Sex</label>
											<div class="radio">
												<label>
													<input type="radio" name="vetsex" class="sex" value="M" <?php if($vet[ 'SEX']=='M' )echo 'checked'; ?> required>Male
												</label>
												&nbsp;
												<label>
													<input type="radio" name="vetsex" class="sex" value="F" <?php if($vet[ 'SEX']=='F' )echo 'checked'; ?> required>Female
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /.panel-body -->
							<div class="panel-footer text-center">
								<button class="btn btn-success btn-sm" type="submit" name="submit" value="1" id="submit" title="Save">
									<i class="fa fa-save fa-fw"></i> Save
								</button>
								<button class="btn btn-primary btn-sm" type="button" name="clearForm" value="clearForm" id="clearForm" title="Reset">
									<i class="fa fa-undo fa-fw"></i> Reset
								</button>
								<button class="btn btn-danger btn-sm" type="button" name="deletion" value="deletion" id="deletion" title="Delete" data-id="<?php echo $vet['VET_ID']; ?>" data-url='owner/ajax/delowner/'>
									<i class="fa fa-trash fa-fw"></i> Delete
								</button>
							</div>
							<!-- /.panel-footer -->
						</div>
						<!-- /.panel -->
					</form>
				</div>
<!--
				<div role="tabpanel" class="tab-pane" id="pet-details">
				</div>
-->
				<!--
				<div role="tabpanel" class="tab-pane" id="messages">...</div>
				<div role="tabpanel" class="tab-pane" id="settings">...</div>
-->
			</div>
			<!--Tab panes-->
		</div>
		<!-- /.col-lg-12 -->
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
