<?php

namespace App\Controllers;
use App\Libraries\Widget;

class Home extends BaseController
{
    public function index(): string
    {
		// $widget	= new Widget();
		// $event	= $this->EventModel->where('aktif', '1')->first();

		// $this->data['title']			= $event ? 'NHC Batch 4' : 'EventPro Registration System by CelebesDigital';
		// $this->data['ogDescription']	= $event ? 'NHC Batch 4' : 'EventPro Registration System by CelebesDigital';
		// $this->data['metaDescription']	= $event ? 'NHC Batch 4' : 'EventPro Registration System by CelebesDigital';
		// $this->data['event']			= $event ? 'NHC Batch 4' : 'EventPro Registration System by CelebesDigital';

		// $this->data['about']			= $widget->about();
		// $this->data['contact']			= $widget->contact();
		// $this->data['cta_1']			= $widget->cta_1();
		// $this->data['cta_2']			= $widget->cta_2();
		// $this->data['clients']			= $widget->clients();
		// $this->data['slider']			= $widget->slider();
		// $this->data['catalog_content']	= $widget->catalog_content();
		// $this->data['faq']				= $widget->faq();
		// $this->data['pricing']			= $widget->pricing();
		// $this->data['featured_services'] = $widget->featured_services();
		// $this->data['features_1'] 		= $widget->features_1();
		// $this->data['features_2'] 		= $widget->features_2();
		// $this->data['galeri'] 			= $widget->galeri();
		// $this->data['onfocus'] 			= $widget->onfocus();
		// $this->data['services'] 		= $widget->services();
		// $this->data['youtube'] 			= $widget->youtube();
		// $this->data['youtube_short']	= $widget->youtube_short();
		// $this->data['testimonials'] 	= $widget->testimonials();

		return view('home', $this->data);
    }
}