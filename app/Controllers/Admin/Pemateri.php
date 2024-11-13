<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pemateri extends BaseController
{
	public function index()
	{
		//
	}

	public function update(string $Slug = null)
	{
		$this->data['title']            = 'Update Data pemateri';
		$this->data['validation']       = \Config\Services::validation();
		$this->data['pemateri']            = $Slug ? $this->pemateriModel->where('slug', $Slug)->first() : $this->pemateriModel->newpemateri();
		$this->data['listpemateri']        = $this->pemateriModel->findAll();


		$rules = [
			'nama_pemateri' => [
				'rules'                => "trim|required|is_unique[tbl_pemateri.nama_pemateri,slug{$Slug}]",
				'errors'                => [
					'required'                => 'Nama pemateri belum diisi!',
					'is_unique'                => 'Nama pemateri sudah terdaftar...!'
				]
			],

			'no_telp' => [
				'rules'                => "trim|required|is_unique[tbl_pemateri.no_telp,slug{$Slug}]",
				'errors'                => [
					'required'                => 'Anda belum mengisi No. Telp. (WA)!',
					'is_unique'                => 'No. Telp. (WA) sudah terdaftar! Coba isi dengan nomor lain',
				]
			],
			'pekerjaan' => [
				'rules'                => "trim|required",
				'errors'                => [
					'required'                => 'Anda belum mengisi Pekerjaan!',
				]
			],
		];

		if ($this->request->getPost()) {
			if (!$this->validate($rules)) {
				return redirect()->back()->withInput();
			} else {

				$pemateriSlug = url_title($this->request->getVar('nama_pemateri'), '-', true);
				$noTelp = format_phone('08', '628', $this->request->getVar('no_telp'));

				$datapemateri = [
					'nama_pemateri'       => $this->request->getVar('nama_pemateri'),
					'slug'             	  => $pemateriSlug,
					'jenis_kelamin'       => $this->request->getVar('jenis_kelamin'),
					'no_telp'             => $noTelp,
					'pekerjaan'           => $this->request->getVar('pekerjaan'),
					'deskripsi'           => $this->request->getVar('deskripsi'),
				];

				// $imgHeader = $this->request->getFile('img');

				// if ($imgHeader->isValid() && !$imgHeader->hasMoved()) {
				// 	$image = \Config\Services::image();

				// 	$filename = trim($datapemateri['slug']) . '.' . $imgHeader->guessExtension();

				// 	$datapemateri['img'] = $filename;

				// 	$imgHeader->move('_web/assets/img/pemateri', $filename, true);
				// 	$fullSize = $image->withFile('_web/assets/img/pemateri/' . $filename)
				// 		->fit(1920, 1080, 'center')
				// 		->save('_web/assets/img/pemateri/' . $filename);
				// 	$this->tiny->compress('_web/assets/img/pemateri', $filename);

				// 	if ($this->tiny->compress('_web/assets/img/pemateri', $filename)) {
				// 		$metaSize = $image->withFile('_web/assets/img/pemateri/' . $filename)
				// 			->fit(400, 400, 'center')
				// 			->save('_web/assets/img/pemateri/meta/' . $filename);
				// 		$this->tiny->compress('_web/assets/img/pemateri/meta/', $filename);
				// 	}
				// }

				// !$Slug || $datapemateri['id_pemateri'] = $pemateri->id_pemateri;



				$this->pemateriModel->save($datapemateri);
				session()->setFlashdata('info', 'Data pemateri sudah diupdate!');
				return redirect()->to('/admin/pemateri/update');
			}
		}
		return view('admin/pemateri/update', $this->data);
	}
}
