	<?=
	$this->extend('layout/admin/header');
	$this->section('mainSection');
?>
		<!-- ============================================================== -->
		<!-- Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h4 class="text-themecolor">Registrasi On Spot</h4>
			</div>

			<div class="col-md-7 align-self-center text-end">
				<div class="d-flex justify-content-end align-items-center">
					<ol class="breadcrumb justify-content-end">
						<li class="breadcrumb-item active"><a href="/admin/home">Home</a></li>
						<li class="breadcrumb-item">Registrasi On Spot</li>
					</ol>
				</div>
			</div>
		</div>

		<div class="card">
			<div class="card-header">
				<h4 class="card-title my-3">REGISTRASI ON SPOT</h4>
			</div>
			<div class="card-body px-4">
				<?php if ( session()->info ) : ?>
					<div class="alert alert-info mt-2" role="alert">
						<h4 class="alert-heading text-center">SUKSES!</h4>
						<p class="text-center"><?= session()->info; ?></p>
					</div>
				<?php elseif ( validation_errors() ) : ?>
					<div class="alert alert-danger mt-2 text-center" role="alert">
						<h4 class="alert-heading">Warning!</h4>
						<hr>
						<p class="mb-0">Ada kesalahan dalam memproses formulir. Periksa kembali inputan Anda!</p>
						<?= validation_list_errors(); ?>
					</div>
				<?php endif; ?>

				<?= form_open_multipart(attributes: 'role="form"'); ?>
					<?= csrf_field(); ?>
					<div class="form-body mb-4">
						<p class="mt-4">Keterangan : <span class="text-danger">(*)</span> wajib diisi</p>
						<div class="row mb-3">
							<div class="col-md-6">
								<h5 class="p-1 text-center bg-light rounded-pill">Nama <span class="text-danger">(*)</span></h5>
								<input type="text" name="nama" value="<?= old('nama'); ?>" class="form-control form-control-lg border-dark <?= validation_show_error('nama') ? 'is-invalid' : ''; ?>" autofocus>
								<div class="invalid-feedback p-1 rounded text-error"><?= validation_show_error('nama'); ?></div>
							</div>
							<div class="col-md-6">
								<h5 class="p-1 text-center bg-light rounded-pill">No. Telp (WA) <span class="text-danger">(*)</span></h5>
								<input type="text" name="noTelp" value="<?= old('noTelp'); ?>" class="form-control form-control-lg border-dark <?= validation_show_error('noTelp') ? 'is-invalid' : ''; ?>" placeholder="08x..." data-mask="0000000000000">
								<div class="invalid-feedback p-1 rounded text-error"><?= validation_show_error('noTelp'); ?></div>
							</div>

							<!-- <div class="col-md-3">
								<h5 class="p-1 text-center bg-light rounded-pill">Jenis Kelamin <span class="text-danger">(*)</span></h5>
								<select name="jenisKelamin" id="jenisKelamin" class="form-select form-select-lg border-dark <?#= validation_show_error('jenisKelamin') ? 'is-invalid' : ''; ?>" >
									<option value="">- Pilih -</option>
									<option value="l" <?#= presetSelect('jenisKelamin', 'l'); ?>>Laki-laki</option>
									<option value="p" <?#= presetSelect('jenisKelamin', 'p'); ?>>Perempuan</option readonly>
								</select>
								<div class="invalid-feedback p-1 rounded text-error"><?#= validation_show_error('jenisKelamin'); ?></div>
							</div> -->

						</div>

						<div class="row mb-3">
							<div class="col-md-6">
								<h5 class="p-1 text-center bg-light rounded-pill">Asal Instansi <span class="text-danger">(*)</span></h5>
								<input type="text" name="asalInstansi" value="<?= old('asalInstansi'); ?>" class="form-control form-control-lg border-dark <?= validation_show_error('asalInstansi') ? 'is-invalid' : ''; ?>" autofocus>
								<div class="invalid-feedback p-1 rounded text-error"><?= validation_show_error('asalInstansi'); ?></div>
							</div>

							<div class="col-md-6">
								<h5 class="p-1 text-center bg-light rounded-pill">Jabatan <span class="text-danger">(*)</span></h5>
								<input type="text" name="jabatan" value="<?= old('jabatan'); ?>" class="form-control form-control-lg border-dark <?= validation_show_error('jabatan') ? 'is-invalid' : ''; ?>" autofocus>
								<div class="invalid-feedback p-1 rounded text-error"><?= validation_show_error('jabatan'); ?></div>
							</div>
						    <!-- <div class="col-md-4">
            					<h5 class="p-1 text-center bg-light rounded-pill">Alamat Email<span class="text-danger">(*)</span></h5>
            					<input type="text" name="email" value="<?#= set_value('email'); ?>" class="form-control form-control-lg item <?#= validation_show_error('email') ? 'is-invalid' : ''; ?>" placeholder="abcd@gmail.com">
            					<div class="invalid-feedback p-1 rounded text-error"><?#= validation_show_error('email'); ?></div>
            				</div> -->

							<!-- <div class="col-md-5">
								<h5 class="p-1 text-center bg-light rounded-pill">Nama Usaha <span class="text-danger">(*)</span></h5>
								<input type="namaUsaha" name="namaUsaha" value="<?#= old('namaUsaha'); ?>" class="form-control form-control-lg border-dark <?#= validation_show_error('namaUsaha') ? 'is-invalid' : ''; ?>" autofocus>
								<div class="invalid-feedback p-1 rounded text-error"><?#= validation_show_error('namaUsaha'); ?></div>
							</div> -->

							<!-- <div class="col-md-3">
            					<h5 class="p-1 text-center bg-light rounded-pill">Info Event<span class="text-danger">(*)</span></h5>
            					<select name="infoEvent" id="infoEvent" class="form-select form-select-lg item <?#= validation_show_error('infoEvent') ? 'is-invalid' : ''; ?>" >
            						<option value="">- Pilih -</option>
            						<option value="teman"	<?#= presetSelect('infoEvent', 'teman'); 	?>>Teman</option>
            						<option value="ig" 		<?#= presetSelect('infoEvent', 'ig'); 		?>>Instagram</option readonly>
            						<option value="fb"		<?#= presetSelect('infoEvent', 'fb'); 		?>>Facebook</option readonly>
            						<option value="groupWa" <?#= presetSelect('infoEvent', 'groupWa'); 	?>>Group WA</option readonly>
            						<option value="lainnya" <?#= presetSelect('infoEvent', 'lainnya'); 	?>>Lainnya</option readonly>
            					</select>
            				</div> -->

						</div>
						<div class="row mb-3">
							<!-- <div class="col-md-12">
								<h5 class="p-1 text-center bg-light rounded-pill">Waktu Kehadiran<span class="text-danger">(*)</span></h5>
								<select name="waktuKehadiran" id="waktuKehadiran" class="form-select form-select-lg border-dark bisnisManager-select2 <?#= validation_show_error('waktuKehadiran') ? 'is-invalid' : ''; ?>">
									<option value="">- Pilih -</option>
									<option value="2024-08-24" <?#= presetSelect('waktuKehadiran', '2024-08-24', ''); ?>>24 Agustus 2024</option>
									<option value="2024-08-25" <?#= presetSelect('waktuKehadiran', '2024-08-25', ''); ?>>25 Agustus 2024</option>
									<option value="2024-08-24_2024-08-25" <?#= presetSelect('waktuKehadiran', '2024-08-24_2024-08-25', ''); ?>>24 Agustus 2024 dan 25 Agustus 2024</option>
								</select>
								<div class="invalid-feedback p-1 rounded text-error"><?#= validation_show_error('waktuKehadiran'); ?></div>
							</div> -->
						</div>
					</div>

					<div class="form-action">
						<div class="form-group d-grid">
							<button type="submit" class="btn bg-info btn-lg py-3 fs-4 btn-block text-light">
								Update Pendaftaran
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>

<?= $this->endSection(); ?>