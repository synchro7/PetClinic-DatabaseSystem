</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>lib/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>lib/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>lib/vendor/metisMenu/metisMenu.min.js"></script>

<!--Moment JS-->
<script src="<?php echo base_url(); ?>lib/vendor/momentjs/moment.min.js"></script>

<!--confirm JS-->
<script src="<?php echo base_url(); ?>lib/vendor/confirmjs/js/jquery-confirm.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>lib/dist/js/sb-admin-2.js"></script>

<!--change date format to be readable-->
<script>
	$(document).ready(function () {
		var readabledate = function (key, option) {
			var sdc = key;
			switch (option) {
			case 'text':
				var sql_date = sdc.text();
				sdc.text(moment(sql_date, 'YYYY-MM-DD').format('DD/MM/YYYY'));
				break;
			case 'input':
				var sql_date = sdc.val();
				sdc.val(moment(sql_date, 'YYYY-MM-DD').format('DD/MM/YYYY'));
				break;
			}
		};
		$('td.sql-date').each(function () {
			readabledate($(this), 'text');
		});
		$('input.sql-date').each(function () {
			readabledate($(this), 'input');
		});
	});
</script>
