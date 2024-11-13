<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Validasi extends BaseController
{
	protected $sesiKegiatanModel;

	public function __construct()
	{
		$this->sesiKegiatanModel	= new \App\Models\SesiKegiatanModel();
	}

	public function peserta(string $code)
	{
		return view('validasi', $this->data);
	}

	public function displayRegistrasi()
	{
		$sesiKegiatan = $this->sesiKegiatanModel->where('tgl_registrasi', date('Y-m-d'))->first();

		$this->data['title'] = 'Display Peserta';
		$this->data['sesiKegiatan']	= $sesiKegiatan;

		return view('admin/displayPeserta', $this->data);
	}
}
