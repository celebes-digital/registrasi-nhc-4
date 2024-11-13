<?php

namespace App\Libraries;

class Widget
{
	public function about()
	{
		return view('frontend/about');
	}

	public function contact()
	{
		return view('frontend/contact');
	}

	public function cta_1()
	{
		return view('frontend/cta_1');
	}

	public function cta_2($data = null)
	{
		// <a class="cta-btn align-self-start" href="#">Call To Action</a>
		// $html = '
		// 	<section class="cta section">
		// 		<div class="container aos-init" data-aos="fade-up">
		// 			<div class="row g-5">
		// 				<div class="row g-5">
		// 					<div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
		// 						<h3>'.$data->title.'</h3>
		// 						<p>'.$data->text.'</p>
		// 					</div>';

		// if ( $data->img )
		// {
		// 	$html .= '
		// 		<div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
		// 			<div class="img">
		// 				<img id="affiliateProfile" class="img-fluid" src="/_frontend/assets/img/'.$data->img.'" alt="'.$data->title.'" />
		// 			</div>
		// 		</div>';
		// }

		// $html .= '</div>
		// 			</div>
		// 		</div>
		// 	</section>';

		// return $html;

		return view('frontend/cta_2');
	}

	public function catalog_content(string $sectionTitle = null, string $sectionSubtitle = null, $contents = null)
	{
		// $html = '
		// 	<section class="catalog-content content">
		// 		<div class="container aos-init" data-aos="fade-up">';

		// 	if ( $sectionTitle )
		// 	{
		// 		$html .= '
		// 			<div class="section-header">
		// 				<h2 class="section-title">'.$sectionTitle.'</h2>';

		// 		if ( $sectionSubtitle )
		// 		{
		// 			$html .= '<p class="section-subtitle fs-4">'.$sectionSubtitle.'</p>';
		// 		}

		// 		$html .= '</div>';
		// 	}

		// $html .= '<div class="section-body">
		// 			<div class="row g-5">';

		// foreach ( $contents as $content )
		// {
		// 	// <div class="content-label">Lorem, ipsum.</div>
		// 	$html .= '<div class="col-md-4">
		// 				<div class="card position-relative h-100">
		// 					<img src="/_frontend/assets/img/'.$content->img.'" class="card-img-top" alt="'.$content->textHeader.'" />
		// 					<div class="card-body">
		// 						<p class="fw-bold text-secondary fs-5">'.$content->textHeader.'</p>
		// 						<p class="section-text">'.$content->sectionText.'</p>
		// 					</div>
		// 				</div>
		// 			</div>';
		// }

		// return $html;
		return view('frontend/catalog_content');
	}

	public function clients($data = null)
	{
		// $html = '
		// 	<section class="clients">
		// 		<div class="container aos-init" data-aos="zoom-out">
		// 			<div class="clients-slider swiper">
		// 				<div class="swiper-wrapper align-items-center">';

		// foreach ( $data as $row )
		// {
		// 	$html .= '<div class="swiper-slide">
		// 				<img src="/_frontend/assets/img/clients/'.$row->img.'" class="img-fluid" alt="" />
		// 			</div>';
		// }

		// $html .= '</div>
		// 			</div>
		// 		</div>
		// 	</section>';

		// return $html;

		return view('frontend/clients');
	}

	public function faq($sectionTitle = null, $sectionSubtitle = null, $img = null, $data = null)
	{
		// $html = '<section id="faq" class="faq">
		// 	<div class="container-fluid" data-aos="fade-up">
		// 		<div class="section-header">
		// 			<h2 class="section-title">'.$sectionTitle.'</h2>
		// 			<p class="section-subtitle fs-4">'.$sectionSubtitle.'</p>
		// 		</div>

		// 		<div class="section-body">
		// 			<div class="row gy-4">
		// 				<div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
		// 					<div class="accordion accordion-flush px-xl-5" id="faqlist">';

		// foreach ( $data as $row )
		// {
		// 	$html .= '<div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
		// 		<h3 class="accordion-header">
		// 			<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
		// 				<i class="bi bi-question-circle question-icon"></i>'.$row->pertanyaan.'</button>
		// 		</h3>
		// 		<div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
		// 			<div class="accordion-body">'.$row->jawaban.'</div>
		// 		</div>
		// 	</div>';
		// }

		// $html .= '<div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style="background-image: url("_frontend/assets/img/'.($row->img ?? 'faq.jpg').'");">&nbsp;</div>';

		// return $html;

		return view('frontend/faq');
	}

	public function youtube(string $sectionTitle = null, string $sectionSubtitle = null, $data = null)
	{
		// $html = '
		// 	<section class="youtube section">
		// 		<div class="container" data-aos="fade-up">
		// 			<div class="section-header">
		// 				<h2 class="section-title">'.$sectionTitle.'</h2>
		// 				<p class="section-subtitle fs-4">'.$sectionText.'</p>
		// 			</div>

		// 			<div class="section-body">
		// 				<div class="row row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-1 g-4">';

		// foreach ( $data as $row )
		// {
		// 	$html .= '<div class="col">
		// 			<div class="ratio ratio-16x9">'.$data->src.'</div>
		// 		</div>';
		// }

		// $html .= '</div>
		// 			</div>
		// 		</div>
		// 	</section>';

		// return $html;

		return view('frontend/youtube');
	}

	public function slider()
	{
		return view('frontend/slider');
	}

	public function youtube_short(string $sectionTitle = null, string $sectionSubtitle = null, ?array $data = null)
	{
		// $html = '<section class="youtube-short section">
		// 	<div class="container" data-aos="fade-up">';

		// if ( $sectionTitle )
		// {
		// 	$html .= '<div class="section-header">
		// 		<h2 class="section-title">'.$sectionTitle.'</h2>';

		// 	if ( $sectionSubtitle )
		// 	{
		// 		$html .= '<p class="section-text fs-4">'.$sectionSubtitle.'</p>';
		// 	}

		// 	$html .= '</div>';
		// }

		// $html .= '<div class="section-body">
		// 			<div class="row row-cols-sm-2 row-cols-md-2 row-cols-lg-3 row-cols-1 g-4">';

		// foreach ( $data as $row )
		// {
		// 	$html .= '<div class="col">'.$row->src.'</div>';
		// }

		// $html .= '</div>
		// 		</div>
		// 	</div>
		// </section>';

		// return $html;

		return view('frontend/youtube_short');
	}

	public function pricing()
	{
		return view('frontend/pricing');
	}

	public function featured_services($data = null)
	{
		// $html = '<section class="featured-services">
		// 			<div class="container">
		// 				<div class="row gy-4">';

		// foreach ( $data as $row )
		// {
		// 	$html .= '<div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="0">
		// 		<div class="service-item position-relative">
		// 			<div class="icon"><i class="'.$row->icon.' icon"></i></div>
		// 			<h4>'.$row->title.'</h4>
		// 			<p>'.$row->text.'</p>
		// 		</div>
		// 	</div>';
		// }

		// $html .= '</div>
		// 		</div>
		// 	</section>';

		// return $html;

		return view('frontend/featured_services');
	}

	public function features_1()
	{
		return view('frontend/features_1');
	}

	public function features_2()
	{
		return view('frontend/features_2');
	}

	public function galeri()
	{
		return view('frontend/galeri');
	}

	public function onfocus()
	{
		return view('frontend/onfocus');
	}

	public function services()
	{
		return view('frontend/services');
	}

	public function testimonials()
	{
		return view('frontend/testimonials');
	}

	public function featuredServices($icon, $title, $text)
	{
		$html = '<div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="0">
		<div class="service-item position-relative">';

		if ( $icon )
		{
			$html .= '<div class="icon"><i class="'.$icon.'"></i></div>';
		}

		$html .= "<h4>{$title}</h4>";
		$html .= "<p>{$text}</p>";
		$html .= '</div></div>';

		return $html;
	}
}