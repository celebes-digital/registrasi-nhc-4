<?=
	$this->extend('layout/admin/header');
	$this->section('mainSection');
?>
		<!-- ============================================================== -->
		<!-- Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h4 class="text-themecolor">Kelola Voucher</h4>
			</div>
			<div class="col-md-7 align-self-center text-end">
				<div class="d-flex justify-content-end align-items-center">
					<ol class="breadcrumb justify-content-end">
						<li class="breadcrumb-item active"><a href="/admin/home">Home</a></li>
						<li class="breadcrumb-item">Kelola Voucher</li>
					</ol>
				</div>
			</div>
		</div>

		<!-- ============================================================== -->
		<!-- Review -->
		<!-- ============================================================== -->
		<div class="card">
			<div class="card-header">
				<h4 class="card-title my-3">Data Voucher</h4>
			</div>
			<div class="card-body px-4">
				<div class="row">
					<div class="col-md-6">
						<?php if ( validation_errors() ) : ?>
							<div class="alert alert-danger mt-2 text-center" role="alert">
								<h4 class="alert-heading">Warning!</h4>
								<hr>
								<p class="mb-0">Ada kesalahan dalam memproses formulir. Periksa kembali inputan Anda!</p>
							</div>
						<?php endif; ?>

						<?= form_open(attributes: 'role="form"'); ?>
							<?= csrf_field(); ?>
							<div class="form-body mb-4">
								<p class="mt-4">Keterangan : <span class="text-danger">(*)</span> wajib diisi</p>
								<div class="row mb-3">
									<div class="col-md-5">
										<h5 class="p-1 text-center bg-light rounded-pill">Kode Voucher <span class="text-danger">(*)</span></h5>
										<?= form_input('kodeVoucher', set_value('kodeVoucher'), 'class="form-control form-control-lg border-dark '.(validation_show_error('kodeVoucher') ? 'is-invalid' : '').'" placeholder="Max. 10 char" maxlength="10" onKeyDown="limtText(this, 10)" onKeyUp="limitText(this, 10)" autofocus'); ?>
										<div class="invalid-feedback p-1 rounded text-error"><?= validation_show_error('kodeVoucher'); ?></div>
									</div>

									<div class="col-md-3">
										<h5 class="p-1 text-center bg-light rounded-pill">Potongan (%) <span class="text-danger">(*)</span></h5>
										<?= form_input('potongan', set_value('potongan'), 'class="form-control form-control-lg border-dark '.(validation_show_error('potongan') ? 'is-invalid' : '').'" data-mask="00.00"'); ?>
										<div class="invalid-feedback p-1 rounded text-error"><?= validation_show_error('potongan'); ?></div>
									</div>

									<div class="col-md-4">
										<label for="" class="mb-0">&nbsp;</label>
										<div>
											<button type="submit" class="btn bg-info btn-lg py-3 fs-4 btn-block text-light">
												Update Voucher
											</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>

					<div class="col-md-6">
						<h5>List Voucher</h5>
						<div class="table-responsive">
							<table class="table table-striped datatable w-100">
								<thead>
									<tr>
										<th>Kode Voucher</th>
										<th class="text-end" width="22%">Potongan (%)</th>
										<th width="10%">Tersedia</th>
									</tr>
								</thead>

								<tbody>
									<?php
										if ( $listVoucher ) : foreach ( $listVoucher as $list ) :
											$status = $list->terpakai ? '<span class="label label-secondary">Terpakai</span>' : '<span class="label label-info">Tersedia</span>'
									?>
									<tr>
										<td><?= $list->kodeVoucher; ?></td>
										<td class="text-end"><?= $list->potongan; ?></td>
										<td><?= $status; ?></td>
									</tr>
									<?php endforeach; endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

<?= $this->endSection(); ?>