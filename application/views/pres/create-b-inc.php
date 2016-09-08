<!--date-picker-->
<script src="<?php echo base_url(); ?>lib/vendor/datepicker/js/bootstrap-datetimepicker.min.js"></script>
<script>
	$(document).ready(function () {
		var getdrs = $.ajax({
			url: '<?php echo base_url(); ?>dr/ajax/getdrs',
			dataType: 'json',
			data: {
				order: ['DR_ID', 'asc']
			}
		});
		$.when(getdrs).done(function (res) {
			$.each(res, function (i, result) {
				$('#select-dr').append('<option value="' + result.DR_ID + '">' + result.DR_ID + '</option>');
			});
		});
		$('#select-dr').prepend('<option selected hidden value="">Please Choose</option>');

		var getmeds = $.ajax({
			url: '<?php echo base_url(); ?>med/ajax/getmeds',
			dataType: 'json',
			data: {
				order: ['NAME', 'asc']
			}
		});
		$.when(getmeds).done(function (res) {
			$.each(res.meds, function (i, result) {
				$('#select-med').append('<option value="' + result.MEDICINE_ID + '">' + result.NAME + '</option>');
			});
		});
		$('#select-med').prepend('<option selected hidden value="">Please Choose</option>');

		//submit form with ajax
		$('#create_pres').on('submit', function (event) {
			event.preventDefault();
			var sumit_data = $(this).serializeArray();
			var url = $(this).attr("action");
			$.post(url, sumit_data).done(function (res) {
				var id = res;
				var mes = '<div id="alertof' + id + '" class="alert alert-success alert-dismissable" style="display:none;">';
				mes += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				mes += 'Prescription <a href="<?php echo base_url(); ?>pres/details/' + id + '" class="alert-link">#' + id + '</a> has been created.';
				mes += '</div>';
				$('.alert-place').prepend(mes);
				$('#alertof' + id).fadeIn();
				$('#create_pres')[0].reset();
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
