<?php

namespace App\Controllers;

use App\Libraries\KirimWA;
use CodeIgniter\Exceptions\PageNotFoundException;

class Registrasi extends BaseController
{
	protected $WAapi;
	protected $QRCode;

	public function __construct()
	{
		$this->WAapi = new KirimWA();
		$this->QRCode	= new \App\Libraries\GenerateQrCode();
	}

	/**
	 * Registrasi peserta
	 * @return void
	 */
	// public function peserta()
	// {
	// 	$rules = setting('Validation.registrasi');

	// 	$this->data['title'] 			= $this->data['event'] ? 'Registrasi Event '. $this->data['event']->namaEvent : 'EventPro Registration System by CelebesDigital';
	// 	$this->data['ogDescription']	= $this->data['event'] ? $this->data['event']->namaEvent : 'EventPro Registration System by CelebesDigital';
	// 	$this->data['metaDescription']	= $this->data['event'] ? $this->data['event']->namaEvent : 'EventPro Registration System by CelebesDigital';
	// 	$this->data['eventKegiatan']	= $this->data['event'] ? $this->data['event']->namaEvent : 'EventPro Registration System by CelebesDigital';
	// 	$this->data['metaDescription']	= $this->data['event'] ? 'Registrasi Event '. $this->data['event']->namaEvent : 'EventPro Registration System';
	// 	$this->data['ogDescription']	= $this->data['event'] ? 'Registrasi Event '. $this->data['event']->namaEvent : 'EventPro Registration System';

	// 	if ( $this->request->getPost() )
	// 	{
	// 		// $rules['foto']['rules'] = 'uploaded[foto]|mime_in[foto,image/png.image/jpg,image/jpeg]|is_image[foto]';

	// 		if ( ! $this->validate($rules) )
	// 		{
	// 			return redirect()->back()->withInput();
	// 		}

	// 		// kode unik untuk htm...
	// 		$noTelp	= formatPhone($this->request->getVar('noTelp'));
	// 		$email	= $this->request->getVar('email');

	// 		$dataPeserta = [
	// 			'idEvent'		=> ($this->data['event'] ? $this->data['event']->idEvent : 0),
	// 			'nama'			=> strtoupper(trim($this->request->getPost('nama'))),
	// 			'noTelp'		=> $noTelp,
	// 			'asalInstansi'	=> strtoupper(trim($this->request->getPost('asalInstansi'))),
	// 			'jabatan'		=> strtoupper(trim($this->request->getPost('jabatan'))),
	// 			'tglRegistrasi'	=> date('Y-m-d H:i:s')
	// 			// 'komunitas'		=> '0',
	// 			// 'jenisKelamin'	=> $this->request->getVar('jenisKelamin'),
	// 			// 'email'			=> $email,
	// 		];
	// 		// dd($dataPeserta);

	// 		$detailPeserta['validasi']			= '1';

	// 		$dataEvent['event'] = [
	// 			// 'total_tagihan'	=> 'Akun anda akan divalidasi oleh Admin Registrasi',
	// 			'nama_peserta'	=> 'Bapak/Ibu ' . trim($dataPeserta['nama']),
	// 		];

	// 		// $foto = $this->request->getFile('foto');
	// 		// $path = FCPATH .'/img/admin/dokumen';

	// 		if ( $this->PesertaModel->save($dataPeserta) )
	// 		{
	// 			$notifikasi		= notifRegistrasi($dataEvent);
	// 			$sendNotifikasi	= $this->WAapi->postMessageText($notifikasi, $dataPeserta['noTelp']);

	// 			// if ( $foto && $foto->isValid() && ! $foto->hasMoved() )
	// 			// {
	// 			// 	$filename	= randomStr(6).'.'.$foto->guessExtension();
	// 			// 	$foto->move($path, $filename, true);
	// 			// 	$this->Image->withFile($path .'/'. $filename)
	// 			// 				->resize(800, 1200, true, 'width')
	// 			// 				->save($path .'/'. $filename, 60);

	// 			// 	$detailPeserta['foto'] = $filename;
	// 			// }

	// 			$detailPeserta['idPeserta'] = $this->PesertaModel->getInsertID();

	// 			if ( $this->DetailPesertaModel->save($detailPeserta) )
	// 			{
	// 				return redirect()->to('/registrasi/checkout?id='.$this->PesertaModel->getInsertID());
	// 			}
	// 		}
	// 	}

	// 	return view('registrasi', $this->data);
	// }

	/**
	 * Registrasi peserta
	 * @return void
	 */
	// ? Gunakan ini jika peserta langsung di verifikasi ketika registrasi
	public function peserta()
	{
		$rules = setting('Validation.registrasi');

		$this->data['title'] 			= $this->data['event'] ? 'Registrasi Event ' . $this->data['event']->namaEvent : 'EventPro Registration System by CelebesDigital';
		$this->data['ogDescription'] 	= $this->data['event'] ? $this->data['event']->namaEvent : 'EventPro Registration System by CelebesDigital';
		$this->data['metaDescription'] 	= $this->data['event'] ? $this->data['event']->namaEvent : 'EventPro Registration System by CelebesDigital';;

		if ($this->request->getPost()) {
			if (! $this->validate($rules)) {
				return redirect()->back()->withInput();
			}

			// Upload Foto
			$fileFoto = $this->request->getFile('foto');
			$path	= FCPATH . 'img/registrasi/';
			if ($fileFoto && $fileFoto->isValid()) {
				$namaPeserta = strtoupper(trim($this->request->getPost('nama')));
				$snakeCaseNama = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '_', $namaPeserta));
				$fileName = $snakeCaseNama . '.' . $fileFoto->getExtension();

				$uploadPath = $path;
				if (!is_dir($uploadPath)) {
					mkdir($uploadPath, 0777, true);
				}

				$fileFoto->move($uploadPath, $fileName);
			} else {
				return redirect()->back()->withInput()->with('error', 'Foto belum diunggah atau tidak valid!');
			}

			// Simpan data peserta
			$noTelp = formatPhone($this->request->getVar('noTelp'));
			$dataPeserta = [
				'idEvent'       => $this->data['event'] ? $this->data['event']->idEvent : 0,
				'nama'          => strtoupper(trim($this->request->getPost('nama'))),
				'tgl_lahir'     => strtoupper(trim($this->request->getPost('tgl_lahir'))),
				'jenisKelamin'  => $this->request->getPost('jenisKelamin'),
				'noTelp'        => $noTelp,
				'alamat'        => strtoupper(trim($this->request->getPost('alamat'))),
				'pendidikan'    => strtoupper(trim($this->request->getPost('pendidikan'))),
				'foto'          => $fileName,
				'kelas'         => $this->request->getPost('kelas'),
				'tglRegistrasi' => date('Y-m-d H:i:s')
			];

			$detailPeserta['validasi'] = '0';

			$code = generateCode();
			$this->QRCode::generate($code); 

			$dataEvent['event'] = [
				'nama_peserta'  => 'Bapak/Ibu ' . trim($dataPeserta['nama']),
			];

			if ($this->PesertaModel->save($dataPeserta)) {
				
				$notifikasi = notifRegistrasi($dataEvent);
				$imgUrl = base_url('img/admin/qrcode/' . $code . '.png');
				$sendWA = $this->WAapi->postMsgImg($notifikasi, $dataPeserta['noTelp'], $imgUrl);

				$detailPeserta['idPeserta'] = $this->PesertaModel->getInsertID();
				$detailPeserta['kodeRegistrasi'] = $code; 

				if ($this->DetailPesertaModel->save($detailPeserta)) {
					return redirect()->to('/registrasi/checkout?id=' . $this->PesertaModel->getInsertID());
				}
			}
		}

		return view('registrasi', $this->data);
	}

	// https://simulator.sandbox.midtrans.com/qris/index

	/**
	 * Halaman sukses registrasi
	 * @param string|null $id
	 * @return void
	 */
	public function checkout()
	{
		$userId = $this->request->getVar('id');

		$peserta = $this->PesertaModel->detailPeserta(['peserta.idPeserta' => +$userId])->get()->getRow();
		$peserta || throw PageNotFoundException::forPageNotFound('Mohon maaf, halaman yang Anda cari tidak ditemukan!');

		$this->data['event']			= $this->EventModel->where('aktif', '1')->first();
		$this->data['title']			= $this->data['event'] ?
			'Terima kasih sudah mendaftar di ' . $this->data['event']->namaEvent :
			'EventPro Registration System by CelebesDigital';
		$this->data['ogDescription']	= $this->data['event'] ? $this->data['event']->namaEvent : 'EventPro Registration System by CelebesDigital';
		$this->data['metaDescription']	= $this->data['event'] ? $this->data['event']->namaEvent : 'EventPro Registration System by CelebesDigital';
		$this->data['eventKegiatan']	= $this->data['event'] ? $this->data['event']->namaEvent : 'EventPro Registration System by CelebesDigital';
		// $this->data['sapaan'] 			= ['l' => 'Bapak', 'p' => 'Ibu'];
		$this->data['sapaan'] 			= '';
		$this->data['peserta']			= $peserta;

		return view('checkout', $this->data);
	}
}
