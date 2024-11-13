<?=
$this->extend('layout/web/header');
$this->section('mainSection');
?>

<?php #if ($event) : ?>
<!-- <form action="<? #= $event ? '/registrasi/peserta' : '!#'; ?>" method="<? #= $event ? 'post' : '!#'; ?>" 
enctype="multipart/form-data" role="form" class="pb-5 shadow" style="max-width: 80vw"> -->

<?= form_open_multipart(attributes: 'role="form" class="elegant-form" id="form-registrasi"'); ?>
<?= csrf_field(); ?>

<div class="form-header">
	<div class="mb-4">
		<img src="/img/flayer-kolaborasi.jpeg" alt="Nama Event" class="img-fluid" />
	</div>
	<h4 class="text-muted mb-4">Form Pendaftaran</h4>
</div>

<?php if (session()->info) : ?>
	<div class="alert alert-success border-0 shadow-sm" role="alert">
		<h5 class="alert-heading text-center">Terima kasih!</h5>
		<p class="text-center mb-0"><?= session()->info; ?></p>
	</div>
<?php endif; ?>

<?php if (!session()->info) : ?>
	<p class="text-muted small mb-4">Input yang dilengkapi simbol <span class="required-field">*</span> wajib diisi!</p>

	<div class="form-group">
		<label for="nama">Nama <span class="required-field">*</span></label>
		<input type="text" name="nama" id="nama" value="<?= old('nama'); ?>"
			class="form-control <?= validation_show_error('nama') ? 'is-invalid' : ''; ?>"
			placeholder="Masukkan nama lengkap">
		<div class="invalid-feedback"><?= validation_show_error('nama'); ?></div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="tgl_lahir">Tanggal Lahir <span class="required-field">*</span></label>
				<input type="date" name="tgl_lahir" id="tgl_lahir" value="<?= old('tgl_lahir'); ?>"
					class="form-control <?= validation_show_error('tgl_lahir') ? 'is-invalid' : ''; ?>">
				<div class="invalid-feedback"><?= validation_show_error('tgl_lahir'); ?></div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="jenisKelamin">Jenis Kelamin <span class="required-field">*</span></label>
				<select name="jenisKelamin" id="jenisKelamin"
					class="form-select <?= validation_show_error('jenisKelamin') ? 'is-invalid' : ''; ?>">
					<option value="">Pilih jenis kelamin</option>
					<option value="l" <?= presetSelect('jenisKelamin', 'l'); ?>>Laki-laki</option>
					<option value="p" <?= presetSelect('jenisKelamin', 'p'); ?>>Perempuan</option>
				</select>
				<div class="invalid-feedback"><?= validation_show_error('jenisKelamin'); ?></div>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label for="noTelp">No. Telp (WA) <span class="required-field">*</span></label>
		<input type="tel" name="noTelp" id="noTelp" value="<?= set_value('noTelp'); ?>"
			class="form-control <?= validation_show_error('noTelp') ? 'is-invalid' : ''; ?>"
			placeholder="08xxxxxxxxxx" pattern="[0-9]{10,13}">
		<div class="invalid-feedback"><?= validation_show_error('noTelp'); ?></div>
	</div>

	<div class="form-group">
		<label for="alamat">Alamat <span class="required-field">*</span></label>
		<textarea name="alamat" id="alamat" rows="3"
			class="form-control <?= validation_show_error('alamat') ? 'is-invalid' : ''; ?>"
			placeholder="Masukkan alamat lengkap"><?= old('alamat'); ?></textarea>
		<div class="invalid-feedback"><?= validation_show_error('alamat'); ?></div>
	</div>

	<div class="form-group">
		<label for="pendidikan">Pendidikan Saat Ini <span class="required-field">*</span></label>
		<input type="text" name="pendidikan" id="pendidikan" value="<?= old('pendidikan'); ?>"
			class="form-control <?= validation_show_error('pendidikan') ? 'is-invalid' : ''; ?>"
			placeholder="Contoh: SMA/SMK/D3/S1">
		<div class="invalid-feedback"><?= validation_show_error('pendidikan'); ?></div>
	</div>

	<div class="form-group">
		<label for="foto">Upload Foto Pribadi <span class="required-field">*</span></label>
		<input type="file" name="foto" id="foto" accept="image/*"
			class="form-control <?= validation_show_error('foto') ? 'is-invalid' : ''; ?>">
		<div class="invalid-feedback"><?= validation_show_error('foto'); ?></div>
		<small class="text-muted">Format: JPG, PNG. Maksimal 5MB</small>
	</div>

	<div class="form-group mt-4">
		<button type="submit" class="btn btn-submit w-100">
			Daftar Sekarang
		</button>
	</div>
<?php endif; ?>
</form>
<?php #else : 
?>
<!-- <div class="alert alert-danger" role="alert">
			<h4 class="alert-heading text-center">Event/Kegiatan tidak tersedia!</h4>
		</div> -->
<?php #endif; 
?>

<?= $this->endSection(); ?>