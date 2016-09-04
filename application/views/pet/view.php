<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Pet</h1>
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
				<li role="presentation" class="active"><a href="#details" aria-controls="home" role="tab" data-toggle="tab">General Details</a></li>
				<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
				<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
				<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
			</ul>
			<br>
			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="details">
					<div class="panel panel-default">
						<div class="panel-heading">
							General Details
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<?php
								if(empty($pet['PET_NAME'])) {
									echo "<p>Data not Found!</p>";
								} else {
									echo $pet['PET_NAME'];
								}
							?>
							<!-- /.table-responsive -->
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
				</div>
				<div role="tabpanel" class="tab-pane" id="profile">...</div>
				<div role="tabpanel" class="tab-pane" id="messages">...</div>
				<div role="tabpanel" class="tab-pane" id="settings">...</div>
			</div>
			<!--Tab panes-->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->
