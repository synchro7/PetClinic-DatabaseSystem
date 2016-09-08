<!--date-picker-->
<script src="<?php echo base_url(); ?>lib/vendor/datepicker/js/bootstrap-datetimepicker.min.js"></script>
<script>
	$(document).ready(function () {
		//enable datepicker
		$('#drdate').datetimepicker({
			format: 'DD/MM/YYYY'
		});

		var getvets = $.ajax({
			url: '<?php echo base_url(); ?>vet/ajax/getvets',
			dataType: 'json',
			data: {
				order: ['F_NAME', 'asc']
			}
		});
		$.when(getvets).done(function (res) {
			$.each(res.vets, function (i, result) {
				$('#select-vet').append('<option value="' + result.VET_ID + '">' + result.F_NAME + ' ' + result.L_NAME + ' #' + result.VET_ID + '</option>');
			});
		});
		$('#select-vet').prepend('<option selected hidden value="">Please Choose</option>');

		var getpets = $.ajax({
			url: '<?php echo base_url(); ?>pet/ajax/getpets',
			dataType: 'json',
			data: {
				order: ['PET_NAME', 'asc']
			}
		});
		$.when(getpets).done(function (res) {
			$.each(res, function (i, result) {
				$('#select-pet').append('<option value="' + result.PET_ID + '">' + result.PET_NAME + ' #' + result.PET_ID + '</option>');
			});
		});
		$('#select-pet').prepend('<option selected hidden value="">Please Choose</option>');

		//submit form with ajax
		$('#create_dr').on('submit', function (event) {
			event.preventDefault();
			var getdate = $('#drdate').val();
			var cvdate = moment(getdate, 'DD/MM/YYYY').format('YYYY-MM-DD');
			$('#drdate').val(cvdate);
			var sumit_data = $(this).serializeArray();
			$('#drdate').val(getdate);
			var url = $(this).attr("action");
			$.post(url, sumit_data).done(function (res) {
				var id = res;
				var mes = '<div id="alertof' + id + '" class="alert alert-success alert-dismissable" style="display:none;">';
				mes += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				mes += 'Dianosis Record <a href="<?php echo base_url(); ?>dr/details/' + id + '" class="alert-link">#' + id + '</a> has been created.';
				mes += '</div>';
				$('.alert-place').prepend(mes);
				$('#alertof' + id).fadeIn();
				$('#create_dr')[0].reset();
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
		});
	});
</script>
