<?=
$this->extend('layout/web/header');
$this->section('mainSection');
?>
<form class="pb-3 shadow" id="form-registrasi">
	<div class="alert alert-info mt-2 rounded text-center rounded" role="alert">
		<h4 class="alert-heading">
			Terima kasih <strong><?= $sapaan . ' ' . $peserta->nama; ?></strong> sudah mendaftar!
		</h4>
		<!-- <h5>Akun Bapak/Ibu akan divalidasi oleh Admin Registrasi</h5>-->
		<p class="fs-5">
			Kamu akan menerima pesan yang dikirimkan melalui nomor WhatsApp yang sudah didaftarkan sebelumnya.
		</p>
		<p>Untuk mendapatkan kode QrCode, konfirmasi pembayaran anda kepada nomor admin kami.</p>
	</div>

	<div class="form-icon">
		<div class="shadow rounded-3 d-flex justify-content-center py-5">
			<div class="mb-4 row row-cols-1 row-cols-md-2">
				<!-- <img src="/img/flayer-kolaborasi.jpeg" alt="Nama Event" class="img-fluid" /> -->
			<img src="/img/flayer-1.jpeg" alt="Nama Event" class="img-fluid col" />
			<img src="/img/flayer-2.jpeg" alt="Nama Event" class="img-fluid col" />
	</div>
	</div>
	</div>
</form>

<?= $this->endSection(); ?>