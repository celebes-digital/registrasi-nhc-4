<?=
	$this->extend('layout/admin/header_login');
	$this->section('mainSection');
?>
	<!-- ============================================================== -->
	<!-- Main wrapper - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<section id="wrapper" class="login-register login-sidebar" style="background-image:url(/img/admin/background/login-register.webp);">
		<div class="login-box card">
			<div class="card-body">

				<form class="form-horizontal form-material text-center" id="loginform" action="<?= url_to('login'); ?>" method="POST">
					<?= csrf_field(); ?>
					<a href="javascript:void(0)" class="db">
						<img src="/img/logo-kolaborasi.png" alt="ASLI" width="125" class="mb-4" />
					</a>

					<?php if (session('error') !== null) : ?>
						<div class="alert alert-danger mb-0 mt-3" role="alert"><?= session('error') ?></div>
					<?php elseif (session('errors') !== null) : ?>
						<div class="alert alert-danger mb-0 mt-3" role="alert">
							<?php if (is_array(session('errors'))) : ?>
								<?php foreach (session('errors') as $error) : ?>
									<?= $error ?>
									<br>
								<?php endforeach ?>
							<?php else : ?>
								<?= session('errors') ?>
							<?php endif ?>
						</div>
					<?php endif ?>

					<?php if (session('message') !== null) : ?>
						<div class="alert alert-success mb-0 mt-3" role="alert"><?= session('message') ?></div>
					<?php endif ?>

					<div class="form-group">
						<div class="col-xs-12">
							<input class="form-control <?= session('errors.username') ? 'is-invalid' : ''; ?>" name="username" value="<?= old('username'); ?>" type="text" placeholder="Username" inputmode="text" />
							<div class="invalid-feedback">
								<?= session('errors.username') ?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12">
							<input class="form-control <?= session('errors.password') ? 'is-invalid' : ''; ?>" name="password" type="password" placeholder="Password" autocomplete="current-password" inputmode="text" />
							<div class="invalid-feedback">
								<?= session('errors.password'); ?>
							</div>
						</div>
					</div>

					<!-- Remember me -->
					<?php if (setting('Auth.sessionConfig')['allowRemembering']): ?>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')): ?> checked<?php endif ?>>
								<?= lang('Auth.rememberMe') ?>
							</label>
						</div>
					<?php endif; ?>

					<div class="form-group text-center m-t-20">
						<div class="col-xs-12">
							<button class="btn btn-info btn-lg w-100 text-uppercase btn-rounded text-white" type="submit">Log In</button>
						</div>
					</div>

					<div class="form-group m-b-0">
						<div class="col-sm-12 text-center">
							Don't have an account? <a href="/register" class="text-primary m-l-5"><b>Sign Up</b></a>
						</div>
					</div>
				</form>

			</div>
		</div>
	</section>

<?= $this->endSection(); ?>