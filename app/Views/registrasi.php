<?=
$this->extend('layout/web/header');
$this->section('mainSection');
?>

<?php #if ($event) : 
?>
<!-- <form action="<? #= $event ? '/registrasi/peserta' : '!#'; 
					?>" 
method="<? #= $event ? 'post' : '!#'; 
		?>" 
enctype="multipart/form-data" role="form" class="pb-5 shadow" style="max-width: 80vw"> -->

<?= form_open_multipart(attributes: 'role="form" class="elegant-form" id="form-registrasi"'); ?>
<?= csrf_field(); ?>

<div class="form-header">
	<div class="mb-4 row row-cols-1 row-cols-md-2">
		<!-- <img src="/img/flayer-kolaborasi.jpeg" alt="Nama Event" class="img-fluid" /> -->
		<img src="/assets/img/brosur-anak.webp" alt="Nama Event" class="img-fluid col" />
		<img src="/assets/img/brosur-dewasa.webp" alt="Nama Event" class="img-fluid col" />
	</div>
	<h4 class="mb-4">Form Pendaftaran NHC Batch 4</h4>
</div>

<?php if (session()->info) : ?>
	<div class="alert alert-success border-0 shadow-sm" role="alert">
		<h5 class="alert-heading text-center">Terima kasih!</h5>
		<p class="text-center mb-0"><?= session()->info; ?></p>
	</div>
<?php endif; ?>

<?php if (!session()->info) : ?>
	<p class="mb-4">Input yang dilengkapi simbol <span class="required-field">*</span> wajib diisi!</p>

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
					class="form-control tgl <?= validation_show_error('tgl_lahir') ? 'is-invalid' : ''; ?>">
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
		<small class="text-muted">Kode Registrasi akan dikirim melalui WhatsApp</small>
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
		<label for="pendidikan">Jenjang Pendidikan Saat Ini <span class="required-field">*</span></label>
		<input type="text" name="pendidikan" id="pendidikan" value="<?= old('pendidikan'); ?>"
			class="form-control <?= validation_show_error('pendidikan') ? 'is-invalid' : ''; ?>"
			placeholder="Contoh: SMA/SMK/D3/S1">
		<div class="invalid-feedback"><?= validation_show_error('pendidikan'); ?></div>
	</div>

	<div class="form-group">
		<label for="sekolah">Asal Sekolah <span class="required-field">*</span></label>
		<input type="text" name="sekolah" id="sekolah" value="<?= old('sekolah'); ?>"
			class="form-control <?= validation_show_error('sekolah') ? 'is-invalid' : ''; ?>"
			placeholder="Masukkan nama sekolah">
		<div class="invalid-feedback"><?= validation_show_error('sekolah'); ?></div>
	</div>

	<div class="form-group">
		<label for="kelas_sekolah">Kelas Berapa <span class="required-field">*</span></label>
		<input type="text" name="kelas_sekolah" id="kelas_sekolah" value="<?= old('kelas_sekolah'); ?>"
			class="form-control <?= validation_show_error('kelas_sekolah') ? 'is-invalid' : ''; ?>"
			placeholder="Masukkan kelas">
		<div class="invalid-feedback"><?= validation_show_error('kelas_sekolah'); ?></div>
	</div>

	<div class="form-group">
		<label for="informasi">Dapat Informasi Darimana <span class="required-field">*</span></label>
		<select name="informasi" id="informasi"
			class="form-select <?= validation_show_error('informasi') ? 'is-invalid' : ''; ?>"
			onchange="toggleLainnyaInput(event)">
			<option value="">Pilih informasi</option>
			<option value="sekolah" <?= presetSelect('informasi', 'sekolah'); ?>>Sosialisasi sekolah</option>
			<option value="teman" <?= presetSelect('informasi', 'teman'); ?>>Teman atau kerabat</option>
			<option value="sosial_media" <?= presetSelect('informasi', 'sosial_media'); ?>>Sosial media</option>
			<option value="media_cetak" <?= presetSelect('informasi', 'media_cetak'); ?>>Media cetak (koran, mading, dan brosur)</option>
			<option value="orang_tua" <?= presetSelect('informasi', 'orang_tua'); ?>>Orang tua</option>
			<option value="lainnya" <?= presetSelect('informasi', 'lainnya'); ?>>Lainnya</option>
		</select>
		<div class="invalid-feedback"><?= validation_show_error('informasi'); ?></div>
	</div>
	<div class="form-group d-none" id="lainnyaGroup">
		<label for="lainnya_input">Sebutkan sumber informasi <span class="required-field">*</span></label>
		<input type="text" name="lainnya_input" id="lainnya_input"
			class="form-control <?= validation_show_error('lainnya_input') ? 'is-invalid' : ''; ?>"
			placeholder="Masukkan informasi lainnya">
		<div class="invalid-feedback"><?= validation_show_error('lainnya_input'); ?></div>
	</div>

	<div class="form-group">
		<label for="foto">Upload Foto Pribadi <span class="required-field">*</span></label>
		<input type="file" name="foto" id="foto" accept="image/*"
			class="form-control <?= validation_show_error('foto') ? 'is-invalid' : ''; ?>">
		<div class="invalid-feedback"><?= validation_show_error('foto'); ?></div>
		<div class="d-flex flex-column">
			<small class="text-muted">Foto akan digunakan sebagai foto ID CARD</small>
			<small class="text-muted">Format: JPG, PNG. Maksimal 5MB</small>
		</div>
	</div>

	<div class="form-group">
		<label for="kelas">Pilih Kelas <span class="required-field">*</span></label>
		<select name="kelas" id="kelas"
			class="form-select <?= validation_show_error('kelas') ? 'is-invalid' : ''; ?>">
			<option value="">Pilih kelas</option>
			<option value="junior" <?= presetSelect('kelas', 'junior'); ?>>Junior - Figma (350K)</option>
			<option value="beginner" <?= presetSelect('kelas', 'beginner'); ?>>Basic - HTML & CSS (400K)</option>
			<option value="senior" <?= presetSelect('kelas', 'senior'); ?>>Intermediate - Javascript (450K)</option>
		</select>
		<div class="invalid-feedback"><?= validation_show_error('kelas'); ?></div>
	</div>

	<div class="form-group mt-4">
		<button type="submit" class="btn btn-submit w-100">
			Daftar Sekarang
		</button>
	</div>
<?php endif; ?>

</form>
<script defer>
	document.getElementById('foto').addEventListener('change', function(e) {
		const file = e.target.files[0];
		if (file) {
			// Validasi ukuran file (2MB)
			if (file.size > 5 * 1024 * 1024) {
				alert('Ukuran file terlalu besar. Maksimal 5MB');
				this.value = '';
				return;
			}

			// Validasi tipe file
			if (!file.type.match('image.*')) {
				alert('File harus berupa gambar');
				this.value = '';
				return;
			}
		}
	});
</script>
<?php #else : 
?>
<!-- <div class="alert alert-danger" role="alert">
			<h4 class="alert-heading text-center">Event/Kegiatan tidak tersedia!</h4>
		</div> -->
<?php #endif; 
?>
<script defer>
	function toggleLainnyaInput(event) {
		const lainnyaGroup = document.getElementById('lainnyaGroup');
		const selectedValue = event.target.value;
		if (selectedValue === 'lainnya') {
			lainnyaGroup.classList.remove('d-none');
		} else {
			lainnyaGroup.classList.add('d-none');
			// Bersihkan nilai input jika opsi lainnya tidak dipilih
			document.getElementById('lainnyaInput').value = '';
		}
	}
</script>

<?= $this->endSection(); ?>