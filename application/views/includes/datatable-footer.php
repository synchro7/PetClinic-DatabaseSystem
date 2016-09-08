<!-- DataTables JavaScript -->
<script src="<?php echo base_url(); ?>lib/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>lib/vendor/datatables/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>lib/vendor/datatables/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>lib/vendor/datatables/js/responsive.bootstrap.min.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
	$(document).ready(function () {
		//	init delete button
		$('.del-btn').each(function () {
			var btn = $(this);
			var id = btn.attr('data-id');
			var url = btn.attr('data-url');
			btn.click(function () {
				$.confirm({
					icon: 'fa fa-exclamation-circle',
					confirmButtonClass: 'btn-info',
					cancelButtonClass: 'btn-danger',
					confirmButton: 'Yes',
					cancelButton: 'Cancel',
					closeIcon: true,
					title: 'Please Confirm!',
					content: 'Are you sure to delete row #' + id + '?',
					confirm: function () {
						$.ajax({
							url: '<?php echo base_url(); ?>' + url + id
						}).done(function () {
							table.row('#rowof' + id).remove().draw(false);
						}).fail(function () {
							$.alert({
								icon: 'fa fa-exclamation-circle',
								backgroundDismiss: true,
								confirmButtonClass: 'btn-danger',
								confirmButton: 'Close',
								closeIcon: true,
								title: 'Error!',
								content: 'Cannot delete row #' + id + '?'
							});
						});
					}
				});
			});
		});
		//init table
		var table = $('#dataTables-1').DataTable({
			order: [],
			columnDefs: [{
				targets: 0,
				orderable: false
			}],
			responsive: true
		});
	});
</script>
