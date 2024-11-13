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
						<h5 class="card-title">DATA PESERTA TERDAFTAR</h5>
						<p>Klik Nama Peserta untuk melihat Detail Data Peserta</p>
					</div>

					<div class="card-body">
						<a href="/admin/event/exportCSV" class="btn btn-sm btn-secondary mt-3 ms-2 shadow-sm">
							<i class="icon-notebook mr-1"></i> Data Peserta (CSV)
						</a>

						<table class="table table-striped table-sm datatable peserta_terdaftar w-100" data-ordering="false" data-page-length="10">
							<thead>
								<tr>
									<th class="p-2" width="10%">NO</th>
									<th class="p-2">NAMA</th>
									<th class="p-2" width="16%">NO. TELP</th>
								</tr>
							</thead>

							<tbody>
								<?php
									if ( $dataPeserta ) :
										$no = 1;
										foreach ( $dataPeserta as $peserta ) :
								?>
								<tr>
									<td class="p-2"><?= $no++; ?></td>
									<td class="p-2"><?= $sapaan[$peserta->gender].' '.$peserta->nama; ?></td>
									<td><?= $peserta->no_telp; ?></td>
								</tr>
								<?php endforeach; endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

<?= $this->endSection(); ?>