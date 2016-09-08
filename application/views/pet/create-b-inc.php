<!--date-picker-->
<script src="<?php echo base_url(); ?>lib/vendor/datepicker/js/bootstrap-datetimepicker.min.js"></script>
<script>
	$(document).ready(function () {
		//enable datepicker
		$('#DoB').datetimepicker({
			format: 'DD/MM/YYYY'
		});

		var getowners = $.ajax({
			url: '<?php echo base_url(); ?>owner/ajax/getowners',
			dataType: 'json',
			data: {
				order: ['F_NAME', 'asc']
			}
		});
		$.when(getowners).done(function (res) {
			$.each(res.owners, function (i, result) {
				$('#select-owner').append('<option value="' + result.OWNER_ID + '">' + result.F_NAME + ' ' + result.L_NAME + ' #' + result.OWNER_ID + '</option>');
			});
		});
		$('#select-owner').prepend('<option selected hidden value="">Please Choose</option>');

		//submit form with ajax
		$('#create_pet').on('submit', function (event) {
			event.preventDefault();
			var getdate = $('#DoB').val();
			var cvdate = moment(getdate, 'DD/MM/YYYY').format('YYYY-MM-DD');
			$('#DoB').val(cvdate);
			var sumit_data = $(this).serializeArray();
			$('#DoB').val(getdate);
			var url = $(this).attr("action");
			$.post(url, sumit_data).done(function (res) {
				var id = res;
				var mes = '<div id="alertof' + id + '" class="alert alert-success alert-dismissable" style="display:none;">';
				mes += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				mes += 'Pet <a href="<?php echo base_url(); ?>pet/details/' + id + '" class="alert-link">#' + id + '</a> has been created.';
				mes += '</div>';
				$('.alert-place').prepend(mes);
				$('#alertof' + id).fadeIn();
				$('#create_pet')[0].reset();
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
