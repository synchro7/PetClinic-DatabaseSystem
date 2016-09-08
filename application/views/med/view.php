<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-medkit fa-fw"></i>Medicine</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index">Home</a></li>
				<li><a href="<?php echo base_url(); ?>med">Medicine</a></li>
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
					<form name="edit_med" id="edit_med" action="<?php echo base_url(); ?>med/ajax/update" method="post">
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
											<input class="form-control" id="medid" name="medid" readonly value="<?php echo $med['MEDICINE_ID']; ?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Name</label>
											<input class="form-control" id="medname" name="medname" required value="<?php echo $med['NAME']; ?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Price</label>
											<input class="form-control" id="medprice" name="medprice" value="<?php echo $med['PRICE'] ?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Desscription</label>
											<textarea class="form-control" id="meddescription" name="meddescription"><?php echo $med['DESCRIPTION'] ?></textarea>
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
								<button class="btn btn-danger btn-sm" type="button" name="deletion" value="deletion" id="deletion" title="Delete" data-id="<?php echo $med['MEDICINE_ID']; ?>" data-url='owner/ajax/delowner/'>
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
