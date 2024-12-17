<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Libraries\KirimWA;

class Peserta extends BaseController
{
	protected $QRCode;
	protected $WAapi;

	public function __construct()
	{
		$this->WAapi = new KirimWA();
	}

	/**
	 * Registrasi by Admin, direct valid
	 * @return void
	 */
	public function registrasiOnSpot()
	{
		$eventAktif = $this->EventModel->where('aktif', '1')->first();
		$ruleRegistrasi = setting('Validation.registrasi');

		$this->data['title'] = 'Registrasi On Spot';

		if ( $this->request->getPost() )
		{
			if ( ! $this->validate($ruleRegistrasi) )
			{
				return redirect()->back()->withInput();
			}

			// kode unik untuk htm...
			$noTelp = formatPhone($this->request->getVar('noTelp'));
			// $foto		= $this->request->getFile('foto');
			// $path		= FCPATH .'/img/admin/dokumen';
			// $filename	= randomStr(6).'.'.$foto->guessExtension();

			$dataPeserta = [
				'idEvent'		=> $eventAktif ? $eventAktif->idEvent : 0,
				'nama'			=> strtoupper(trim($this->request->getVar('nama'))),
				'noTelp'		=> $noTelp,
				'asalInstansi'	=> strtoupper(trim($this->request->getVar('asalInstansi'))),
				'jabatan'		=> strtoupper(trim($this->request->getVar('jabatan'))),
				// 'email'			=> trim(strtolower($this->request->getPost('email'))),
				// 'jenisKelamin'	=> $this->request->getVar('jenisKelamin'),
				'tglRegistrasi'	=> date('Y-m-d H:i:s')
			];
			// dd($dataPeserta);

			$htm = explode('-', $this->request->getPost('htm'));

			$detailPeserta = [
				'namaUsaha'			=> strtoupper(trim($this->request->getPost('namaUsaha'))),
			];

			if ( $this->PesertaModel->save($dataPeserta) )
			{
				$code = generateCode();

				$this->QRCode = new \App\Libraries\GenerateQrCode();
				$this->QRCode::generate($code);

				$detailPeserta['idPeserta']			= $this->PesertaModel->getInsertID();
				$detailPeserta['kodeRegistrasi']	= $code;
				$detailPeserta['validasi']			= '1';
				$detailPeserta['tglValidasi']		= $dataPeserta['tglRegistrasi'];

				if ( $this->DetailPesertaModel->save($detailPeserta) )
				{
					$sapaan	= ['l' => 'Bapak', 'p' => 'Ibu'];

					$dataEvent['event'] = [
						'nama_event'	=> $eventAktif->namaEvent,
						'nama_peserta'	=> ''.' '.trim($dataPeserta['nama']),
					];

					$notifikasi = notifValidasi($dataEvent);
					$qrCode		= base_url('img/admin/qrcode/'.$code.'.png');
					$sendWA		= $this->WAapi->postMsgImg($notifikasi, $noTelp, $qrCode);

					return redirect()->to('/admin/peserta/validasi')->with('info', 'Data Peserta sudah didaftarkan dan divalidasi');
				}
			}
		}

		return view('admin/registrasi_on_spot', $this->data);
	}

	/**
	 * Group peserta berdasarkan bidang usaha
	 * @param String $bidangUsaha
	 * @return void
	 */
	public function dataBidangUsaha(String $bidangUsaha)
	{
		$listPeserta = $this->PesertaModel->detailPeserta(['bidangUsaha' => $bidangUsaha, 'validasi' => '1'])->get()->getResult();

		$html = '
			<div class="modal-header">
				<div>
					<h4 class="modal-title">Data Peserta</h4>
					<h5>Group Berdasarkan Bidang Usaha</h5>
				</div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>

			<div class="modal-body">
				<a href="/admin/event/exportdatapeserta" class="btn btn-sm btn-success mt-3">
					<i class="icon-notebook mr-1"></i> Data Peserta (Excel)
				</a>

				<table class="table table-sm table-striped datatable w-100" data-ordering="false" data-page-length="20">
					<thead>
						<tr>
							<th class="p-2">NO</th>
							<th class="p-2">NAMA</th>
							<th class="p-2">KELAMIN</th>
							<th class="p-2">NO. TELP</th>
							<th class="p-2">VALIDASI</th>
						</tr>
					</thead>
					<tbody>';

		if ( $listPeserta )
		{
			$no = 1;
			foreach ( $listPeserta as $peserta ) {
			$html .= '
				<tr>
					<td class="p-2" width="4%">'.$no++.'</td>
					<td class="p-2">
						<a href="javascript:void(0)" class="link dataPeserta" data-bs-toggle="modal" data-bs-target="#modalInfoRegistrasi" data-url="/admin/event/infoRegistrasi/'.$peserta->idPeserta.'">'.$peserta->nama.'
						</a>
					</td>
					<td class="p-2" width="8%">'.kelamin($peserta->jenisKelamin).'</td>
					<td class="p-2" width="9%">'.$peserta->noTelp.'</td>
					<td class="p-2" width="9%">'.$peserta->validasi.'</td>
				</tr>';
			}
		}

		$html .=	'
					</tbody>
				</table>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect text-dark" data-bs-dismiss="modal">Close</button>
			</div>';

		echo $html;
	}



	/**
	 * Data peserta by jenis kelamin
	 * @param  int    $idPeserta [description]
	 * @return [type]            [description]
	 */
	public function jenisKelamin(string $kelamin = '', bool $validasi = null)
	{
		$dataPeserta = in_array($kelamin, ['l', 'p']) ?
							$this->PesertaModel->detailPeserta(['jenisKelamin' => $kelamin])->get()->getResult() :
								$this->PesertaModel->detailPeserta()->get()->getResult();

		$html = '
			<div class="modal-header">
				<h4 class="modal-title">Data Peserta</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>

			<div class="modal-body">
				<a href="/admin/event/exportDataPeserta" class="btn btn-sm btn-success mt-3">
					<i class="icon-notebook mr-1"></i> Data Peserta (Excel)
				</a>

				<table class="table table-sm table-striped datatable w-100" data-ordering="false" data-page-length="20">
					<thead>
						<tr>
							<th class="p-2">NO</th>
							<th class="p-2">NAMA</th>
							<th class="p-2">ASAL INSTANSI</th>
							<th class="p-2">JABATAN</th>
							</tr>
						</thead>
						<tbody>';
							
		// ? Tambahkan ini jika butuh
		// <th class="p-2">KELAMIN</th>
		// <th class="p-2">NO. TELP</th>

		if ( $dataPeserta )
		{
			$no = 1;
			foreach ( $dataPeserta as $peserta ) {
				$html .= '
					<tr>
						<td class="p-2" width="4%">'.$no++.'</td>
						<td class="p-2">
							<a href="#" class="link data_peserta" data-bs-toggle="modal" data-bs-target="#modal-data-registrasi" data-url="/admin/event/info_registrasi/'.$peserta->idPeserta.'">'.$peserta->nama.'
							</a>
						</td>
						<td class="p-2">' . $peserta->asalInstansi . '</td>
						<td class="p-2">' . $peserta->jabatan . '</td>
					</tr>';
			}
		}
		// ? Tambahkan ini jika butuh
		// <td class="p-2" width="8%">'.kelamin($peserta->jenisKelamin).'</td>
		// <td class="p-2" width="9%">'.$peserta->noTelp. '</td>

		$html .=	'
					</tbody>
				</table>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect text-dark" data-bs-dismiss="modal">Close</button>
			</div>';

		echo $html;
	}

	/**
	 * Data peserta yang akan difollowup
	 * @return [type] [description]
	 */
	public function followup()
	{
		$where = ['validasi' => '0'];

		$this->data['title'] = 'Folowup Peserta';
		$this->data['listPendaftar'] = $this->PesertaModel->detailPeserta($where)->get()->getResult();

		return view('admin/followup', $this->data);
	}

	/**
	 * Data Peserta yang sudah divalidasi
	 * @return string
	 */
	public function validasi()
	{
		// $where = ['validasi' => '1'];

		$this->data['title'] = 'Peserta yang sudah terdaftar';
		// $this->data['listPeserta'] = $this->PesertaModel->detailPeserta($where)->get()->getResult();
		$this->data['listPeserta'] = $this->PesertaModel->detailPeserta()->get()->getResult();

		// dd($this->data['listPeserta']);

		return view('admin/data_validasi', $this->data);
	}

	/**
	 * Hapus data peseta
	 * @param integer|null $idPeserta
	 * @return mixed
	 */
	public function hapus(int $idPeserta = null)
	{
		$peserta = $this->PesertaModel->detailPeserta(['peserta.idPeserta' => $idPeserta])->get()->getRow();

		if ( $peserta )
		{
			if ( file_exists(FCPATH . 'img/registrasi/'.$peserta->foto) )
			{
				unlink(FCPATH . 'img/registrasi/'.$peserta->foto);
			}

			$this->PesertaModel->delete(['idPeserta' => $idPeserta]);
			$this->DetailPesertaModel->delete(['idPeserta' => $idPeserta]);
			return redirect()->to('/admin/peserta/validasi')->with('info', "Data Peserta sudah dihapus!");
		}
		else
		{
			return redirect()->to('/admin/peserta/validasi')->with('info', "Data Peserta tidak ditemukan!");
		}
	}

	public function edit(int $idPeserta)
	{
		$this->data['title'] = 'Edit Peserta';
		$this->data['peserta'] = $this->PesertaModel->detailPeserta(['peserta.idPeserta' => $idPeserta])->get()->getRow();
		$rules = setting('Validation.edit');

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
				$imgFileName = $snakeCaseNama . '.' . $fileFoto->getExtension();
				$fileName = $snakeCaseNama;
				$fileFoto->move($path, $imgFileName, true);
				$this->Image->withFile($path . '/' . $imgFileName)
										->resize(800, 800, true, 'width')
										->convert(IMAGETYPE_WEBP)
										->save($path . '/' . $fileName.'.webp', 60);
							@unlink($path .'/'.$imgFileName);
			}
			$informasi 			= $this->request->getPost('informasi');
			$informasiLainnya 	= $this->request->getPost('lainnya_input');

			// Simpan data peserta
			$noTelp = formatPhone($this->request->getVar('noTelp'));
			$dataPeserta = [
				'idPeserta'     => $idPeserta,
				'idEvent'       => $this->data['event'] ? $this->data['event']->idEvent : 0,
				'nama'          => strtoupper(trim($this->request->getPost('nama'))),
				'tgl_lahir'     => strtoupper(trim($this->request->getPost('tgl_lahir'))),
				'jenisKelamin'  => $this->request->getPost('jenisKelamin'),
				'noTelp'        => $noTelp,
				'alamat'        => strtoupper(trim($this->request->getPost('alamat'))),
				'pendidikan'    => strtoupper(trim($this->request->getPost('pendidikan'))),
				'sekolah'    	=> strtoupper(trim($this->request->getPost('sekolah'))),
				'kelas_sekolah'	=> strtoupper(trim($this->request->getPost('kelas_sekolah'))),
				'informasi'		=> $informasi == 'lainnya' ? $informasiLainnya : $informasi,
				'foto'          => isset($fileName) ? $fileName.'.webp' : $this->data['peserta']->foto,
				'kelas'         => $this->request->getPost('kelas'),
				'tglRegistrasi' => date('Y-m-d H:i:s')
			];

			if ($this->PesertaModel->save($dataPeserta)) {

				return redirect()->to('/admin/peserta/validasi');
			}
		}
		return view('admin/editPeserta', $this->data);
	}

	/**
	 * [search_data description]
	 * @param  string $type [description]
	 * @return [type]       [description]
	 */
	public function searchData(string $type = '')
	{
		$typeOfSearch = [
			'bidangUsaha'	=> 'Jenis Usaha',
			'validasi'		=> 'Validasi',
			'registrasi'	=> 'Registrasi',
			'terdaftar'		=> 'Terdaftar',
			'early_bird'	=> 'HTM Early Bird',
			'vip_1'			=> 'HTM VIP 1',
			'vip_2'			=> 'HTM VIP 2',
			'member'		=> 'HTM Member',
			'non_member'	=> 'HTM Non Member'
		];

		if ( in_array($type, array_keys($typeOfSearch)) )
		{
			$dataPeserta = $this->PesertaModel->detailPeserta([$type => urldecode($this->request->getVar('type'))])->getResult();

			$html = '
				<div class="modal-header">
					<h4 class="modal-title" id="vcenter">Detail Data Peserta : '.$typeOfSearch[$type].'</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
				</div>

				<div class="modal-body">
					<table class="table table-striped table-sm registrasi_peserta datatable w-100" data-ordering="false" data-page-length="10">
						<thead>
							<tr>
								<th class="p-2">NO</th>
								<th class="p-2">NAMA</th>
								<th class="p-2">BIDANG USAHA</th>
								<th class="p-2">NAMA USAHA</th>
						</thead>
						<tbody>';

			$no = 1;
			foreach ( $dataPeserta as $data )
			{
				$html .= '
					<tr>
						<td>'.$no++.'</td>
						<td>'.$data->nama.'</td>
						<td>'.$data->bidangUsaha.'</td>
						<td>'.$data->namaUsaha.'</td>
					</tr>
				';
			}

			$html .= '
						</tbody>
					</table>
				</div>
			';

			echo $html;
		}
	}

	/**
	 * Voucher tiket
	 * @param Int $idEvent
	 * @param Int|null $idVoucher
	 * @return void
	 */
	public function dataVoucher(Int $idEvent, Int $idVoucher = null)
	{
		$VoucherModel = new \App\Models\VoucherModel();
		$rules = setting('Validation.voucher');
		$rules['kodeVoucher']['rules'] .= '|is_unique[voucher.kodeVoucher,idVoucher,'.$idVoucher.']';

		$this->data['title'] = 'Kelola Voucher Kegiatan';
		$this->data['listVoucher'] = $VoucherModel->findAll();

		if ( $this->request->getPost() )
		{
			if ( ! $this->validate($rules) )
			{
				return redirect()->back()->withInput();
			}

			$dataVoucher = [
				'kodeVoucher'	=> trim($this->request->getPost('kodeVoucher')),
				'potongan'		=> trim($this->request->getPost('potongan'))
			];

			! $idVoucher || $dataVoucher['idVoucher'] = $idVoucher;

			$VoucherModel->save($dataVoucher);
			return redirect()->to('/admin/peserta/dataVoucher/'.$idEvent)->with('info', 'Data Voucher sudah diupdate');
		}

		return view('admin/voucher', $this->data);
	}
}