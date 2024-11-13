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
		#form-registrasi,
		#footer-registrasi {
			max-width: 60vw;
		}

		#logoCelebesDigital {
			width: 8%;
		}

		@media (max-width: 567px) {

			#form-registrasi,
			#footer-registrasi {
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
	<style>
		.elegant-form {
			max-width: 800px;
			margin: 2rem auto;
			padding: 2rem;
			background: white;
			border-radius: 20px;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
		}

		.elegant-form .form-group {
			margin-bottom: 1.5rem;
		}

		.elegant-form label {
			font-weight: 500;
			color: #2c3e50;
			font-size: 1.1rem !important;
			margin-bottom: 0.5rem;
			background: transparent !important;
		}

		.elegant-form .form-control,
		.elegant-form .form-select {
			border: 2px solid #e9ecef;
			border-radius: 12px;
			padding: 0.8rem 1rem;
			transition: all 0.3s ease;
			font-size: 1rem;
		}

		.elegant-form .form-control:focus,
		.elegant-form .form-select:focus {
			border-color: #4a90e2;
			box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.1);
		}

		.elegant-form .btn-submit {
			background: linear-gradient(45deg, #4a90e2, #357abd);
			border: none;
			border-radius: 12px;
			color: white;
			padding: 1rem;
			font-weight: 600;
			transition: all 0.3s ease;
		}

		.elegant-form .btn-submit:hover {
			transform: translateY(-2px);
			box-shadow: 0 5px 15px rgba(74, 144, 226, 0.3);
		}

		.elegant-form .invalid-feedback {
			border-radius: 8px;
			padding: 0.5rem 1rem;
			margin-top: 0.5rem;
			font-size: 0.9rem;
		}

		.form-header {
			text-align: center;
			margin-bottom: 2rem;
		}

		.form-header img {
			max-width: 100%;
			border-radius: 15px;
			box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
		}

		.required-field {
			color: #e74c3c;
			margin-left: 4px;
		}

		.field-icon {
			color: #95a5a6;
			margin-right: 8px;
		}
	</style>
</head>

<body>
	<img class="bg" src="/img/bg-registrasi.jpg" alt="<?= ''; ?>">
	<div class="registration-form">
		<!-- Start Content-->
		<?= $this->renderSection('mainSection'); ?>

		<?= $this->include('layout/web/footer'); ?>