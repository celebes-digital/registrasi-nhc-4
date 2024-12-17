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
							<li class="breadcrumb-item">Data Registrasi Peserta</li>
						</ol>
					</div>
				</div>
			</div>

			<!-- SCANNER SECTION -->
			<div class="card shadow">
				<div class="card-header border-bottom text-center">
					<h5 class="card-title mb-1">SCAN E-TIKET PESERTA</h5>
					<p class="mb-0">Scan e-tiket Peserta untuk registrasi</p>
				</div>

				<div class="card-body">
					<div class="form-body">
						<?= form_open('', 'method="POST"'); ?>
							<div class="row justify-content-center">
								<div class="col-md-4">
									<!-- <div class="d-none urlRegistrasiPeserta" data-url-registrasi="/admin/validasi/registrasi"></div> -->
									<div class="text-center fs-5 mb-2">KODE REGISTRASI (scan QRCode disini) : </div>
									<?= form_input('kodeRegistrasi', set_value('kodeRegistrasi'), 'class="form-control form-control-lg fs-3 border-info text-center"  autofocus'); ?> <!-- id="kodeRegistrasi" -->
								</div>
							</div>
						<?= form_close(); ?>
					</div>
				</div>
			</div>

			<!-- ============================================================== -->
			<!-- Review -->
			<!-- ============================================================== -->
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card">
						<div class="card-header border-bottom">
							<h4 class="card-title mb-0 py-3">DATA PESERTA TERDAFTAR</h4>
						</div>

						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped datatable w-100" data-ordering="false" data-page-length="10">
									<thead>
										<tr>
											<th class="p-2">NO</th>
											<th class="p-2">NAMA</th>
											<th class="p-2">Alamat</th>
											<th class="p-2">Sekolah</th>
											<th class="p-2">Kelas</th>
											<th class="p-2">Informasi</th>
											<th class="p-2">Level</th>
											<th class="p-2">Tanggal Absen</th>
											<th class="p-2">E-TIKET</th>
										</tr>
									</thead>

									<tbody>
										<?php
											if ( $dataPeserta ) :
												$no = 1;
												foreach ( $dataPeserta as $data ) :
										?>
											<tr>
												<td><?= $no++; ?></td>
												<td><?= $data->nama; ?></td>
												<td><?= $data->alamat; ?></td>
												<td><?= $data->sekolah; ?></td>
												<td><?= $data->kelas_sekolah; ?></td>
												<td><?= str_replace('-',' ',$data->informasi); ?></td>
												<td><?= $data->kelas; ?></td>
												<td><?= $data->tglAbsensi; ?></td>
												<td><?= $data->kodeRegistrasi; ?></td>
											</tr>
										<?php endforeach; endif; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal Data Peserta -->
			<div id="modal-data-validasi" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="vcenter" aria-modal="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered --modal-dialog-scrollable modal-lg">
					<div class="modal-content"></div>
				</div>
			</div>

			<!-- Modal Data Registrasi -->
			<div id="modal-data-registrasi" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="vcenter" aria-modal="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered --modal-dialog-scrollable">
					<div class="modal-content"></div>
				</div>
			</div>

<?= $this->endSection(); ?>