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
					<div class="card-body">
						<h5 class="card-title">DATA ABSENSI PESERTA</h5>
						<p>Klik Nama Peserta untuk melihat Detail Data Peserta</p>
					</div>

					<div class="card-body">
						<div class="alert alert-info">
							<!-- <img src="/img/logo-sm.png" --width="30" class="img-fluid me-3" alt="Celebes Digital"> -->
							<span class="fs-4">
								Klik <code class="font-monospace">Nama Peserta</code> untuk <code class="font-monospace">melihat detail data peserta</code>.
							</span>
						</div>

						<a href="/admin/data/exportDataAbsensi/<?= $uri->getSegment(4); ?>" class="btn --btn-sm btn-success mt-3 shadow-sm">
							<i class="icon-notebook mr-1"></i> Data Peserta (Excel)
						</a>

						<h5 class="text-end mb-2">Sesi Kegiatan :</h5>
						<?php if ( $daftarSesi ) : ?>
							<div class="d-flex flex-row justify-content-end mb-3">
								<?php foreach ( $daftarSesi as $sesi ) : ?>
									<a href="/admin/data/absensi/<?= $sesi->id_sesi; ?>" class="btn btn-secondary shadow ms-2 mb-1"><?= 'Sesi ' . $sesi->sesi; ?></a>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>

						<table class="table table-striped table-sm datatable peserta_terdaftar w-100" data-page-length="10">
							<thead>
								<tr>
									<th class="p-2" data-order="false">NO</th>
									<th class="p-2">NAMA</th>
									<th class="p-2" data-order="false">NO. TELP</th>
									<th class="p-2">KELAMIN</th>
									<th class="p-2">TGL/JAM REGISTRASI</th>
								</tr>
							</thead>

							<tbody>
								<?php
									if ( $dataAbsensi ) :
										$no = 1;
										foreach ( $dataAbsensi as $absen ) :
								?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $absen->nama; ?></td>
									<td><?= $absen->no_telp; ?></td>
									<td><?= gender($absen->gender); ?></td>
									<td><?= $absen->tgl_absen; ?></td>
								</tr>
								<?php endforeach; endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


<?= $this->endSection(); ?>