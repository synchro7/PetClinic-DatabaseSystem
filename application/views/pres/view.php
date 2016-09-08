<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><i class="fa fa-file-text fa-fw"></i>Prescription</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>index">Home</a></li>
				<li><a href="<?php echo base_url(); ?>pres">Prescription</a></li>
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
				<li role="presentation"><a href="#dr-details" aria-controls="dr-details" role="tab" data-toggle="tab">Diagnosis Details</a></li>
				<li role="presentation"><a href="#med-details" aria-controls="med-details" role="tab" data-toggle="tab">Medicine Details</a></li>
			</ul>
			<br>
			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="details">
					<form name="edit_pres" id="edit_pres" action="<?php echo base_url(); ?>pres/ajax/update" method="post">
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
											<input class="form-control" id="presid" name="presid" readonly value="<?php echo $pres['PRE_ID']; ?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Price</label>
											<input class="form-control" id="presid" name="presid" value="<?php echo $pres['TOTAL_PRICE']; ?>" type="number">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>DR ID</label>
											<select class="form-control" name="presdr" id="select-dr" required>
												<?php
													$drs = $this->diag_model->get_drs();
													foreach ($drs as $result) {
														$printout = '<option value="'.$result['DR_ID'].'"';
														if($pres['DR_ID']==$result['DR_ID']) {
															$printout .= ' selected';
														}
														$printout .= '>'.$result['DR_ID'].'</option>';
														echo $printout;
													}
												?>
											</select>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Medicine</label>
											<select class="form-control" name="presmed" id="select-med" required>
												<?php
													$meds = $this->med_model->get_meds();
													foreach ($meds as $result) {
														$printout = '<option value="'.$result['MEDICINE_ID'].'"';
														if($pres['MEDICINE_ID']==$result['MEDICINE_ID']) {
															$printout .= ' selected';
														}
														$printout .= '>'.$result['NAME'].'</option>';
														echo $printout;
													}
												?>
											</select>
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
								<button class="btn btn-danger btn-sm" type="button" name="deletion" value="deletion" id="deletion" title="Delete" data-id="<?php echo $pres['PRE_ID']; ?>" data-url="pet/ajax/delpet/">
									<i class="fa fa-trash fa-fw"></i> Delete
								</button>
							</div>
							<!-- /.panel-footer -->
						</div>
						<!-- /.panel -->
					</form>
				</div>
				<div role="tabpanel" class="tab-pane" id="dr-details">
					<form id="owner-details-form">
						<div class="panel panel-default">
							<div class="panel-heading">
								Diagnosis Details
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>ID</label>
											<input class="form-control" id="drid" name="drid" readonly>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Date of Record</label>
											<input class="form-control sql-date" id="drdate" name="drdate" placeholder="DD/MM/YYYY" readonly>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Pet Name</label>
											<input class="form-control" name="drpet" id="drpet" readonly>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Vet Name</label>
											<input class="form-control" name="drvet" id="drvet" readonly>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Details</label>
											<textarea class="form-control" id="drdetail" name="drdetail" readonly></textarea>
										</div>
									</div>
								</div>
							</div>
							<!-- /.panel-body -->
							<div class="panel-footer text-center">
								<a href='<?php echo base_url(); ?>dr/details/<?php echo $pres['DR_ID']; ?>' class='btn btn-success btn-sm' role='button' title='Edit'><i class='fa fa-pencil fa-fw' ></i> Edit</a>
							</div>
							<!-- /.panel-footer -->
						</div>
						<!-- /.panel -->
					</form>
				</div>

				<div role="tabpanel" class="tab-pane" id="med-details">
					<form id="owner-details-form">
						<div class="panel panel-default">
							<div class="panel-heading">
								Medicine Details
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>ID</label>
											<input class="form-control" id="medid" name="medid" readonly>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Name</label>
											<input class="form-control" id="medname" name="medname" readonly>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Price</label>
											<input class="form-control" id="medprice" name="medprice" readonly>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Description</label>
											<textarea class="form-control" id="meddescription" name="meddescription" readonly></textarea>
										</div>
									</div>
								</div>
							</div>
							<!-- /.panel-body -->
							<div class="panel-footer text-center">
								<a href='<?php echo base_url(); ?>med/details/<?php echo $pres['MEDICINE_ID']; ?>' class='btn btn-success btn-sm' role='button' title='Edit'><i class='fa fa-pencil fa-fw' ></i> Edit</a>
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
