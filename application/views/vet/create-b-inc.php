<!--date-picker-->
<script>
	$(document).ready(function () {
		//submit form with ajax
		$('#create_vet').on('submit', function (event) {
			event.preventDefault();
			var sumit_data = $(this).serializeArray();
			var url = $(this).attr("action");
			$.post(url, sumit_data).done(function (res) {
				var id = res;
				var mes = '<div id="alertof' + id + '" class="alert alert-success alert-dismissable" style="display:none;">';
				mes += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				mes += 'Vet <a href="<?php echo base_url(); ?>vet/details/' + id + '" class="alert-link">#' + id + '</a> has been created.';
				mes += '</div>';
				$('.alert-place').prepend(mes);
				$('#alertof' + id).fadeIn();
				$('#create_vet')[0].reset();
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
