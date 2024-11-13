<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Favicon icon -->
		<link href="/img/favicon.ico" type="image/x-icon" rel="shortcut icon">
		<link href="/img/favicon.ico" type="image/x-icon" rel="icon">

		<title><?= $title; ?></title>
		<!-- This page CSS -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" rel="stylesheet">
		<link href="/node_modules/switchery/switchery.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.compat.min.css" rel="stylesheet">
		<!-- chartist CSS -->
		<link href="/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
		<link href="/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css" rel="stylesheet">
		<link href="/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/spin.js/4.1.1/spin.min.css" rel="stylesheet">
		<link href="/css/admin/style.min.css" rel="stylesheet">
		<link href="/css/admin/pages/dashboard1.css" rel="stylesheet">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
			button.close {
				padding: 0;
				background-color: transparent;
				border: 0;
			}
			.close {
				float: right;
				font-size: 1.3125rem;
				font-weight: 700;
				line-height: 1;
				color: #000;
				text-shadow: 0 1px 0 #fff;
				opacity: .5;
			}
			span.charNum {
				display: block;
				margin-top: 0;
				background-color: greenyellow;
				text-align: center;
				padding: 2px 10px;
			}
			table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child:before,
			table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child:before {
				top: 10px;
			}
			table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td a {
				margin-left:20px;
			}
			.swal2-title {
				font-size: 1.275em!important;
			}
			.dataTables_wrapper.container-fluid {
				padding-left: 0;
				padding-right: 0;
			}
			.topbar .top-navbar .navbar-header {
				line-height: 22px;
			}
			.label-secondary {
				background-color: #a3a5a7;
				color: ##787878;
			}
		</style>
	</head>

	<body class="skin-purple fixed-layout">
		<!-- ============================================================== -->
		<!-- Preloader - style you can find in spinners.css -->
		<!-- ============================================================== -->
		<div class="preloader">
			<div class="loader">
				<div class="loader__figure"></div>
				<p class="loader__label">CelebesDigital</p>
			</div>
		</div>

		<div id="main-wrapper">
			<!-- flashdata -->
			<div id="flashdata" data-flashdata="<?= session()->info; ?>"></div>
			<!-- ============================================================== -->
			<!-- Topbar header - style you can find in pages.scss -->
			<!-- ============================================================== -->
			<?= $this->include('layout/admin/navheader'); ?>

			<!-- ============================================================== -->
			<!-- Left Sidebar - style you can find in sidebar.scss  -->
			<!-- ============================================================== -->
			<?= $this->include('layout/admin/navside'); ?>

			<!-- ============================================================== -->
			<!-- Page wrapper  -->
			<!-- ============================================================== -->
			<div class="page-wrapper">
				<!-- ============================================================== -->
				<!-- Container fluid  -->
				<!-- ============================================================== -->
				<div class="container-fluid">
					<?= $this->renderSection('mainSection'); ?>
				</div>

<?= $this->include('layout/admin/footer'); ?>