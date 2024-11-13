<?=
$this->extend('layout/web/header');
$this->section('mainSection');
?>

<?php #if ($event) : 
?>
<!-- <form action="<? #= $event ? '/registrasi/peserta' : '!#'; 
					?>" method="<? #= $event ? 'post' : '!#'; 
																			?>" enctype="multipart/form-data" role="form" class="pb-5 shadow" style="max-width: 80vw"> -->
<?= form_open_multipart(attributes: 'role="form" class="pb-5 shadow" id="form-registrasi"'); ?>
<?= csrf_field(); ?>
<div class="form-icon">
	<div class="shadow rounded-3 d-flex justify-content-center py-5">
		<img src="/img/flayer-kolaborasi.jpeg" alt="<?= 'Nama Event'; #$event->nama_event; 
													?>" class="img-fluid rounded" />
	</div>
</div>

<?php #if ( ! $event ) : 
?>
<!-- <div class="alert alert-danger" role="alert">
					<h4 class="alert-heading text-center">Event/Kegiatan tidak tersedia!</h4>
				</div> -->
<?php #endif; 
?>

<?php if (session()->info) : ?>
	<div class="alert alert-info mt-2" role="alert">
		<h4 class="alert-heading text-center">Terima kasih!</h4>
		<p class="text-center"><?= session()->info; ?></p>
		<hr>
		<p class="mb-0"><?= session()->data; ?></p>
	</div>
<?php elseif (validation_errors()) : ?>
	<div class="alert alert-danger mt-2 text-center" role="alert">
		<h4 class="alert-heading">Warning!</h4>
		<hr>
		<p class="mb-0">Ada kesalahan dalam memproses formulir. Periksa kembali inputan Anda :</p>
		<?= validation_list_errors(); ?>
	</div>
<?php elseif (session()->error) : ?>
	<div class="alert alert-danger mt-2 text-center" role="alert">
		<h4 class="alert-heading">Warning!</h4>
		<hr>
		<p class="mb-0">Ada kesalahan dalam memproses formulir. Periksa kembali inputan Anda :</p>
		<h5><?= session()->error; ?></h5>
	</div>
<?php endif; ?>

<?php if (! session()->info) : ?>

	<p class="mt-4">Keterangan : <span class="text-danger">(*)</span> wajib diisi</p>

	<div class="form-group mb-3">
		<h5 class="p-1 text-center bg-light rounded-pill">Nama <span class="text-danger">(*)</span></h5>
		<input type="text" name="nama" value="<?= old('nama'); ?>" class="form-control form-control-lg item <?= validation_show_error('nama') ? 'is-invalid' : ''; ?>" autofocus>
		<div class="invalid-feedback p-1 rounded text-error"><?= validation_show_error('nama'); ?></div>
	</div>

	<div class="form-group mb-3">
		<h5 class="p-1 text-center bg-light rounded-pill">No. Telp (HP/WA) <span class="text-danger">(*)</span></h5>
		<input type="text" name="noTelp" value="<?= set_value('noTelp'); ?>" class="form-control form-control-lg item <?= validation_show_error('noTelp') ? 'is-invalid' : ''; ?>" placeholder="08x..." data-mask="0000000000000">
		<div class="invalid-feedback p-1 rounded text-error"><?= validation_show_error('noTelp'); ?></div>
	</div>

	<div class="form-group mb-3">
		<h5 class="p-1 text-center bg-light rounded-pill">Alamat <span class="text-danger">(*)</span></h5>
		<input type="text" name="alamat" value="<?= old('alamat'); ?>" class="form-control form-control-lg item <?= validation_show_error('alamat') ? 'is-invalid' : ''; ?>" autofocus>
		<div class="invalid-feedback p-1 rounded text-error"><?= validation_show_error('alamat'); ?></div>
	</div>

	<div class="form-group mb-3">
		<h5 class="p-1 text-center bg-light rounded-pill">Tanggal Lahir <span class="text-danger">(*)</span></h5>
		<input type="text" name="tgl_lahir" value="<?= old('tgl_lahir'); ?>" class="form-control form-control-lg item <?= validation_show_error('tgl_lahir') ? 'is-invalid' : ''; ?>" autofocus>
		<div class="invalid-feedback p-1 rounded text-error"><?= validation_show_error('tgl_lahir'); ?></div>
	</div>

	<div class="form-group mb-3">
		<h5 class="p-1 text-center bg-light rounded-pill">Asal Sekolah <span class="text-danger">(*)</span></h5>
		<input type="text" name="gr" value="<?= old('gr'); ?>" class="form-control form-control-lg item <?= validation_show_error('gr') ? 'is-invalid' : ''; ?>" autofocus>
		<div class="invalid-feedback p-1 rounded text-error"><?= validation_show_error('gr'); ?></div>
	</div>

	<!-- <div class="form-group mb-3">
					<h5 class="p-1 text-center bg-light rounded-pill">Asal Instansi <span class="text-danger">(*)</span></h5>
					<input type="text" name="asalInstansi" value="<?php // old('asalInstansi'); 
																	?>" class="form-control form-control-lg item <?php // validation_show_error('asalInstansi') ? 'is-invalid' : ''; 
																																				?>" autofocus>
					<div class="invalid-feedback p-1 rounded text-error"><?php // validation_show_error('asalInstansi'); 
																			?></div>
				</div>

				<div class="form-group mb-3">
					<h5 class="p-1 text-center bg-light rounded-pill">Nama Jabatan <span class="text-danger">(*)</span></h5>
					<input type="text" name="jabatan" value="<?php // old('jabatan'); 
																?>" class="form-control form-control-lg item <?php // validation_show_error('jabatan') ? 'is-invalid' : ''; 
																																	?>" autofocus>
					<div class="invalid-feedback p-1 rounded text-error"><?php // validation_show_error('jabatan'); 
																			?></div>
				</div> -->

	<!-- <div class="form-group mb-3">
					<h5 class="p-1 text-center bg-light rounded-pill">Jenis Kelamin <span class="text-danger">(*)</span></h5>
					<select name="jenisKelamin" id="jenisKelamin" class="form-select form-select-lg item <?php //echo validation_show_error('jenisKelamin') ? 'is-invalid' : ''; 
																											?>" >
						<option value="">- Pilih -</option>
						<option value="l" <?php //echo presetSelect('jenisKelamin', 'l'); 
											?>>Laki-laki</option>
						<option value="p" <?php //echo presetSelect('jenisKelamin', 'p'); 
											?>>Perempuan</option readonly>
					</select>
					<div class="invalid-feedback p-1 rounded text-error"><?php //echo validation_show_error('jenisKelamin'); 
																			?></div>
				</div> -->


	<!-- <div class="form-group mb-3">
					<h5 class="p-1 text-center bg-light rounded-pill">Alamat Email<span class="text-danger">(*)</span></h5>
					<input type="text" name="email" value="<?php //echo set_value('email'); 
															?>" class="form-control form-control-lg item <?php //echo validation_show_error('email') ? 'is-invalid' : ''; 
																																			?>" placeholder="abcd@gmail.com">
					<div class="invalid-feedback p-1 rounded text-error"><?php //echo validation_show_error('email'); 
																			?></div>
				</div> -->

	<!-- <div class="form-group mb-3">
					<h5 class="p-1 text-center bg-light rounded-pill">Nama Usaha <span class="text-danger">(*)</span></h5>
					<input type="namaUsaha" name="namaUsaha" value="<?php //echo old('namaUsaha'); 
																	?>" class="form-control form-control-lg item <?php //echo validation_show_error('namaUsaha') ? 'is-invalid' : ''; 
																																				?>" autofocus>
					<div class="invalid-feedback p-1 rounded text-error"><?php //echo validation_show_error('namaUsaha'); 
																			?></div>
				</div> -->

	<!-- <div class="form-group mb-3">
					<h5 class="p-1 text-center bg-light rounded-pill">Info Event<span class="text-danger">(*)</span></h5>
					<select name="infoEvent" id="infoEvent" class="form-select form-select-lg item <?php //echo validation_show_error('infoEvent') ? 'is-invalid' : ''; 
																									?>" >
						<option value="">- Pilih -</option>
						<option value="teman" <?php //echo presetSelect('infoEvent', 'teman'); 
												?>>Teman</option>
						<option value="ig" <?php //echo presetSelect('infoEvent', 'ig'); 
											?>>Instagram</option readonly>
						<option value="fb" <?php //echo presetSelect('infoEvent', 'fb'); 
											?>>Facebook</option readonly>
						<option value="groupWa" <?php //echo presetSelect('infoEvent', 'groupWa'); 
												?>>Group WA</option readonly>
						<option value="lainnya" <?php //echo presetSelect('infoEvent', 'lainnya'); 
												?>>Lainnya</option readonly>
					</select>
					<div class="invalid-feedback p-1 rounded text-error"><?php //echo validation_show_error('jenisKelamin'); 
																			?></div>
				</div> -->

	<!-- <div class="row form-group mb-3">
					<div class="col-md-12" id="fotoDokumen">
						<h6 class="p-1 text-center bg-light rounded-pill mb-3">
							Upload Bukti Pembayaran<span class="text-danger">(*)</span>
						</h6>
						<input type="file" name="foto" value="" class="form-control form-control-lg <?php //echo validation_show_error('foto') ? 'is-invalid' : ''; 
																									?>" id="inputDokumen">
						<div class="invalid-feedback p-1 rounded text-error"><?php //echo validation_show_error('foto'); 
																				?></div>
					</div>
				</div> -->

	<div class="form-group d-grid">
		<button type="submit" class="btn bg-danger btn-lg py-3 fs-4 btn-block create-account">
			Saya Ingin Mendaftar
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