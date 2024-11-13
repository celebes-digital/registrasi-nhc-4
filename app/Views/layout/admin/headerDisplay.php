<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Display Peserta yang sudah registrasi">

		<link href="<?= base_url('img/favicon.ico'); ?>" rel="shortcut icon" type="image/x-icon">
		<link href="<?= base_url('img/favicon.ico'); ?>" rel="icon" type="image/x-icon">

		<title><?= $title; ?></title>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">

		<style>
			.greetings {
				font-family: 'Alex Brush', cursive;
				font-size: 8em;
				color: azure;
				margin-top: 12vh;
			}
			.namaPeserta {
				font-size: 4em;
				margin-bottom: .7em;
			}
			.bg {
				z-index: -1;
				position: fixed;
				top: 0;
				left: 0;
				width: 100%;
				min-height: 100vh;
			}
			.running-text {
				text-align: center;
				background-color: rgb(2 26 48 / 85%);
				padding: 0 30px;
				width: 80vw;
				height: 100vh;
			}
		</style>
	</head>

	<body>
		<img class="bg" src="/img/flyer-registrasi.webp" alt="">
		<!-- Start Content-->
		<?= $this->renderSection('mainSection'); ?>

<?= $this->include('layout/admin/footerDisplay'); ?>