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

<!-- ============================================================== -->
<!-- Review -->
<!-- ============================================================== -->
<div class="row">
	<!-- Column -->
	<div class="col-lg-12 col-md-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">DATA PESERTA YANG SUDAH TERDAFTAR</h5>
				<p>Klik Nama Peserta untuk melihat Detail Data Peserta</p>
			</div>

			<div class="card-body">
				<div class="alert alert-dark">
					<img src="/img/logo-sm.png" --width="30" class="img-fluid me-3" alt="Celebes Digital">
					<span class="fs-4">
						Klik <code class="font-monospace">Kode Registrasi</code> untuk <code class="font-monospace">mengirim e-tiket</code> ke Peserta bersangkutan.
					</span>
				</div>

				<div class="row align-items-center">
					<div class="col-md-auto">
						<a href="/admin/event/exportDataPeserta" class="btn --btn-sm btn-success --mt-3 shadow-sm">
							<i class="icon-notebook mr-1"></i> Data Peserta (Excel)
						</a>
					</div>
				</div>

				<table class="table table-striped table-sm datatable peserta_terdaftar w-100" data-page-length="10">
					<thead>
						<tr>
							<th class="p-2">NO</th>
							<th class="p-2">NAMA</th>
							<th class="p-2">NO. TELP</th>
							<th class="p-2">TGL. Lahir</th>
							<th class="p-2">KELAMIN</th>
							<th class="p-2">ALAMAT</th>
							<th class="p-2">PENDIDIKAN</th>
							<th class="p-2">FOTO</th>
							<th class="p-2">Kelas</th>
							<th class="p-2">VALIDASI</th>
							<th class="p-2">TGL. REGISTRASI</th>
						</tr>
					</thead>

					<tbody>
						<?php
						if ($listPeserta) :
							$no = 1;
							// dd($listPeserta);
							foreach ($listPeserta as $peserta) :
						?>
								<tr>
									<td class="p-2"><?= $no++; ?></td>
									<td class="p-2">
										<a href="#" class="link data_peserta" data-bs-toggle="modal" data-bs-target="#modal-data-peserta" data-url="/admin/validasi/dataPeserta/<?= $peserta->idPeserta; ?>">
											<?= $peserta->nama; ?>
										</a>
									</td>
									<td class="p-2"><?= $peserta->noTelp; ?></td>
									<td class="p-2"><?= $peserta->tgl_lahir; ?></td>
									<td class="p-2"><?= $peserta->jenisKelamin == 'l' ? 'Laki-laki' : 'Perempuan'; ?></td>
									<td class="p-2"><?= $peserta->alamat; ?></td>
									<td class="p-2"><?= $peserta->pendidikan; ?></td>
									<td class="p-2">
										<!-- <img src="<? #= base_url(); ?>/img/registrasi/<? #= $peserta->foto; ?>" class="img-fluid img-thumbnail h-25" alt="<? #= $peserta->nama; ?>"> -->
										<img src="<?= base_url(); ?>/img/registrasi/<?= $peserta->foto; ?>"
											class="img-fluid img-thumbnail gambar-preview"
											alt="<?= $peserta->nama; ?>"
											style="max-height: 150px; cursor: pointer;"
											data-bs-toggle="modal"
											data-bs-target="#modal-gambar"
											data-src="<?= base_url(); ?>/img/registrasi/<?= $peserta->foto; ?>"
											data-alt="<?= $peserta->nama; ?>" />
									</td>
									<td class="p-2"><?= $peserta->kelas ==  'junior' ? 'Junior' : 'Senior'; ?></td>
									<td class="p-2"><?= $peserta->validasi == '0' ? 'V' : 'X'; ?></td>
									<td class="p-2"><?= date('d F, Y - H:i:s', strtotime($peserta->tglRegistrasi)); ?></td>
									<!-- <td class="p-2"><?php //echo strtoupper($peserta->jenisKelamin); 
															?></td>
									<td class="p-2"><?php //echo $peserta->namaUsaha; 
													?></td>
									<td class="p-2"> -->
									<!-- <a href="/admin/validasi/kirimEtiket/<? #= $peserta->idPeserta; 
																				?>">
											<? #= $peserta->kodeRegistrasi; 
											?>
										</a>
									</td> -->
								</tr>
						<?php endforeach;
						endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!--  -->
<div id="modalNoKursiPeserta" class="modal fade" data-bs-keyboard="false" tabindex="-1" aria-labelledby="vcenter" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-sm">
		<div class="modal-content"></div>
	</div>
</div>

<!-- Modal Data Peserta -->
<div id="modal-data-peserta" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="vcenter" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered --modal-dialog-scrollable modal-xl">
		<div class="modal-content"></div>
	</div>
</div>

<div class="modal fade" id="modal-gambar" tabindex="-1" aria-labelledby="modalGambarLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalGambarLabel">Preview Gambar</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body text-center">
				<img id="modal-img" src="" alt="" class="img-fluid img-thumbnail">
			</div>
			<div class="modal-footer">
				<a id="download-link" href="#" download class="btn btn-primary">Download</a>
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

<script>
	document.querySelectorAll('.gambar-preview').forEach(function(img) {
		img.addEventListener('click', function() {
			const src = this.getAttribute('data-src');
			const alt = this.getAttribute('data-alt');

			// Update modal image and download link
			const modalImg = document.getElementById('modal-img');
			const downloadLink = document.getElementById('download-link');
			modalImg.src = src;
			modalImg.alt = alt;
			downloadLink.href = src;
			downloadLink.download = alt.replace(/\s+/g, '_') + '.jpg';
		});
	});
</script>


<?= $this->endSection(); ?>