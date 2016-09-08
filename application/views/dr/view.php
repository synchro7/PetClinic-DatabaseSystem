<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-stethoscope fa-fw"></i>Diagnosis Record</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index">Home</a></li>
				<li><a href="<?php echo base_url(); ?>dr">Diagnosis Record</a></li>
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
				<li role="presentation"><a href="#vet-details" aria-controls="vet-details" role="tab" data-toggle="tab">Vet Details</a></li>
			</ul>
			<br>
			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="details">
					<form name="edit_dr" id="edit_dr" action="<?php echo base_url(); ?>dr/ajax/update" method="post">
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
											<input class="form-control" id="drid" name="drid" readonly value="<?php echo $dr['DR_ID']; ?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Date of Record</label>
											<input class="form-control sql-date" id="drdate" name="drdate" placeholder="DD/MM/YYYY" value="<?php echo $dr['DATE_OF_RECORD']; ?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Pet Name</label>
											<select class="form-control" name="drpet" id="select-pet" required>
												<?php
													$pets = $this->pet_model->get_pets();
													foreach ($pets as $result) {
														$printout = '<option value="'.$result['PET_ID'].'"';
														if($dr['PET_ID']==$result['PET_ID']) {
															$printout .= ' selected';
														}
														$printout .= '>'.$result['PET_NAME'].' #'.$result['PET_ID'].'</option>';
														echo $printout;
													}
												?>
											</select>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Vet Name</label>
											<select class="form-control" name="drvet" id="select-vet" required>
												<?php
													$vets = $this->vet_model->get_vets();
													foreach ($vets as $result) {
														$printout = '<option value="'.$result['VET_ID'].'"';
														if($dr['VET_ID']==$result['VET_ID']) {
															$printout .= ' selected';
														}
														$printout .= '>'.$result['F_NAME'].' '.$result['L_NAME'].' #'.$result['VET_ID'].'</option>';
														echo $printout;
													}
												?>
											</select>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Details</label>
											<textarea class="form-control" id="drdetail" name="drdetail" required value=""><?php echo $dr['DETAIL']; ?></textarea>
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
								<button class="btn btn-danger btn-sm" type="button" name="deletion" value="deletion" id="deletion" title="Delete" data-id="<?php echo $dr['DR_ID']; ?>" data-url="pet/ajax/delpet/">
									<i class="fa fa-trash fa-fw"></i> Delete
								</button>
							</div>
							<!-- /.panel-footer -->
						</div>
						<!-- /.panel -->
					</form>
				</div>
				<div role="tabpanel" class="tab-pane" id="pet-details">
					<form id="owner-details-form">
						<div class="panel panel-default">
							<div class="panel-heading">
								Pet Details
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>ID</label>
											<input class="form-control" name="petid" id="petid" readonly>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Owner</label>
											<input class="form-control" name="petowner" id="petowner" readonly>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Name</label>
											<input class="form-control" id="petname" name="petname" readonly>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Breed</label>
												<input class="form-control" id="petbreed" name="petbreed" readonly >
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Sex</label>
												<input class="form-control" id="petsex" name="petsex" readonly >
										</div>
									</div>
								</div>
							</div>
							<!-- /.panel-body -->
							<div class="panel-footer text-center">
								<a href='<?php echo base_url(); ?>pet/details/<?php echo $dr['PET_ID']; ?>' class='btn btn-success btn-sm' role='button' title='Edit'><i class='fa fa-pencil fa-fw' ></i> Edit</a>
							</div>
							<!-- /.panel-footer -->
						</div>
						<!-- /.panel -->
					</form>
				</div>

				<div role="tabpanel" class="tab-pane" id="vet-details">
					<form id="owner-details-form">
						<div class="panel panel-default">
							<div class="panel-heading">
								Pet Details
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>ID</label>
											<input class="form-control" name="vetid" id="vetid" readonly>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Name</label>
											<input class="form-control" name="vetname" id="vetname" readonly>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Phone</label>
											<input class="form-control" id="vetphone" name="vetphone" readonly>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Address</label>
												<input class="form-control" id="vetadd" name="vetadd" readonly >
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Sex</label>
												<input class="form-control" id="vetsex" name="vetsex" readonly >
										</div>
									</div>
								</div>
							</div>
							<!-- /.panel-body -->
							<div class="panel-footer text-center">
								<a href='<?php echo base_url(); ?>vet/details/<?php echo $dr['VET_ID']; ?>' class='btn btn-success btn-sm' role='button' title='Edit'><i class='fa fa-pencil fa-fw' ></i> Edit</a>
							</div>
							<!-- /.panel-footer -->
						</div>
						<!-- /.panel -->
					</form>
				</div>

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
