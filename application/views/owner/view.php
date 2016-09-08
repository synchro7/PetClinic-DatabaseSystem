<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-user fa-fw"></i>Owner</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index">Home</a></li>
				<li><a href="<?php echo base_url(); ?>owner">Owner</a></li>
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
				<li role="presentation"><a href="#pet-details" aria-controls="pet-details" role="tab" data-toggle="tab">Pet Details</a></li>
				<!--
				<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
				<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
-->
			</ul>
			<br>
			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="details">
					<form name="edit_owner" id="edit_owner" action="<?php echo base_url(); ?>owner/ajax/update" method="post">
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
											<input class="form-control" id="ownerid" name="ownerid" readonly value="<?php echo $owner['OWNER_ID']; ?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Phone</label>
											<input class="form-control" id="ownerphone" name="ownerphone" required value="<?php echo $owner['PHONE']; ?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>First Name</label>
											<input class="form-control" id="ownerfname" name="ownerfname" value="<?php echo $owner['F_NAME'] ?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Last Name</label>
											<input class="form-control" id="ownerlname" name="ownerlname" value="<?php echo $owner['L_NAME'] ?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Address</label>
											<input class="form-control" id="owneraddress" name="owneraddress" value="<?php echo $owner['ADDRESS']; ?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Sex</label>
											<div class="radio">
												<label>
													<input type="radio" name="ownersex" class="sex" value="M" <?php if($owner[ 'SEX']=='M' )echo 'checked'; ?> required>Male
												</label>
												&nbsp;
												<label>
													<input type="radio" name="ownersex" class="sex" value="F" <?php if($owner[ 'SEX']=='F' )echo 'checked'; ?> required>Female
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
								<button class="btn btn-danger btn-sm" type="button" name="deletion" value="deletion" id="deletion" title="Delete" data-id="<?php echo $owner['OWNER_ID']; ?>" data-url='owner/ajax/delowner/'>
									<i class="fa fa-trash fa-fw"></i> Delete
								</button>
							</div>
							<!-- /.panel-footer -->
						</div>
						<!-- /.panel -->
					</form>
				</div>
				<div role="tabpanel" class="tab-pane" id="pet-details">

					<div class="panel panel-default">
						<div class="panel-heading">
							Pet Details
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<?php
								if($pets == null){
									echo "<p>This owner doesn't own any pet.</p>";
								} else {
									echo '<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-1">';
									echo "<thead><tr><th>Manage</th><th>Pet ID</th><th>Name</th><th>Breed</th><th>Sex</th><th>Date of Birth</th><th>Owner</th></tr></thead>";
									echo "<tbody>";
									foreach ($pets as $result) {
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
					</div>
					<!-- /.panel -->
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
