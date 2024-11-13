			</div>
			<!-- ============================================================== -->
			<!-- End Page wrapper  -->
			<!-- ============================================================== -->
			<footer class="footer">
				&copy; <?= date('Y'); ?> Celebes Solusi Digital. Theme Eliteadmin by themedesigner.in <a href="https://www.wrappixel.com/">WrapPixel</a>
			</footer>
		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<script src="/node_modules/jquery/dist/jquery.min.js"></script>
		<script src="/node_modules/popper/popper.min.js"></script>
		<script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
		<script src="/js/admin/perfect-scrollbar.jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.4/dist/sweetalert2.all.min.js" referrerpolicy="origin"></script>
		<script src="/node_modules/moment/moment.js"></script>
		<script src="/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
		<script src="/node_modules/mask/jquery.mask.min.js"></script>
		<script src="/js/admin/waves.js"></script>
		<script src="/js/admin/sidebarmenu.js"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->
		<script src="/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
		<script src="/node_modules/switchery/switchery.min.js"></script>
		<script src="/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
		<!-- <script type="module" src="/node_modules/spin.js/spin.umd.js"></script> -->
		<script src="/js/admin/custom.min.js"></script>

		<script>
			// const kodeRegistrasi 	= document.querySelector('#kodeRegistrasi');
			const flashdata			= $('#flashdata').data('flashdata');
			// const pesertaTerdaftar	= $('.peserta_terdaftar');
			const hapusPeserta		= [].slice.call(document.querySelectorAll('.hapus_peserta'));
			const dataPeserta		= [].slice.call(document.querySelectorAll('.list_data_peserta'));
			const dataValidasi		= [].slice.call(document.querySelectorAll('.data_peserta'));
			const updateStatusEvent	= [].slice.call(document.querySelectorAll('.updateStatusEvent'));
			const updateSesiEvent	= [].slice.call(document.querySelectorAll('.updateSesiEvent')); // updateSesiEvent
			const modalRegistrasi	= $('#modal-data-registrasi');
			const modalDataPeserta	= $('#modal-data-peserta');
			const tooltipTrigger	= [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
			const tooltipList		= tooltipTrigger.map((tooltipTriggerEl) => {
											return new bootstrap.Tooltip(tooltipTriggerEl)
										});

			const textFlashdata = {'Error': 'error', 'Success': 'success', 'Info': 'info'};

			$('.tgl').bootstrapMaterialDatePicker({ format: 'YYYY-MM-DD', time: false });

			if ( updateSesiEvent ) {
				updateSesiEvent.forEach((btn) => {
					btn.addEventListener('click', (el) => {
						const url = el.currentTarget.dataset.url;
						const modal = document.getElementById('modalSesiEvent');
						fetch(url)
						.then((resp) => resp.text())
						.then((res) => {
							modal.querySelector('.modal-content').innerHTML = res;
							$('.tgl').bootstrapMaterialDatePicker({ format: 'YYYY-MM-DD', time: false });
						});
					});
				});
			}
			// Update status event aktif / non aktif
			if ( updateStatusEvent ) {
				updateStatusEvent.forEach(event => {
					event.addEventListener('click', (e) => {
						e.preventDefault();
						const url = event.href;
						confirmNotif('PERHATIAN!', 'Status event diupdate ! Anda yakin ?')
						.then((t) => {
							// t.isConfirmed ? location.href = url : t.isDismissed === Swal.DismissReason.cancel && Swal.fire({
							t.isConfirmed ? location.href = url : Swal.fire({
								title: "Preoses dibatalkan!",
								icon: "error",
								hideClass: {
									popup: 'animate__animated animate__fadeOutUp'
								}
							});
						});
					});
				});
			}

			// modal Hapus Peserta
			if ( hapusPeserta ) {
				hapusPeserta.forEach(peserta => {
					peserta.addEventListener('click', (e) => {
						e.preventDefault();
						const url = peserta.href;
						confirmNotif('PERHATIAN!', 'Data Peserta akan DIHAPUS! Anda yakin ?')
						.then((t) => {
							// t.isConfirmed ? location.href = url : t.isDismissed === Swal.DismissReason.cancel && Swal.fire({
							t.isConfirmed ? location.href = url : Swal.fire({
								title: "Preoses dibatalkan!",
								icon: "error",
								hideClass: {
									popup: 'animate__animated animate__fadeOutUp'
								}
							});
						});
					});
				});
			}

			// Data Peserta
			if ( dataPeserta ) {
				dataPeserta.forEach(peserta => {
					peserta.addEventListener('click', () => {
						const url = peserta.dataset.url;
						fetch(url)
						.then((resp) => resp.text())
						.then((data) => {
							// console.log(data)
							modalDataPeserta.find('.modal-content').html(data);
							$(".datatable").DataTable({
								stateSave: true,
								lengthChange: false,
								responsive: true,
								language: {
									paginate: {
										previous: `<i class="icon-arrow-left me-1">`,
										next: `<i class="icon-arrow-right ms-1">`,
									},
								}
							});
						});
					});
				});
			}

			// Data Validasi
			if ( dataValidasi ) {
				dataValidasi.forEach(peserta => {
					peserta.addEventListener('click', () => {
						const url = peserta.dataset.url;
						fetch(url)
						.then((resp) => resp.text())
						.then((data) => {
							modalDataPeserta.find('.modal-content').html(data);
						});
					});
				});
			}

			//==== Flashdata sweetalert ====//
			if ( flashdata && flashdata.length > 0 ) {
				Swal.fire({
					position: "top-center",
					icon: "info",
					title: "Confirm!",
					html: `${flashdata}`,
					timer: 3000,
					showConfirmButton: true,
					showClass: {
						popup: 'animate__animated animate__fadeInDown'
					},
					hideClass: {
						popup: 'animate__animated animate__fadeOutUp'
					}
				});
			}
			//==== End Flashdata sweetalert ====//
			modalDataPeserta.on('hidden.bs.modal', function() {
				$('.modal-content').html('');
			});

			// update status
			// pesertaTerdaftar.on('click', '.data_peserta', function(e) {
			// 	e.preventDefault();
			// 	const dataUrl = $(this).data('url');
			// 	$.ajax({
			// 		url: dataUrl,
			// 		type: "GET",
			// 		data: {
			// 			timestamps: Date.now(),
			// 		},
			// 		headers: {'X-Requested-With': 'XMLHttpRequest'},
			// 		beforeSend: function() {
			// 			modalDataPeserta.find('.modal-content').html('<span class="text-right p-3">Load data...</span>')
			// 		},
			// 		success: function (data) {
			// 			modalDataPeserta.on('shown.bs.modal', function() {
			// 				modalDataPeserta.find('.modal-content').html(data)
			// 				$('.js-switch').each(function () {
			// 					new Switchery($(this)[0], $(this).data())
			// 				});
			// 			});
			// 		},
			// 		error: function (xhr, errMsg) {
			// 			alert(xhr.status + "\n" + xhr.responseText + "\n" + errMsg)
			// 		}
			// 	});
			// });

			$(".datatable").DataTable({
				responsive: !1,
				stateSave: true,
				lengthChange: false,
				responsive: true,
				language: {
					paginate: {
						previous: `<i class="icon-arrow-left me-1">`,
						next: `<i class="icon-arrow-right ms-1">`,
					},
				}
			});

			function limitText(limitField, limitNum) {
				if ( limitField.value.length > limitNum ) {
					limitField.value = limitField.value.substring(0, limitNum);
				}
			}

			function confirmNotif(title, msg, href = null) {
				return Swal.fire({
					position: "center",
					icon: "warning",
					title: `${title}`,
					html: `${msg}`,
					// timer: 2500,
					showCancelButton: true,
					confirmButtonColor: "#3085d6",
					cancelButtonColor: "#D33355",
					confirmButtonText: "Ya, Lanjutkan!",
					cancelButtonText: "Batalkan",
					showClass: {
						popup: "animate__animated animate__fadeInDown",
					},
					hideClass: {
						popup: "animate__animated animate__zoomOut",
					},
				});
			}

			function notif(type, title, msg) {
				return Swal.fire({
					position: "top-end",
					icon: `${type}`,
					title: `${title}`,
					html: `${msg}`,
					timer: 2000,
					showConfirmButton: false,
					showClass: {
						popup: "animate__animated animate__fadeInDown",
					},
					hideClass: {
						popup: "animate__animated animate__fadeOutUp",
					},
				}).then((t) => {
					window.location.reload();
				});
			}
		</script>
	</body>
</html>