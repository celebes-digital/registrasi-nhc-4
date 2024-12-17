<?php

namespace App\Controllers\Admin;
use App\Libraries\KirimWA;
use App\Controllers\BaseController;

class Cek extends BaseController
{
	public function __construct()
	{
		$this->KirimWA = new KirimWA;
	}

	public function status_api()
	{
		$this->data['title']		= 'Cek Status WA API';
		$this->data['status']	= json_decode($this->KirimWA->getDeviceByID());
		$this->data['qrCode']	= json_decode($this->KirimWA->getQR());

		return view('admin/cek/status_api', $this->data);
	}
}