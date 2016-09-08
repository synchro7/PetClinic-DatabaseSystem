</script>
<script>
	$(document).ready(function () {
		//submit form with ajax
		$('#edit_vet').on('submit', function (event) {
			event.preventDefault();
			$.confirm({
				icon: 'fa fa-exclamation-circle',
				confirmButtonClass: 'btn-info',
				cancelButtonClass: 'btn-danger',
				confirmButton: 'Yes',
				cancelButton: 'Cancel',
				closeIcon: true,
				title: 'Please Confirm!',
				content: 'Are you sure to overwrite this data?',
				confirm: function () {
					var getdate = $('#DoB').val();
					var cvdate = moment(getdate, 'DD/MM/YYYY').format('YYYY-MM-DD');
					$('#DoB').val(cvdate);
					var sumit_data = $('#edit_vet').serializeArray();
					$('#DoB').val(getdate);
					var url = $('#edit_vet').attr("action");
					$.post(url, sumit_data).done(function () {
						var id = $.now();
						var mes = '<div id="alertof' + id + '" class="alert alert-success alert-dismissable" style="display:none;">';
						mes += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
						mes += 'This vet has been updated.';
						mes += '</div>';
						$('.alert-place').prepend(mes);
						$('#alertof' + id).fadeIn();
						setTimeout(function () {
							$('#alertof' + id).fadeOut(function () {
								$('#alertof' + id).remove();
							});
						}, 5000);
					}).fail(function () {
						var time = $.now();
						var mes = '<div id="alertof' + time + '" class="alert alert-danger alert-dismissable" style="display:none;">';
						mes += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
						mes += 'Something went worng. Please try again later.';
						mes += '</div>';
						$('.alert-place').prepend(mes);
						$('#alertof' + time).fadeIn();
						setTimeout(function () {
							$('#alertof' + time).fadeOut(function () {
								$('#alertof' + time).remove();
							});
						}, 5000);
					});
				}
			});
		});

		$('#clearForm').on('click', function (event) {
			event.preventDefault();
			$('#edit_vet')[0].reset();
			var sdc = $('#DoB');
			var sql_date = sdc.val();
			sdc.val(moment(sql_date, 'YYYY-MM-DD').format('DD/MM/YYYY'));
		});

		$('#deletion').on('click', function (event) {
			event.preventDefault();
			var btn = $(this);
			var id = btn.attr('data-id');
			var url = btn.attr('data-url');
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
						window.location.href = '<?php echo base_url(); ?>vet';
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
</script>
