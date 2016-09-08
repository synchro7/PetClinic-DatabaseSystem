<!--date-picker-->
<script src="<?php echo base_url(); ?>lib/vendor/datepicker/js/bootstrap-datetimepicker.min.js"></script>
<script>
	$(document).ready(function () {
		//enable datepicker
		$('#drdate').datetimepicker({
			format: 'DD/MM/YYYY'
		});

		//submit form with ajax
		$('#edit_dr').on('submit', function (event) {
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
					var getdate = $('#drdate').val();
					var cvdate = moment(getdate, 'DD/MM/YYYY').format('YYYY-MM-DD');
					$('#drdate').val(cvdate);
					var sumit_data = $('#edit_dr').serializeArray();
					$('#drdate').val(getdate);
					var url = $('#edit_dr').attr("action");
					$.post(url, sumit_data).done(function () {
						var id = $.now();
						var mes = '<div id="alertof' + id + '" class="alert alert-success alert-dismissable" style="display:none;">';
						mes += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
						mes += 'This diagnosis record has been updated.';
						mes += '</div>';
						$('.alert-place').prepend(mes);
						$('#alertof' + id).fadeIn();
						setTimeout(function () {
							$('#alertof' + id).fadeOut(function () {
								$('#alertof' + id).remove();
							});
						}, 5000);
						getpetjs();
						getvetjs();
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
			$('#edit_dr')[0].reset();
			var sdc = $('#drdate');
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
						window.location.href = '<?php echo base_url(); ?>dr';
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

		var getpetjs = function () {
			var id = $('#select-pet option:selected').val();
			$.ajax({
				url: '<?php echo base_url(); ?>pet/ajax/getpet/' + id,
				dataType: 'json'
			}).done(function (pet) {
				$('#petid').val(pet['PET_ID']);
				$('#petname').val(pet['PET_NAME']);
				$('#petsex').val((pet['SEX'] == 'M') ? 'Male' : 'Female');
				$('#petbreed').val(pet['BREED']);
				$.ajax({
					url: '<?php echo base_url(); ?>owner/ajax/getowner/' + pet['OWNER_ID'],
					dataType: 'json'
				}).done(function (res) {
					$('#petowner').val(res['owner']['F_NAME'] + ' ' + res['owner']['L_NAME']);
				});
			});
		}
		getpetjs();

		var getvetjs = function () {
			var id = $('#select-vet option:selected').val();
			$.ajax({
				url: '<?php echo base_url(); ?>vet/ajax/getvet/' + id,
				dataType: 'json'
			}).done(function (data) {
				$('#vetid').val(data['vet']['VET_ID']);
				$('#vetname').val(data['vet']['F_NAME'] + ' ' + data['vet']['L_NAME']);
				$('#vetphone').val(data['vet']['PHONE']);
				$('#vetsex').val((data['vet']['SEX'] == 'M') ? 'Male' : 'Female');
				$('#vetadd').val(data['vet']['ADDRESS']);
			});
		}
		getvetjs();
	});
</script>
