<?=
	$this->extend('layout/admin/header');
	$this->section('mainSection');
?>
		<!-- ============================================================== -->
		<!-- Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<div class="row page-titles">
			<div class="col-md-5 align-self-center">
				<h4 class="text-themecolor">Data Registrasi</h4>
			</div>
			<div class="col-md-7 align-self-center text-end">
				<div class="d-flex justify-content-end align-items-center">
					<ol class="breadcrumb justify-content-end">
						<li class="breadcrumb-item active"><a href="/admin/home">Home</a></li>
						<li class="breadcrumb-item">Update event</li>
					</ol>
				</div>
			</div>
		</div>

		<!-- SCANNER SECTION -->
		<div class="card shadow">
			<div class="card-header border-bottom text-center">
				<h5 class="card-title mb-1">Cek Status WA API</h5>
				<p class="mb-0"></p>
			</div>

			<div class="card-body">
				<div class="form-body">
					<div class="row justify-content-center">
						<div class="col-md-8 text-center">
							<div class="fs-5 mb-2">STATUS DEVICE : </div>
							<p class="mb-0"><?= $status->status; ?></p>
							<p><?= $status->disconnected_reason; ?></p>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-md-8 text-center">
							<div class="fs-5 mb-2">QR Code : </div>
							<div id="qrcode" data-qrcode="<?= $qrCode->qr_code; ?>"></div>
							<!-- <div id="qrcode" data-qrcode="2@uLb/XkHYa/FAis63lc4ejApVz4vua6Ri7rtPknJ7E/Juf795Gqz/ILvWsuyA9ZDYz0BO3vrUlt/Zsg==,AnKFmy+5ETdlg4crza1UbDT6LOe3apUtMCD4iHuoXQU=,5bf+rKWBMmtBD/d7WJHvBLw7UYy4mW5gIOBhBi1kcUA=,1sOJo6crQ2xsW+7RWzkepEhuHTo2qgOs8srhrTAqsAQ="></div> -->
							<div id="qrCodeText" data-query-string="<?= $qrCode->image_url; ?>"></div>
							<!-- <div id="qrCodeText" data-query-string="https://api.kirimwa.id/v1/qr/show?qrcode=2%40SN3y3OHa3UzFqSuAsst5%2B%2B%2BabSpDimJqLWgiEY5MurRfVAmO3BBHRT8h25H6xRCc4Sui%2BmAt7RI6Pg%3D%3D%2C%2BkB0EZm2jPAzdRZWPLmq%2FPsSIKYizm%2FcWwfV0zZ1IGM%3D%2C2LkDKZMBkk4LCMp%2F4icSaBkmh%2Fp5fGA%2FIuBeOSdnFXk%3D%2C%2FGcIss1QwYnr5XPd7ek0ceQnejoIwib7oShFMcFUaeE%3D&device_id=oppo-reno-x"></div> -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/qr-creator/dist/qr-creator.min.js"></script>
		<script>
			function getQueryString(key) {
				const dataString = document.querySelector('#qrcode').dataset.qrcode;
				// const subString = dataString.substring(1);
				return decodeURIComponent(dataString);
				// console.log(subString);
				// const query = window.location.search.substring(1);
				// const vars = subString.split('&');
				// for (var i = 0; i < vars.length; i++) {
				// 	var pair = vars[i].split('=');
				// 	if (pair[0] == key) {
				// 	}
				}

				// return '';
			// }

			function htmlentities(text) {
				return text.replace(/[<>"&'[]]/g, function(c) {
					return '&#' + c.charCodeAt(0) + ';';
				});
			}

			function generateQrCode(qrValue) {
				QrCreator.render({
					text: qrValue,
					radius: 0.0, // 0.0 to 0.5
					ecLevel: 'H', // L, M, Q, H
					fill: 'black', // foreground color
					background: 'white', // color or null for transparent
					size: 200 // in pixels
				}, document.querySelector('#qrcode'));

				// document.getElementById('qrcodetext').innerText = 'Device ID: ' + htmlentities( getQueryString('device_id') );
			}

			const qrcodeValue = getQueryString('qrcode');
			if (qrcodeValue) {
				generateQrCode(qrcodeValue);
			}
		</script>

<?= $this->endSection(); ?>