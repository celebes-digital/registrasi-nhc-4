<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?= $ogDescription; ?>">

	<link href="<?= base_url('img/favicon.png'); ?>" rel="shortcut icon" type="image/x-icon">
	<link href="<?= base_url('img/favicon.png'); ?>" rel="icon" type="image/x-icon">

	<title><?= $title; ?></title>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" crossorigin="anonymous" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link href="/icons/themify-icons/themify-icons.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">

	<!-- OG Graph -->
	<meta property="og:title" content="Registrasi Seminar HSN 2024">
	<meta property="og:type" content="Article">
	<meta property="og:description" content="Registrasi Seminar HSN">
	<meta property="og:image" content="<?= base_url('img/flayer-kolaborasi.jpeg'); ?>">
	<meta property="og:url" content="<?= current_url(); ?>">
	<meta property="og:site_name" content="Seminar HSN">
	<meta property="og:locale" content="id_id">

	<style>
		#form-registrasi, #footer-registrasi {
			max-width: 60vw;
		}

		#logoCelebesDigital {
			width: 8%;
		}

		@media (max-width: 567px) {
			#form-registrasi, #footer-registrasi {
				max-width: 86vw;
			}

			#logoCelebesDigital {
				width: 18%;
			}
		}

		.invalid-feedback {
			display: block;
		}

		.registration-form .item {
			margin-bottom: 0;
		}

		.select2-container .select2-selection--single {
			height: 40px;
		}

		.select2-container .select2-selection--multiple {
			height: 40px;
		}

		.registration-form {
			padding: 50px 20px;
		}
	</style>
</head>

<body>
	<img class="bg" src="/img/bg-registrasi.jpg" alt="<?= ''; ?>">
	<div class="registration-form">
		<!-- Start Content-->
		<?= $this->renderSection('mainSection'); ?>

		<?= $this->include('layout/web/footer'); ?>