		<script src="<?= base_url('node_modules/jquery/dist/jquery.min.js'); ?>"></script>
		<!-- Bootstrap tether Core JavaScript -->
		<script src="<?= base_url('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
		<!--Custom JavaScript -->
		<script>
			$(function() {
				$(".preloader").fadeOut();
			});
			$(function() {
				$('[data-bs-toggle="tooltip"]').tooltip()
			});
			// ==============================================================
			// Login and Recover Password
			// ==============================================================
			$('#to-recover').on("click", function() {
				$("#loginform").slideUp();
				$("#recoverform").fadeIn();
			});
		</script>
	</body>
</html>