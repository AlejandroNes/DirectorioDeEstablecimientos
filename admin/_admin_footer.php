<div id="footer">
	<div id="footer-inner">
		<div class="footer-inner-left">
			<?= $site_name; ?>
		</div>
		<div class="footer-inner-right">

		</div>
	</div>
</div><!-- #footer -->

<!-- stylesheets -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,700,400italic,700italic">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<!-- javascript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
	// init todas las descripciones emergentes
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});

	// arreglar la altura modal en el móvil
	$('.modal').on('show.bs.modal', function () {
		$('.modal .modal-body').css('overflow-y', 'auto');
		$('.modal .modal-body').css('max-height', $(window).height() * 0.7);
	});
});
</script>

<!-- efecto de carga de página suave -->
<script>
$(function() {
    $('body').removeClass('fade-out');
});
</script>