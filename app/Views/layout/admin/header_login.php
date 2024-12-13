<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Login CelebesDigital Event Management">
	<meta name="author" content="Celebes Solusi Digital">
	<!-- Favicon icon -->
	<link href="<?= base_url('img/favicon.png'); ?>" type="image/x-icon" rel="shortcut icon">
	<link href="<?= base_url('img/favicon.png'); ?>" type="image/x-icon" rel="icon">

	<title>CelebesDigital Event Management - Ultimate Event Management System</title>

	<!-- page css -->
	<link href="<?= base_url('css/admin/login.css'); ?>" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?= base_url('css/admin/style.min.css'); ?>" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
	<!-- <div class="preloader">
		<div class="loader">
			<div class="loader__figure"></div>
			<p class="loader__label">CelebesDigital</p>
		</div>
	</div> -->
	<?= $this->renderSection('mainSection'); ?>
<?= $this->include('layout/admin/footer_login'); ?>