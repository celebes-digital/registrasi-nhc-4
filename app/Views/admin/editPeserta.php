<?=
$this->extend('layout/admin/header');
$this->section('mainSection');
?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor">Data Validasi</h4>
	</div>
	<div class="col-md-7 align-self-center text-end">
		<div class="d-flex justify-content-end align-items-center">
			<ol class="breadcrumb justify-content-end">
				<li class="breadcrumb-item active"><a href="/admin/home">Home</a></li>
				<li class="breadcrumb-item">Data Validasi Peserta</li>
			</ol>
		</div>
	</div>
</div>

<?php #dd($peserta) 
?>

<!-- ============================================================== -->
<!-- Review -->
<!-- ============================================================== -->
<div class="row">
	<!-- Column -->
	<div class="col-lg-12 col-md-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">EDIT DATA PESERTA</h5>
			</div>
		</div>
	</div>
</div>


<?php #if ($event) : 
?>
<!-- <form action="<? #= $event ? '/registrasi/peserta' : '!#'; 
					?>" 
method="<? #= $event ? 'post' : '!#'; 
		?>" 
enctype="multipart/form-data" role="form" class="pb-5 shadow" style="max-width: 80vw"> -->

<?= form_open_multipart(attributes: 'role="form" class="elegant-form" id="form-registrasi"'); ?>
<?= csrf_field(); ?>

<?php if (session()->info) : ?>
	<div class="alert alert-success border-0 shadow-sm" role="alert">
		<h5 class="alert-heading text-center">Terima kasih!</h5>
		<p class="text-center mb-0"><?= session()->info; ?></p>
	</div>
<?php endif; ?>

<?php if (!session()->info) : ?>
	<p class="mb-4">Input yang dilengkapi simbol <span class="text-danger">*</span> wajib diisi!</p>

	<div class="form-group">
		<label for="nama">Nama <span class="text-danger">*</span></label>
		<input type="text" name="nama" id="nama" value="<?= $peserta->nama; ?>"
			class="form-control <?= validation_show_error('nama') ? 'is-invalid' : ''; ?>"
			placeholder="Masukkan nama lengkap">
		<div class="invalid-feedback"><?= validation_show_error('nama'); ?></div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="tgl_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
				<input type="date" name="tgl_lahir" id="tgl_lahir" value="<?= $peserta->tgl_lahir; ?>"
					class="form-control tgl <?= validation_show_error('tgl_lahir') ? 'is-invalid' : ''; ?>">
				<div class="invalid-feedback"><?= validation_show_error('tgl_lahir'); ?></div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="jenisKelamin">Jenis Kelamin <span class="text-danger">*</span></label>
				<select name="jenisKelamin" id="jenisKelamin"
					class="form-select <?= validation_show_error('jenisKelamin') ? 'is-invalid' : ''; ?>">
					<option value="" <?= presetSelect('jenisKelamin', '', $peserta->jenisKelamin); ?>>Pilih jenis kelamin</option>
					<option value="l" <?= presetSelect('jenisKelamin', 'l', $peserta->jenisKelamin); ?>>Laki-laki</option>
					<option value="p" <?= presetSelect('jenisKelamin', 'p', $peserta->jenisKelamin); ?>>Perempuan</option>
				</select>
				<div class="invalid-feedback"><?= validation_show_error('jenisKelamin'); ?></div>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label for="noTelp">No. Telp (WA) <span class="text-danger">*</span></label>
		<input type="tel" name="noTelp" id="noTelp" value="<?= $peserta->noTelp ?>"
			class="form-control <?= validation_show_error('noTelp') ? 'is-invalid' : ''; ?>"
			placeholder="08xxxxxxxxxx" pattern="[0-9]{10,13}">
		<small class="text-muted">Kode Registrasi akan dikirim melalui WhatsApp</small>
		<div class="invalid-feedback"><?= validation_show_error('noTelp'); ?></div>
	</div>

	<div class="form-group">
		<label for="alamat">Alamat <span class="text-danger">*</span></label>
		<textarea name="alamat" id="alamat" rows="3"
			class="form-control <?= validation_show_error('alamat') ? 'is-invalid' : ''; ?>"
			placeholder="Masukkan alamat lengkap"><?= $peserta->alamat; ?></textarea>
		<div class="invalid-feedback"><?= validation_show_error('alamat'); ?></div>
	</div>

	<div class="form-group">
		<label for="pendidikan">Jenjang Pendidikan Saat Ini <span class="text-danger">*</span></label>
		<input type="text" name="pendidikan" id="pendidikan" value="<?= $peserta->pendidikan; ?>"
			class="form-control <?= validation_show_error('pendidikan') ? 'is-invalid' : ''; ?>"
			placeholder="Contoh: SMA/SMK/D3/S1">
		<div class="invalid-feedback"><?= validation_show_error('pendidikan'); ?></div>
	</div>

	<div class="form-group">
		<label for="sekolah">Asal Sekolah <span class="text-danger">*</span></label>
		<input type="text" name="sekolah" id="sekolah" value="<?= $peserta->sekolah; ?>"
			class="form-control <?= validation_show_error('sekolah') ? 'is-invalid' : ''; ?>"
			placeholder="Masukkan nama sekolah">
		<div class="invalid-feedback"><?= validation_show_error('sekolah'); ?></div>
	</div>

	<div class="form-group">
		<label for="kelas_sekolah">Kelas Berapa <span class="text-danger">*</span></label>
		<input type="text" name="kelas_sekolah" id="kelas_sekolah" value="<?= $peserta->kelas_sekolah; ?>"
			class="form-control <?= validation_show_error('kelas_sekolah') ? 'is-invalid' : ''; ?>"
			placeholder="Masukkan kelas">
		<div class="invalid-feedback"><?= validation_show_error('kelas_sekolah'); ?></div>
	</div>

	<div class="form-group">
		<label for="informasi">Dapat Informasi Darimana <span class="text-danger">*</span></label>
		<select name="informasi" id="informasi"
			class="form-select <?= validation_show_error('informasi') ? 'is-invalid' : ''; ?>"
			onchange="toggleLainnyaInput(event)">
			<option value="" <?= presetSelect('informasi', '', $peserta->informasi); ?>>Pilih informasi</option>
			<option value="<?= $peserta->informasi; ?>" <?= presetSelect('informasi', $peserta->informasi , $peserta->informasi); ?>><?= $peserta->informasi; ?></option>
			<option value="sekolah" <?= presetSelect('informasi', 'sekolah', $peserta->informasi); ?>>Sosialisasi sekolah</option>
			<option value="teman" <?= presetSelect('informasi', 'teman', $peserta->informasi); ?>>Teman atau kerabat</option>
			<option value="sosial_media" <?= presetSelect('informasi', 'sosial_media', $peserta->informasi); ?>>Sosial media</option>
			<option value="media_cetak" <?= presetSelect('informasi', 'media_cetak', $peserta->informasi); ?>>Media cetak (koran, mading, dan brosur)</option>
			<option value="orang_tua" <?= presetSelect('informasi', 'orang_tua', $peserta->informasi); ?>>Orang tua</option>
			<option value="lainnya" <?= presetSelect('informasi', 'lainnya', $peserta->informasi); ?>>Lainnya</option>
		</select>
		<div class="invalid-feedback"><?= validation_show_error('informasi'); ?></div>
	</div>
	<div class="form-group d-none" id="lainnyaGroup">
		<label for="lainnya_input">Sebutkan sumber informasi <span class="text-danger">*</span></label>
		<input type="text" name="lainnya_input" id="lainnya_input"
			class="form-control <?= validation_show_error('lainnya_input') ? 'is-invalid' : ''; ?>"
			placeholder="Masukkan informasi lainnya">
		<div class="invalid-feedback"><?= validation_show_error('lainnya_input'); ?></div>
	</div>

	<div class="form-group">
		<label for="foto">Upload Foto Pribadi <span class="text-danger">*</span></label>
		<input type="file" name="foto" id="foto" accept="image/*"
			class="form-control">
		<!-- <div class="invalid-feedback"><= validation_show_error('foto'); ?></div> -->
		<div class="d-flex flex-column">
			<small class="text-muted">Foto akan digunakan sebagai foto ID CARD</small>
			<small class="text-muted">Format: JPG, PNG. Maksimal 5MB</small>
		</div>
	</div>

	<div class="form-group">
		<label for="kelas">Pilih Kelas <span class="text-danger">*</span></label>
		<select name="kelas" id="kelas"
			class="form-select <?= validation_show_error('kelas') ? 'is-invalid' : ''; ?>">
			<option value="" <?= presetSelect('kelas', '', $peserta->kelas); ?>>Pilih kelas</option>
			<option value="junior" <?= presetSelect('kelas', 'junior', $peserta->kelas); ?>>Junior - Figma (350K)</option>
			<option value="beginner" <?= presetSelect('kelas', 'beginner', $peserta->kelas); ?>>Basic - HTML & CSS (400K)</option>
			<option value="senior" <?= presetSelect('kelas', 'senior', $peserta->kelas); ?>>Intermediate - Javascript (450K)</option>
		</select>
		<div class="invalid-feedback"><?= validation_show_error('kelas'); ?></div>
	</div>

	<div class="form-group mt-4">
		<button type="submit" class="btn btn-submit w-100">
			Edit
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