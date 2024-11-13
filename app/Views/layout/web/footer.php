			<?php #if ( $event ) : ?>
				<div class="social-media py-4 shadow" id="footer-registrasi">
					<div class="d-flex align-items-center justify-content-center">
						<img src="/img/admin/logo.jpg" alt="Celebes Solusi Digital" class="-img-fluid me-3" id="logoCelebesDigital">
						<div>
							<h5>Developed by</h5>
							<div class="social-icons mt-2">
								<p class="text-danger">CelebesDigital Makassar</p>
							</div>
						</div>
					</div>
					<p class="mb-0">Visit us @ <a href="https://celebesdigital.id" target="blank">www.celebesdigital.id</a></p>
				</div>
			<?php #endif; ?>
		</div>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		<script src="/node_modules/moment/moment.js"></script>
		<script src="/js/script.js"></script>
		<script>
			const jenisTiket = document.getElementById('jenisTiket');
			const htm = document.getElementById('htm');
			const asosiasiMember = document.getElementById('asosiasiMember');
			const fotoDokumen = document.getElementById('fotoDokumen');
			const inputDokumen = document.getElementById('inputDokumen');
			const kodeVoucher = document.getElementById('kodeVoucher');

			if ( asosiasiMember ) {
				if ( asosiasiMember.options[asosiasiMember.selectedIndex].selected == true && asosiasiMember.value === 'UMUM' ) {
					htm.options[2].disabled = true;
				}

				asosiasiMember.addEventListener('change', (el) => {
					let setValue = el.target.value;
					setValue !== 'UMUM' ? htm.options[2].disabled = false : htm.options[2].disabled = true;
					// setValue != 'expo' ? inputDokumen.removeAttribute('disabled') : inputDokumen.setAttribute('disabled', 'disabled');
					// setValue != 'expo' ? kodeVoucher.removeAttribute('disabled') : kodeVoucher.setAttribute('disabled', 'disabled');
				});
			}

			if ( jenisTiket ) {
				// console.log(jenisTiket.options[jenisTiket.selectedIndex].selected)
				// console.log(htm.options[1].selected = true);
				if ( jenisTiket.options[jenisTiket.selectedIndex].selected == true && jenisTiket.value === 'expo' ) {
					htm.setAttribute('disabled', 'disabled');
					inputDokumen.setAttribute('disabled', 'disabled');
					kodeVoucher.setAttribute('disabled', 'disabled');
				}

				jenisTiket.addEventListener('change', (el) => {
					let setValue = el.target.value;
					setValue != 'expo' ? htm.removeAttribute('disabled') : htm.setAttribute('disabled', 'disabled');
					setValue != 'expo' ? inputDokumen.removeAttribute('disabled') : inputDokumen.setAttribute('disabled', 'disabled');
					setValue != 'expo' ? kodeVoucher.removeAttribute('disabled') : kodeVoucher.setAttribute('disabled', 'disabled');
				});
			}
		</script>
	</body>
</html>