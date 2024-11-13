<?=
	$this->extend('layout/admin/header');
	$this->section('mainSection');
?>

			<!-- ============================================================== -->
			<!-- Bread crumb and right sidebar toggle -->
			<!-- ============================================================== -->
			<div class="row page-titles">
				<div class="col-md-5 align-self-center">
					<h4 class="text-themecolor">Data Registrasi</h4>
				</div>
				<div class="col-md-7 align-self-center text-end">
					<div class="d-flex justify-content-end align-items-center">
						<ol class="breadcrumb justify-content-end">
							<li class="breadcrumb-item active"><a href="/admin/home">Home</a></li>
							<li class="breadcrumb-item">Update event</li>
						</ol>
					</div>
				</div>
			</div>

			<!-- ============================================================== -->
			<!-- Review -->
			<!-- ============================================================== -->
			<div class="card">

				<div class="card-header bg-info">
					<h4 class="m-b-0 text-white">Data Event</h4>
				</div>
				<div class="card-body">

					<?php if ( validation_errors() ) : ?>
						<div class="alert alert-danger text-center">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h3 class=""><i class="icon-exclamation-triangle"></i> Warning</h3>
							<p>Terjadi kesalahan saat memproses data Event. Periksa kembali data formulir Anda!</p>
						</div>
					<?php endif; ?>

					<?= form_open(); ?>
						<div class="form-body">
							<h3 class="card-title">Info</h3>
							<hr>
							<div class="row p-t-20">
								<div class="col-md-7">
									<div class="row">
										<div class="col-12">
											<div class="form-group <?= validation_show_error('namaEvent') ? 'has-danger' : ''; ?>">
												<label class="control-label">Nama Event / Kegiatan</label>
												<?= form_input('namaEvent', old('namaEvent', $event->namaEvent), 'class="form-control border border-dark"'); ?>
												<small class="form-control-feedback"><?= validation_show_error('namaEvent'); ?></small>
											</div>
										</div>

										<div class="col-12">
											<label class="control-label">Penyelenggara Kegiatan</label>
											<?= form_input('penyelenggara', old('penyelenggara', $event->penyelenggara), 'class="form-control border border-dark"'); ?>
											<small class="form-control-feedback"><?= validation_show_error('penyelenggara'); ?></small>
										</div>
									</div>
								</div>

								<div class="col-md-5">
									<div class="row row-cols-md-3">
										<div class="col">
											<div class="form-group <?= validation_show_error('tglMulai') ? 'has-danger' : ''; ?>">
												<label class="control-label">Tgl. Mulai</label>
												<input type="text" name="tglMulai" value="<?= old('tglMulai', $event->tglMulai); ?>" id="tglMulai" class="form-control border border-dark tgl" placeholder="...">
												<small class="form-control-feedback"><?= validation_show_error('tglMulai'); ?></small>
											</div>
										</div>

										<div class="col">
											<div class="form-group <?= validation_show_error('hariMulai') ? 'has-danger' : ''; ?>">
												<label class="control-label">Hari Mulai</label>
												<input type="text" name="hariMulai" value="<?= old('hariMulai', $event->hariMulai); ?>" id="hariMulai" class="form-control border border-dark" placeholder="...">
												<small class="form-control-feedback"><?= validation_show_error('hariMulai'); ?></small>
											</div>
										</div>

										<div class="col">
											<div class="form-group <?= validation_show_error('jamMulai') ? 'has-danger' : ''; ?>">
												<label class="control-label">Jam Mulai</label>
												<input type="text" name="jamMulai" value="<?= old('jamMulai', $event->jamMulai); ?>" id="jamMulai" class="form-control border border-dark" placeholder="...">
												<small class="form-control-feedback"><?= validation_show_error('jamMulai'); ?></small>
											</div>
										</div>
									</div>

									<div class="row row-cols-md-3">
										<div class="col">
											<div class="form-group <?= validation_show_error('tglSelesai') ? 'has-danger' : ''; ?>">
												<label class="control-label">Tgl. Selesai</label>
												<input type="text" name="tglSelesai" value="<?= old('tglSelesai', $event->tglSelesai); ?>" id="tglSelesai" class="form-control border border-dark tgl" placeholder="...">
												<small class="form-control-feedback"><?= validation_show_error('tglSelesai'); ?></small>
											</div>
										</div>

										<div class="col">
											<div class="form-group <?= validation_show_error('hariSelesai') ? 'has-danger' : ''; ?>">
												<label class="control-label">Hari Selesai</label>
												<input type="text" name="hariSelesai" value="<?= old('hariSelesai', $event->hariSelesai); ?>" id="hariSelesai" class="form-control border border-dark" placeholder="...">
												<small class="form-control-feedback"><?= validation_show_error('hariSelesai'); ?></small>
											</div>
										</div>

										<div class="col">
											<div class="form-group <?= validation_show_error('jamSelesai') ? 'has-danger' : ''; ?>">
												<label class="control-label">Jam Selesai</label>
												<input type="text" name="jamSelesai" value="<?= old('jamSelesai', $event->jamSelesai); ?>" id="jamSelesai" class="form-control border border-dark" placeholder="...">
												<small class="form-control-feedback"><?= validation_show_error('jamSelesai'); ?></small>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group <?= validation_show_error('lokasi') ? 'has-danger' : ''; ?>">
										<label class="control-label">Lokasi</label>
										<textarea name="lokasi" id="lokasi" rows="2" class="form-control border border-dark"><?= old('lokasi', $event->lokasi); ?></textarea>
										<small class="form-control-feedback"><?= validation_show_error('lokasi'); ?></small>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group <?= validation_show_error('alamat') ? 'has-danger' : ''; ?>">
										<label class="control-label">Alamat</label>
										<textarea name="alamat" id="alamat" rows="2" class="form-control border border-dark"><?= old('alamat', $event->alamat); ?></textarea>
										<small class="form-control-feedback"><?= validation_show_error('alamat'); ?></small>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group <?= validation_show_error('catatan') ? 'has-danger' : ''; ?>">
										<label class="control-label">Catatan</label>
										<textarea name="catatan" id="catatan" rows="2" class="form-control border border-dark"><?= old('catatan', $event->catatan); ?></textarea>
										<small class="form-control-feedback"><?= validation_show_error('catatan'); ?></small>
									</div>
								</div>
							</div>
						</div>

						<div class="form-actions">
							<button type="submit" class="btn btn-lg btn-success d-flex align-items-center">
								<i class="icon-check me-2 fw-bold"></i> Update Data Event/Kegiatan
							</button>
						</div>
					<?= form_close(); ?>
				</div>
			</div>

			<div class="card border-dark">
				<div class="card-header">
					<h4 class="m-b-0">Daftar Event/Kegiatan</h4>
				</div>

				<div class="card-body">
					<table class="table table-striped table-sm table-bordered datatable w-100" data-ordering="false" data-page-length="10">
						<thead>
							<tr>
								<th width="5%">NO</th>
								<th>EVENT</th>
								<th width="20%">TGL.</th>
								<th width="16%">WAKTU</th>
								<th width="22%">LOKASI</th>
								<th width="6%">SESI</th>
								<th class="text-center" width="8%">AKTIF</th>
								<th class="text-center" width="6%">Act</th>
						</thead>

						<tbody>
							<?php
								if ( $daftarEvent ) :
									$no = 1;
									foreach ( $daftarEvent as $data ) :
										$status = $data->aktif ? 'nonAktif' : 'aktif';
							?>

							<tr>
								<td><?= $no++; ?></td>
								<td>
									<a href="/admin/event/update/<?= $data->idEvent; ?>" class="text-dark">
										<?= $data->namaEvent; ?>
									</a>
								</td>
								<td><?= date('d F, Y', strtotime($data->tglMulai)).' s/d '.date('d F Y', strtotime($data->tglSelesai)); ?></td>
								<td><?= $data->hariMulai.', '.$data->jamMulai.' / ' . $data->hariSelesai.', '.$data->jamSelesai; ?></td>
								<td><?= $data->lokasi; ?></td>
								<td><?= $data->TotalSesi; ?></td>
								<td class="text-center">
									<a href="/admin/event/updateStatus/<?= $data->idEvent.'/'.$status; ?>" class="updateStatusEvent">
										<?= $data->aktif ? '<i class="icon-check text-success ms-1 fw-bold"></i>' : '<i class="icon-ban text-danger ms-1 fw-bold"></i>'; ?>
									</a>
								</td>
								<td class="text-center">
									<button type="button" class="btn btn-sm updateSesiEvent" data-bs-toggle="modal" data-bs-target="#modalSesiEvent" data-url="/admin/event/sesi/<?= $data->idEvent; ?>">Sesi</button>
								</td>
							</tr>

							<?php endforeach; endif; ?>
						</tbody>
					</table>
				</div>
			</div>

			<!-- Modal Data Peserta -->
			<div id="modalSesiEvent" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="vcenter" aria-modal="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<!-- <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen"> -->
					<div class="modal-content"></div>
				</div>
			</div>

<?= $this->endSection(); ?>