<?=
	$this->extend('layout/admin/header');
	$this->section('mainSection');
?>

	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor">Dashboard</h4>
		</div>

		<div class="col-md-7 align-self-center text-end">
			<div class="d-flex justify-content-end align-items-center">
				<ol class="breadcrumb justify-content-end">
					<li class="breadcrumb-item active"><a href="/admin/home">Home</a></li>
				</ol>
			</div>
		</div>
	</div>

	<!-- ============================================================== -->
	<!-- Info box -->
	<!-- ============================================================== -->
	<div class="row row-cols-md-3 row-cols-2 g-2 justify-content-center">
		<div class="col">
			<div class="card border">
				<div class="card-body list_data_peserta" data-bs-toggle="modal" data-bs-target="#modal-data-peserta" data-url="/admin/peserta/jenisKelamin/all">
					<div class="row">
						<div class="col-md-12">
							<div class="d-flex no-block align-items-center">
								<div>
									<h3><i class="icon-people"></i></h3>
									<p class="text-muted">TOTAL PENDAFTAR</p>
								</div>
								<div class="ms-auto">
									<h2 class="counter text-dark"><?= $totalPendaftar ?? '0'; ?></h2>
								</div>
							</div>
						</div>

						<div class="col-12">
							<div class="progress">
								<div class="progress-bar bg-dark" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col">
			<div class="card border">
				<div class="card-body">
					<div class="row">
						<a href="/admin/peserta/followup">
							<div class="col-md-12">
								<div class="d-flex no-block align-items-center">
									<div>
										<h3><i class="icon-people"></i></h3>
										<p class="text-primary">BELUM VALID</p>
									</div>
									<div class="ms-auto">
										<h2 class="counter text-primary"><?= $totalBelumValid ?? '0'; ?></h2>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="progress">
									<div class="progress-bar bg-primary" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col">
			<div class="card border">
				<div class="card-body">
					<div class="row">
						<a href="/admin/peserta/validasi">
							<div class="col-md-12">
								<div class="d-flex no-block align-items-center">
									<div>
										<h3><i class="icon-user-following"></i></h3>
										<p class="text-muted">Peserta Valid</p>
									</div>
									<div class="ms-auto">
										<h2 class="counter text-cyan"><?= $totalValid ?? '0'; ?></h2>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="progress">
									<div class="progress-bar bg-cyan" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<!-- <div class="col">
			<div class="card border">
				<div class="card-body list_data_peserta" data-bs-toggle="modal" data-bs-target="#modal-data-peserta" data-url="/admin/peserta/jenisKelamin/l">
					<div class="row">
						<div class="col-12">
							<div class="d-flex no-block align-items-center">
								<div>
									<h3><i class="icon-user"></i></h3>
									<p class="text-muted">Laki-Laki</p>
								</div>
								<div class="ms-auto">
									<h2 class="counter text-success"><?= $listPria; ?></h2>
								</div>
							</div>
						</div>

						<div class="col-12">
							<div class="progress">
								<div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col">
			<div class="card border">
				<div class="card-body list_data_peserta" data-bs-toggle="modal" data-bs-target="#modal-data-peserta" data-url="/admin/peserta/jenisKelamin/p">
					<div class="row">
						<div class="col-12">
							<div class="d-flex no-block align-items-center">
								<div>
									<h3><i class="icon-user-female"></i></h3>
									<p class="text-muted">Perempuan</p>
								</div>
								<div class="ms-auto">
									<h2 class="counter text-success"><?= $listPerempuan; ?></h2>
								</div>
							</div>
						</div>

						<div class="col-12">
							<div class="progress">
								<div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
	</div>

	<hr>
	<!-- Modal Data Peserta -->
	<div id="modal-data-peserta" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="vcenter" aria-modal="true" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
			<div class="modal-content"></div>
		</div>
	</div>

<?= $this->endSection(); ?>