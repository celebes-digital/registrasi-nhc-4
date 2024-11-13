<?=
$this->extend('layout/web/header');
$this->section('mainSection');
?>
	<form class="pb-3 shadow" id="form-registrasi">
		<div class="alert alert-info mt-2 rounded text-center rounded" role="alert">
			<h4 class="alert-heading">
				Terima kasih <strong><?= $sapaan . ' ' . $peserta->nama; ?></strong> sudah mendaftar!
			</h4>
			<!-- <h5>Akun Bapak/Ibu akan divalidasi oleh Admin Registrasi</h5>
			<p>Bapak/Ibu bisa melunasi pembayaran melalui transfer rekening bank sebagai berikut:</p> -->
			<p class="fs-5">
				Kamu akan menerima QrCode yang dikirimkan melalui nomor WhatsApp yang sudah didaftarkan sebelumnya.
			</p>
		</div>

		<div class="form-icon">
			<div class="shadow rounded-3 d-flex justify-content-center py-5">
				<img src="/img/flayer-kolaborasi.jpeg" alt="Festival Laundry & UMKM 2024 | KOPDARNAS - IBLA" class="img-fluid" />
			</div>
		</div>
	</form>

<?= $this->endSection(); ?>