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

				<form action="<?= url_to('register') ?>" method="post" class="form-horizontal form-material text-center">
                    <?= csrf_field(); ?>
					<a href="javascript:void(0)" class="db">
						<img src="/img/logo-kolaborasi.png" alt="Home" width="125" class="mb-4" />
					</a>

					<div class="alert alert-warning" role="alert">
						<h5>CATATAN ! Email wajib diisi dan tidak perlu menggunakan email yang terdaftar! Cukup menyesuaikan format email yang benar!</h5>
					</div>

					<?php if (session('error') !== null) : ?>
						<div class="alert alert-danger my-3" role="alert"><?= session('error') ?></div>
					<?php elseif (session('errors') !== null) : ?>
						<div class="alert alert-danger my-3" role="alert">
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

                    <!-- Email -->
                    <div class="form-floating mb-2">
                        <input type="email" class="form-control" id="floatingEmailInput" name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" -required>
                        <label for="floatingEmailInput" class="ps-0"><?= lang('Auth.email') ?></label>
                    </div>

                    <!-- Username -->
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="floatingUsernameInput" name="username" inputmode="text" autocomplete="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" -required>
                        <label for="floatingUsernameInput" class="ps-0"><?= lang('Auth.username') ?></label>
                    </div>

                    <!-- Password -->
                    <div class="form-floating mb-2">
                        <input type="password" class="form-control" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.password') ?>" -required>
                        <label for="floatingPasswordInput" class="ps-0"><?= lang('Auth.password') ?></label>
                    </div>

                    <!-- Password (Again) -->
                    <div class="form-floating mb-5">
                        <input type="password" class="form-control" id="floatingPasswordConfirmInput" name="password_confirm" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.passwordConfirm') ?>" -required>
                        <label for="floatingPasswordConfirmInput" class="ps-0"><?= lang('Auth.passwordConfirm') ?></label>
                    </div>

                    <div class="d-grid col-12 col-md-8 mx-auto m-3">
                        <button type="submit" class="btn btn-success btn-lg w-100 text-uppercase btn-rounded"><?= lang('Auth.register') ?></button>
                    </div>

                    <p class="text-center"><?= lang('Auth.haveAccount') ?> <a href="<?= url_to('login') ?>"><?= lang('Auth.login') ?></a></p>

                </form>

			</div>
		</div>
	</section>

<?= $this->endSection(); ?>