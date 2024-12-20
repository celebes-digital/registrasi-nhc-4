<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8" />

	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<title>Ngoding Holiday Camp Batch 4</title>



	<!-- Meta tags untuk SEO -->

	<meta charset="UTF-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<meta name="title" content="Ngoding Holiday Camp - Belajar Coding Seru di Liburan Ini!" />

	<meta name="description" content="Ngoding Holiday Camp adalah tempat belajar coding yang menyenangkan untuk anak-anak dan remaja. Nikmati liburan penuh ilmu dan kreativitas dengan belajar HTML, CSS, JavaScript, dan Scratch!" />

	<meta name="keywords" content="Ngoding Holiday Camp, Belajar Coding, HTML, CSS, JavaScript, Scratch, Coding untuk Anak, Liburan Edukatif, Program Coding Anak, Kursus Coding" />

	<meta name="author" content="Ngoding Holiday Camp" />

	<meta name="robots" content="index, follow" />



	<!-- Open Graph Metadata untuk Media Sosial -->

	<meta property="og:type" content="website" />

	<meta property="og:title" content="Ngoding Holiday Camp - Belajar Coding Seru di Liburan Ini!" />

	<meta property="og:description" content="Ngoding Holiday Camp adalah program liburan edukatif untuk anak-anak dan remaja. Belajar HTML, CSS, JavaScript, dan Scratch dengan cara yang menyenangkan!" />

	<meta property="og:image" content="<?= base_url('/assets/img/logo-nhc-2.png'); ?>" />

	<meta property="og:url" content="https://nhcbatch4.eventpro.id" />

	<meta property="og:site_name" content="Ngoding Holiday Camp" />



	<!-- Twitter Card Metadata -->

	<meta name="twitter:card" content="summary_large_image" />

	<meta name="twitter:title" content="Ngoding Holiday Camp - Belajar Coding Seru di Liburan Ini!" />

	<meta name="twitter:description" content="Nikmati liburan seru dengan belajar coding! Program ini dirancang untuk anak-anak dan remaja yang ingin belajar HTML, CSS, JavaScript, dan Scratch dengan interaktif." />

	<meta name="twitter:image" content="<?= base_url('/assets/img/logo-nhc-2.png'); ?>" />



	<!-- Fonts -->

	<link href="https://fonts.googleapis.com" rel="preconnect" />

	<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />

	<link

		href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"

		rel="stylesheet" />



	<link rel="icon" type="image/x-icon" href="/assets/img/logo-nhc-1.png">



	<!-- Vendor CSS Files -->

	<link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

	<link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

	<link href="/assets/vendor/aos/aos.css" rel="stylesheet" />

	<link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />

	<link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />



	<!-- Main CSS File -->

	<link href="/assets/css/main.css" rel="stylesheet" />

	<style>
		.btn-wa {
			color: white;
			background-color: #50B127;
			border: 1px solid #fff;
			padding: 10px 28px 12px;
			font-size: 15px;
			border-radius: 100px;
		}

		.btn-wa:hover {
			background-color: #fff;
			color: #50B127;
			border: 1px solid #50B127;
		}
	</style>

	<!-- =======================================================

			* Template Name: eNno

			* Template URL: https://bootstrapmade.com/enno-free-simple-bootstrap-template/

			* Updated: Aug 07 2024 with Bootstrap v5.3.3

			* Author: BootstrapMade.com

			* License: https://bootstrapmade.com/license/

			======================================================== -->

</head>



<body class="index-page">

	<header id="header" class="header d-flex align-items-center sticky-top">

		<div class="container-fluid container-xl position-relative d-flex align-items-center">

			<a href="index.html" class="logo d-flex align-items-center me-auto">

				<div class="sitename d-none d-sm-block">

					<img src="/assets/img/logo-nhc-2.png" alt="logo-nhc">

				</div>

				<div class="sitename d-sm-none">

					<img src="/assets/img/logo-nhc-1.png" alt="logo-nhc">

				</div>

			</a>



			<nav id="navmenu" class="navmenu">

				<ul>

					<li><a href="#hero" class="active">Beranda</a></li>

					<li><a href="#tentang">Tentang</a></li>

					<li><a href="#brosur">Brosur</a></li>

					<!-- <li><a href="#rundown">Rundown</a></li> -->

					<li><a href="#portfolio">Galeri</a></li>

				</ul>

				<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

			</nav>



			<a class="btn-getstarted" href="/registrasi">Daftar Sekarang</a>
		</div>

	</header>



	<main class="main">

		<!-- Hero Section -->

		<section id="hero" class="hero section">

			<div class="container">

				<div class="row gy-4">

					<div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">

						<h1>Belajar Coding Seru di Liburan Ini!</h1>

						<p>Ngoding Holiday Camp adalah tempat belajar coding yang menyenangkan untuk anak-anak dan remaja. Nikmati liburan penuh ilmu dan kreativitas sambil membuat proyek coding yang seru!</p>

						<div class="d-flex gap-2">

							<a href="/registrasi" class="btn-get-started">Daftar Sekarang</a>

							<a href="https://wa.me/6282292877750" class="btn-wa">Hubungi kami</a>

						</div>

					</div>

					<div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="100">

						<img src="/assets/img/hero.svg" class="animated" />

					</div>

				</div>

			</div>

		</section>

		<!-- /Hero Section -->



		<!-- About Section -->

		<section id="tentang" class="about section">

			<!-- Section Title -->

			<div class="container section-title" data-aos="fade-up">

				<span>Apa itu NHC ?<br /></span>

				<h2>Apa itu NHC ?</h2>

			</div>

			<!-- End Section Title -->



			<div class="container">

				<div class="row gy-4">

					<div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">

						<img src="/assets/img/gal/b31a.webp" class="img-fluid" alt="" />

					</div>

					<div class="col-lg-6 content d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">

						<p>

							Ngoding Holiday Camp adalah program liburan edukatif yang dirancang untuk anak-anak dan remaja yang ingin belajar coding dengan cara yang seru dan interaktif. Dalam camp ini, peserta akan diperkenalkan dengan berbagai bahasa

							pemrograman dasar seperti HTML, CSS, dan JavaScript, serta alat desain seperti Figma untuk membuat tampilan antarmuka. Program ini mengajarkan peserta bagaimana membangun website, dan mendesain aplikasi, sekaligus

							mengembangkan keterampilan kreatif dan logika. Dengan pengajaran yang menyenangkan dan proyek nyata, Ngoding Holiday Camp menjadi pengalaman liburan yang bermanfaat untuk mempersiapkan masa depan di dunia digital.

						</p>

					</div>

				</div>

			</div>

		</section>

		<!-- /About Section -->



		<!-- Materi Singkat Section -->

		<section id="materi" class="materi section">

			<!-- Section Title -->

			<div class="container section-title" data-aos="fade-up">

				<span>Materi Singkat</span>

				<h2>Mengenal HTML, CSS & JavaScript</h2>

				<p>Belajar dasar-dasar pembuatan website dengan cara yang mudah dan menyenangkan!</p>

			</div>

			<!-- End Section Title -->



			<div class="container">

				<div class="row gy-4">

					<!-- HTML Card -->

					<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">

						<div class="materi-item text-center">

							<div class="icon mb-3">

								<img src="/assets/img/html-5.png" alt="logo-html" width="50" height="50" />

							</div>

							<h4>HTML</h4>

							<p>HTML (HyperText Markup Language) adalah fondasi dari semua website. Dengan HTML, kamu bisa membuat struktur halaman seperti judul, paragraf, gambar, dan banyak lagi!</p>

						</div>

					</div>

					<!-- End HTML Card -->



					<!-- CSS Card -->

					<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">

						<div class="materi-item text-center">

							<div class="icon mb-3">

								<img src="/assets/img/css-3.png" alt="logo-css" width="50" height="50" />

							</div>

							<h4>CSS</h4>

							<p>CSS (Cascading Style Sheets) membuat website menjadi lebih menarik! Kamu bisa mengatur warna, font, tata letak, dan animasi agar tampilan website lebih hidup.</p>

						</div>

					</div>

					<!-- End CSS Card -->



					<!-- JavaScript Card -->

					<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">

						<div class="materi-item text-center">

							<div class="icon mb-3">

								<img src="/assets/img/js.png" alt="logo-js" width="50" height="50" />

							</div>

							<h4>JavaScript</h4>

							<p>JavaScript memberikan interaksi dan logika pada website! Dengan JavaScript, kamu bisa membuat website yang dinamis seperti kalkulator, game, atau efek animasi keren.</p>

						</div>

					</div>

					<!-- End JavaScript Card -->

				</div>

			</div>

		</section>

		<!-- /Materi Singkat Section -->

		<!-- scratch section -->

		<section id="materi-scratch" class="py-5">

			<div class="container" data-aos="fade-up" data-aos-delay="400">

				<div class="row align-items-center">

					<!-- Gambar Scratch -->

					<div class="col-md-6">

						<img src="/assets/img/scratch1.jpg" alt="Tampilan Scratch" class="img-fluid shadow" width="400" />

					</div>



					<!-- Konten Materi -->

					<div class="col-md-6">

						<h2>Mengenal Scratch</h2>

						<p class="section-text">

							Scratch adalah platform pemrograman visual yang dirancang untuk pemula, terutama anak-anak. Dengan Scratch, kamu bisa membuat cerita interaktif, animasi, dan game dengan cara yang sederhana dan menyenangkan melalui

							drag-and-drop blok kode!

						</p>

					</div>

				</div>

			</div>

		</section>



		<!-- /Scratch section -->



		<!-- Brosur Section -->

		<section id="brosur" class="services section light-background">

			<!-- Section Title -->

			<div class="container section-title" data-aos="fade-up">

				<span>Brosur</span>

				<h2>Brosur</h2>

				<p>Temukan informasi lengkap tentang Ngoding Holiday Camp di brosur kami. Yuk, jadikan liburanmu lebih produktif!</p>

			</div>

			<!-- End Section Title -->



			<div class="container">

				<div class="row gy-4">

					<div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">

						<div class="position-relative">

							<img src="/assets/img/brosur-anak.jpg" alt="" class="img-fluid" />

						</div>

					</div>

					<!-- End Service Item -->



					<div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">

						<div class="position-relative">

							<img src="/assets/img/brosur-dewasa.jpg" alt="" class="img-fluid" />

						</div>

					</div>

					<!-- End Service Item -->

				</div>

			</div>

		</section>

		<!-- /Brosur Section -->



		<!-- Rundown Section -->

		<!-- <section id="rundown" class="services section py-5">

        <div class="container section-title text-center" data-aos="fade-up">

          <span>Rundown Acara</span>

          <h2>Rundown Acara</h2>

          <p>Berikut adalah jadwal lengkap kegiatan acara kami. Jangan lewatkan setiap momennya!</p>

        </div>



        <div class="container">

          <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

            <div class="col-lg-8 col-md-10 text-center">

              <div class="position-relative">

                <img src="/assets/img/" alt="Rundown Ngoding Holiday Camp" class="img-fluid shadow rounded" />

              </div>

            </div>

          </div>

        </div>

      </section> -->



		<!-- /Rundown Section -->



		<!-- Galeri Section -->

		<section id="portfolio" class="portfolio section">

			<!-- Section Title -->

			<div class="container section-title" data-aos="fade-up">

				<span>Galeri</span>

				<h2>Galeri</h2>

				<p>Dokumentasi keseruan Ngoding Holiday Camp yang penuh inspirasi dan tantangan seru!</p>

			</div>

			<!-- End Section Title -->



			<div class="container">

				<div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

					<ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">

						<li data-filter="*" class="filter-active">Semua</li>

						<li data-filter=".nhc-1">Batch 1</li>

						<li data-filter=".nhc-2">Batch 2</li>

						<li data-filter=".nhc-3">Batch 3</li>

					</ul>



					<!-- Batch 3 -->



					<div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

						<div class="col-lg-4 col-md-6 portfolio-item isotope-item nhc-3">

							<img src="/assets/img/gal/b31.webp" class="img-fluid" alt="" />

						</div>

						<div class="col-lg-4 col-md-6 portfolio-item isotope-item nhc-3">

							<img src="/assets/img/gal/b32.webp" class="img-fluid" alt="" />

						</div>

						<div class="col-lg-4 col-md-6 portfolio-item isotope-item nhc-3">

							<img src="/assets/img/gal/b33.webp" class="img-fluid" alt="" />

						</div>



						<!-- Batch 1 -->

						<div class="col-lg-4 col-md-6 portfolio-item isotope-item nhc-1">

							<img src="/assets/img/gal/b11.webp" class="img-fluid" alt="" />

						</div>

						<div class="col-lg-4 col-md-6 portfolio-item isotope-item nhc-1">

							<img src="/assets/img/gal/b13.webp" class="img-fluid" alt="" />

						</div>

						<div class="col-lg-4 col-md-6 portfolio-item isotope-item nhc-1">

							<img src="/assets/img/gal/b14.webp" class="img-fluid" alt="" />

						</div>



						<!-- Batch 2 -->

						<div class="col-lg-4 col-md-6 portfolio-item isotope-item nhc-2">

							<img src="/assets/img/gal/b21.webp" class="img-fluid" alt="" />

						</div>

						<div class="col-lg-4 col-md-6 portfolio-item isotope-item nhc-2">

							<img src="/assets/img/gal/b22.webp" class="img-fluid" alt="" />

						</div>

						<div class="col-lg-4 col-md-6 portfolio-item isotope-item nhc-2">

							<img src="/assets/img/gal/b23.webp" class="img-fluid" alt="" />

						</div>

						<!-- End Galeri Item -->

					</div>

					<!-- End Galeri Container -->

				</div>

			</div>

		</section>

		<!-- /gal Section -->



		<!-- Call To Action Section -->

		<section id="call-to-action" class="call-to-action section accent-background">

			<div class="container">

				<div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">

					<div class="col-xl-10">

						<div class="text-center">

							<h3>Gabung di Ngoding Holiday Camp!</h3>

							<p>Tingkatkan kemampuan coding-mu sambil menikmati liburan seru bersama teman-teman baru! Yuk, daftar sekarang dan jadilah bagian dari pengalaman belajar yang menyenangkan dan inspiratif.</p>

							<a class="cta-btn" href="/registrasi">Daftar Sekarang</a>

						</div>

					</div>

				</div>

			</div>

		</section>

	</main>



	<footer class="footer">

		<div class="footer-top">

			<h1 class="sitename">NHC</h1>

			<div class="footer-contact">

				<p><strong>Phone:</strong> <a href="https://wa.me/6282292877750">082292877750</a></p>

			</div>

			<h4>Follow Us</h4>

			<p>Jadilah yang pertama tahu! Temukan inspirasi, tips, dan update terbaru hanya dengan mengikuti kami.</p>

			<div class="social-links">

				<a href="https://www.facebook.com/celebesdigital" target="_blank" rel="noopener noreferrer" aria-label="Facebook">

					<i class="bi bi-facebook"></i>

				</a>

				<a href="https://www.instagram.com/celebesdigital_id/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">

					<i class="bi bi-instagram"></i>

				</a>

				<a href="https://www.tiktok.com/@celebesdigital" target="_blank" rel="noopener noreferrer" aria-label="TikTok">

					<i class="bi bi-tiktok"></i>

				</a>

				<a href="https://www.youtube.com/@celebesdigital" target="_blank" rel="noopener noreferrer" aria-label="YouTube">

					<i class="bi bi-youtube"></i>

				</a>

			</div>

		</div>



		<div class="container copyright text-center mt-4">

			<p>© <span>Copyright</span> <strong class="px-1 sitename">NHC</strong> <span>All Rights Reserved</span></p>

			<div class="credits">Designed by <a href="https://celebesdigital.id/">Celebes Digital</a></div>

		</div>

	</footer>



	<!-- Scroll Top -->

	<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



	<!-- Preloader -->

	<!-- <div id="preloader"></div> -->



	<!-- Vendor JS Files -->

	<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script src="/assets/vendor/php-email-form/validate.js"></script>

	<script src="/assets/vendor/aos/aos.js"></script>

	<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>

	<script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>

	<script src="/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>

	<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

	<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>



	<!-- Main JS File -->

	<script src="/assets/js/main.js"></script>

</body>

</html>