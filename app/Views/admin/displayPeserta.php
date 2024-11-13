<?=
	$this->extend('layout/admin/headerDisplay');
	$this->section('mainSection');
?>

	<div class="d-flex flex-column min-vh-100 justify-content-center align-items-center display">
		<!-- Display -->
		<div class="running-text">
			<div class="text">
				<h1 class="lh-1 mb-3 greetings" style="margin-top: 0">Ahlan wa sahlan...</h1>
				<div class="displayNamaPeserta"></div>
			</div>
		</div>
	</div>

<?= $this->endSection(); ?>



<hr>

<!-- ============================================================== -->
<!-- Statisik Peserta by Kategori Usaha -->
<!-- ============================================================== -->
<div class="row">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title mb-4">STATISTIK PESERTA DPD</h4>
			<div class="row row-cols-2 row-cols-md-4 g-3 mb-4">
				<?php
					if ( $groupPesertaDpd ) :
						foreach ( $groupPesertaDpd as $dpd ) :
				?>
					<div class="col">
						<div class="d-flex no-block align-items-center">
							<div>
								<h3><i class="icon-people"></i></h3>
								<p class="text-info"><?= $dpd->namaDpd; ?></p>
							</div>
							<div class="ms-auto">
								<h2 class="counter text-info"><?= $dpd->Jumlah; ?></h2>
							</div>
						</div>
					</div>
				<?php endforeach; endif; ?>
			</div>
		</div>
	</div>
</div>