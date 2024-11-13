<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?= lang('Errors.pageNotFound') ?></title>
		<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
		<!-- <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/error-404s/error-404-1/assets/css/error-404-1.css"> -->

		<style>
			.bsb-btn-xl {
				--bs-btn-padding-y: 0.625rem;
				--bs-btn-padding-x: 1.25rem;
				--bs-btn-font-size: calc(1.26rem + 0.12vw);
				--bs-btn-border-radius: var(--bs-border-radius-lg)
			}

			@media(min-width:1200px) {
				.bsb-btn-xl {
					--bs-btn-font-size: 1.35rem
				}
			}

			.bsb-btn-2xl {
				--bs-btn-padding-y: 0.75rem;
				--bs-btn-padding-x: 1.5rem;
				--bs-btn-font-size: calc(1.27rem + 0.24vw);
				--bs-btn-border-radius: var(--bs-border-radius-lg)
			}

			@media(min-width:1200px) {
				.bsb-btn-2xl {
					--bs-btn-font-size: 1.45rem
				}
			}

			.bsb-btn-3xl {
				--bs-btn-padding-y: 0.875rem;
				--bs-btn-padding-x: 1.75rem;
				--bs-btn-font-size: calc(1.28rem + 0.36vw);
				--bs-btn-border-radius: var(--bs-border-radius-lg)
			}

			@media(min-width:1200px) {
				.bsb-btn-3xl {
					--bs-btn-font-size: 1.55rem
				}
			}

			.bsb-btn-4xl {
				--bs-btn-padding-y: 1rem;
				--bs-btn-padding-x: 2rem;
				--bs-btn-font-size: calc(1.29rem + 0.48vw);
				--bs-btn-border-radius: var(--bs-border-radius-lg)
			}

			@media(min-width:1200px) {
				.bsb-btn-4xl {
					--bs-btn-font-size: 1.65rem
				}
			}

			.bsb-btn-5xl {
				--bs-btn-padding-y: 1.125rem;
				--bs-btn-padding-x: 2.25rem;
				--bs-btn-font-size: calc(1.3rem + 0.6vw);
				--bs-btn-border-radius: var(--bs-border-radius-lg)
			}

			@media(min-width:1200px) {
				.bsb-btn-5xl {
					--bs-btn-font-size: 1.75rem
				}
			}

			.bsb-flip {
				transform: scale(-1)
			}

			.bsb-flip-h {
				transform: scaleX(-1)
			}

			.bsb-flip-v {
				transform: scaleY(-1)
			}
		</style>

	</head>

	<body>
		<!-- Error 404 Template 1 - Bootstrap Brain Component -->
		<section class="py-3 py-md-5 min-vh-100 d-flex justify-content-center align-items-center">
			<div class="container border rounded-4 shadow p-5">
				<div class="row">
					<div class="col-12">
						<div class="text-center">
							<h2 class="d-flex justify-content-center align-items-center gap-2 mb-4">
								<span class="display-1 fw-bold">4</span>
								<i class="bi bi-exclamation-circle-fill text-danger display-4"></i>
								<span class="display-1 fw-bold bsb-flip-h">4</span>
							</h2>
							<h3 class="h2 mb-2">Oops! Maaf, sepertinya Anda tersesat.</h3>
							<h5 class="mb-5">Halaman yang Anda cari tidak ditemukan!.</h5>
							<a class="btn bsb-btn-5xl btn-dark rounded-pill px-5 fs-6 m-0" href="javascript:history.back(-1)" role="button">Back to Home</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	</body>
</html>