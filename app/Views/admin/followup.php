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
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12 col-md-12">
				<div class="card">
					<div class="card-body pb-0">
						<h5 class="card-title">DATA PESERTA TERDAFTAR</h5>
						<p>Klik Nama Peserta untuk melihat Detail Data Peserta</p>
					</div>

					<div class="card-body">
						<div class="alert alert-dark">
							<img src="/img/logo-sm.png" --width="30" class="img-fluid me-3" alt="Celebes Digital">
							<span class="fs-4">
								Klik <code class="font-monospace">Nama Peserta</code> untuk <code class="font-monospace">validasi Pembayaran</code> dan membuat <code class="font-monospace">e-tiket</code>.
							</span>
						</div>

						<a href="/admin/event/exportdatapeserta" class="btn --btn-sm btn-success mt-3 shadow-sm">
							<i class="icon-notebook mr-1"></i> Data Peserta (Excel)
						</a>

						<a href="/admin/event/exportCSV" class="btn --btn-sm btn-secondary mt-3 ms-2 shadow-sm">
							<i class="icon-notebook mr-1"></i> Data Peserta (CSV)
						</a>

						<table class="table table-striped table-sm datatable peserta_terdaftar w-100" data-ordering="false" data-page-length="10">
							<thead>
								<tr>
									<!-- <th class="p-2">NAMA USAHA</th> -->
									<th class="p-2">NO</th>
									<th class="p-2">NAMA</th>
									<th class="p-2">NO. TELP</th>
									<th class="p-2">Asal Instansi</th>
									<th class="p-2">Jabatan</th>
									<th class="p-2">TGL. REGISTRASI</th>
									<th class="p-2">Hapus Peserta</th>
								</tr>
							</thead>

							<tbody>
								<?php
									if ( $listPendaftar ) :
										$no = 1;
										foreach ( $listPendaftar as $peserta ) :
								?>
								<tr>
									<td class="p-2"><?= $no++; ?></td>
									<td class="p-2">
										<a href="#" class="link data_peserta" data-bs-toggle="modal" data-bs-target="#modal-data-peserta" data-url="/admin/validasi/dataPeserta/<?= $peserta->idPeserta; ?>">
											<?= $peserta->nama; ?>
										</a>
									</td>

									<td class="p-2"><?= $peserta->noTelp; ?></td>
									<td class="p-2"><?= $peserta->asalInstansi; ?></td>
									<td class="p-2"><?= $peserta->jabatan; ?></td>
									<td class="p-2"><?= date('d F, Y - H:i:s', strtotime($peserta->tglRegistrasi)); ?></td>
									<td class="py-2">
										<a href="/admin/peserta/hapus/<?= $peserta->idPeserta; ?>" class="ms-2 hapus_peserta" data-bs-toggle="tooltip" data-bs-title="Hapus Peserta">
											<i class="icon-trash"></i>
										</a>
									</td>
									<!-- <td class="p-2"><?php //echo $peserta->namaUsaha; ?></td> -->
									<!-- <td class="p-2"><?php //echo strtoupper($peserta->jenisKelamin); ?></td> -->
								</tr>
								<?php endforeach; endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Data Peserta -->
		<div id="modal-data-peserta" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="vcenter" aria-modal="true" role="dialog">
			<div class="modal-dialog modal-dialog-centered --modal-dialog-scrollable modal-lg">
				<div class="modal-content">
					<!--  -->
				</div>
			</div>
		</div>

<?= $this->endSection(); ?>