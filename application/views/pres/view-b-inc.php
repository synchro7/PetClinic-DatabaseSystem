<!--date-picker-->
<script src="<?php echo base_url(); ?>lib/vendor/datepicker/js/bootstrap-datetimepicker.min.js"></script>
<script>
	$(document).ready(function () {
		//submit form with ajax
		$('#edit_pres').on('submit', function (event) {
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
					var sumit_data = $('#edit_dr').serializeArray();
					var url = $('#edit_pres').attr("action");
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
						getdrjs();
						getmedjs();
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
			$('#edit_pres')[0].reset();
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
						window.location.href = '<?php echo base_url(); ?>pres';
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

		var getdrjs = function () {
			var id = $('#select-dr option:selected').val();
			$.ajax({
				url: '<?php echo base_url(); ?>dr/ajax/getdr/' + id,
				dataType: 'json'
			}).done(function (res) {
				$('#drid').val(res['DR_ID']);
				$('#drdate').val(res['DATE_OF_RECORD']);
				$('#drdate').val(
					moment($('#drdate').val(), 'YYYY-MM-DD').format('DD/MM/YYYY')
				);
				$('#drdetail').val(res['DETAIL']);
				$.ajax({
					url: '<?php echo base_url(); ?>pet/ajax/getpet/' + res['PET_ID'],
					dataType: 'json'
				}).done(function (res) {
					$('#drpet').val(res['PET_NAME']);
				});
				$.ajax({
					url: '<?php echo base_url(); ?>vet/ajax/getvet/' + res['VET_ID'],
					dataType: 'json'
				}).done(function (res) {
					$('#drvet').val(res['vet']['F_NAME'] + ' ' + res['vet']['L_NAME']);
				});
			});
		}
		getdrjs();

		var getmedjs = function () {
			var id = $('#select-med option:selected').val();
			$.ajax({
				url: '<?php echo base_url(); ?>med/ajax/getmed/' + id,
				dataType: 'json'
			}).done(function (data) {
				$('#medid').val(data['med']['MEDICINE_ID']);
				$('#medname').val(data['med']['NAME']);
				$('#medprice').val(data['med']['PRICE']);
				$('#meddescription').val(data['med']['DESCRIPTION']);
			});
		}
		getmedjs();
	});
</script>
