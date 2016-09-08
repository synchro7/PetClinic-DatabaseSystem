<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-paw fa-fw"></i>Pet</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index">Home</a></li>
				<li><a href="<?php echo base_url(); ?>pet">Pet</a></li>
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
				<li role="presentation"><a href="#owner-details" aria-controls="owner-details" role="tab" data-toggle="tab">Owner Details</a></li>
<!--
				<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
				<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
-->
			</ul>
			<br>
			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="details">
					<form name="edit_pet" id="edit_pet" action="<?php echo base_url(); ?>pet/ajax/update" method="post">
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
											<input class="form-control" id="petid" name="petid" readonly value="<?php echo $pet['PET_ID']; ?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Owner</label>
											<select class="form-control" name="owner" id="select-owner" required>
												<?php
													$owner = $this->owner_model->get_owners();
													foreach ($owner as $result) {
														$printout = '<option value="'.$result['OWNER_ID'].'"';
														if($pet['OWNER_ID']==$result['OWNER_ID']) {
															$printout .= ' selected';
														}
														$printout .= '>'.$result['F_NAME'].' '.$result['L_NAME'].' #'.$result['OWNER_ID'].'</option>';
														echo $printout;
													}
												?>
											</select>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Name</label>
											<input class="form-control" id="petname" name="petname" maxlength="30" required value="<?php echo $pet['PET_NAME']; ?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Breed</label>
											<input class="form-control" id="breed" name="breed" required value="<?php echo $pet['BREED']; ?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Date of Birth</label>
											<input class="form-control sql-date" id="DoB" name="DoB" placeholder="DD/MM/YYYY" value="<?php echo $pet['DATE_OF_BIRTH']; ?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Sex</label>
											<div class="radio">
												<label>
													<input type="radio" name="sex" class="sex" value="M" <?php if($pet[ 'SEX']=='M' )echo 'checked'; ?> required>Male
												</label>
												&nbsp;
												<label>
													<input type="radio" name="sex" class="sex" value="F" <?php if($pet[ 'SEX']=='F' )echo 'checked'; ?> required>Female
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
								<button class="btn btn-primary btn-sm" type="button" name="clearForm" value="clearForm" id="clearForm">
									<i class="fa fa-undo fa-fw"></i> Reset
								</button>
								<button class="btn btn-danger btn-sm" type="button" name="deletion" value="deletion" id="deletion" title="Delete" data-id="<?php echo $pet['PET_ID']; ?>" data-url="pet/ajax/delpet/">
									<i class="fa fa-trash fa-fw"></i> Delete
								</button>
							</div>
							<!-- /.panel-footer -->
						</div>
						<!-- /.panel -->
					</form>
				</div>
				<div role="tabpanel" class="tab-pane" id="owner-details">
					<form id="owner-details-form">
						<div class="panel panel-default">
							<div class="panel-heading">
								Owner Details
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>ID</label>
											<input class="form-control" name="ownerid" id="ownerid" readonly>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Name</label>
											<input class="form-control" name="ownername" id="ownername" readonly>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Phone</label>
											<input class="form-control" id="ownerphone" name="ownerphone" readonly>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Sex</label>
												<input class="form-control" id="ownersex" name="ownersex" readonly >
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Address</label>
											<textarea class="form-control" id="owneraddress" name="owneraddress" readonly></textarea>
										</div>
									</div>
								</div>
							</div>
							<!-- /.panel-body -->
							<div class="panel-footer text-center">
								<a href='<?php echo base_url(); ?>owner/details/<?php echo $pet['OWNER_ID']; ?>' class='btn btn-success btn-sm' role='button' title='Edit'><i class='fa fa-pencil fa-fw' ></i> Edit</a>
							</div>
							<!-- /.panel-footer -->
						</div>
						<!-- /.panel -->
					</form>
				</div>
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
