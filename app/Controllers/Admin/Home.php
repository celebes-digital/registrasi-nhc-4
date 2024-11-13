<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Home extends BaseController
{
	public function index()
	{
		$registrasiModel	= new \App\Models\RegistrasiModel();

		$this->data['title']					= 'Admin Dashboard';
		$this->data['totalPendaftar']			= $this->PesertaModel->countAllResults();
		$this->data['totalBelumValid']			= $this->DetailPesertaModel->where('validasi', '0')->countAllResults();
		$this->data['totalValid']				= $this->DetailPesertaModel->where('validasi', '1')->countAllResults();
		$this->data['listPerempuan']			= $this->PesertaModel->where('jenisKelamin', 'p')->countAllResults();
		$this->data['listPria']					= $this->PesertaModel->where('jenisKelamin', 'l')->countAllResults();
		$this->data['listValidasi']				= $this->PesertaModel->detailPeserta(['validasi' => '1'])->get()->getResult();
		$this->data['listRegistrasi']			= $registrasiModel->countAllResults();
		return view('admin/home', $this->data);
	}
}