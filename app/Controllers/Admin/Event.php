<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use App\Libraries\KirimWA;

class Event extends BaseController
{
	/**
	 * Update Data Event
	 * @param  string   $event   [description]
	 * @param  int|null $idEvent [description]
	 * @return [type]            [description]
	 */
	public function update(int $idEvent = null)
	{
		$event = $idEvent ? $this->EventModel->find($idEvent) : $this->EventModel->newEvent();
		$ruleEvent = setting('Validation.event');

		$this->data['title']		= 'Update Data Event';
		$this->data['daftarEvent']	= $this->EventModel->detailEvent()->get()->getResult();
		$this->data['event']		= $event;

		if ( $this->request->getPost() )
		{
			$ruleEvent['namaEvent']['rules'] .= '|is_unique[event.namaEvent,idEvent,' . $idEvent . ']';

			if ( ! $this->validate($ruleEvent) )
			{
				return redirect()->back()->withInput();
			}

			$dataEvent = [
				'namaEvent'		=> strtoupper($this->request->getPost('namaEvent')),
				'penyelenggara'	=> trim($this->request->getPost('penyelenggara')),
				'tglMulai'		=> $this->request->getPost('tglMulai'),
				'hariMulai'		=> $this->request->getPost('hariMulai'),
				'jamMulai'		=> $this->request->getPost('jamMulai'),
				'tglSelesai'	=> $this->request->getPost('tglSelesai'),
				'hariSelesai'	=> $this->request->getPost('hariSelesai'),
				'jamSelesai'	=> $this->request->getPost('jamSelesai'),
				'lokasi'		=> strtoupper($this->request->getPost('lokasi')),
				'alamat'		=> strtoupper($this->request->getPost('alamat')),
				'catatan'		=> trim($this->request->getPost('catatan'))
			];

			! $idEvent || $dataEvent['idEvent']	= $idEvent;
			$this->EventModel->save($dataEvent);
			return redirect()->to('/admin/event/update')->with('info', 'Data Event sudah diupdate');
		}

		return view('admin/update_event', $this->data);
	}

	/**
	 * Sesi Event
	 * @param [type] $idEvent
	 * @return void
	 */
	public function sesi($idEvent)
	{
		$sesiEvent	= $this->SesiModel->where('idEvent', $idEvent)->findAll();
		$event		= $this->EventModel->find($idEvent);

		$html = '<div class="modal-header">
				<div>
					<h4 class="modal-title" id="vcenter">Data Sesi Kegiatan</h4>
					<p class="mb-0">'.$event->namaEvent.'</p>
				</div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>'.
			form_open('/admin/event/sesi/'.$idEvent).
				'<div class="modal-body">
					<div class="row mb-3">
						<label for="hari" class="col-md-2 col-form-label">Hari</label>
						<div class="col-md-4">
							<input type="text" name="hari" class="form-control border-dark" />
						</div>

						<label for="tgl" class="col-md-2 col-form-label">Tgl</label>
						<div class="col-md-4">
							<input type="text" name="tgl" class="form-control tgl border-dark" />
						</div>
					</div>

					<table class="table table-sm table-striped">
						<thead>
							<tr>
								<th>Hari</th>
								<th>Tanggal</th>
							</tr>
						</thead>

						<tbody>';
					if ( $sesiEvent )
					{
						foreach ( $sesiEvent as $sesi )
						{
							$html .= '<tr>
									<td>'.$sesi->hari.'</td>
									<td>'.date('j F, Y', strtotime($sesi->tgl)).'</td>
								</tr>';
						}
					}

						$html .= '</tbody>
					</table>
				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Update Sesi Kegiatan</button>
				</div>'.
			form_close();

		if ( $this->request->getPost() )
		{
			$rules = [
				'hari' => [
					'rules'		=> 'required',
					'errors'	=> [
						'required'		=> 'Hari wajib diisi!'
					]
				],
				'tgl' => [
					'rules'		=> 'required',
					'errors'	=> [
						'required'		=> 'Tgl. wajib diisi!'
					]
				],
			];

			if ( ! $this->validate($rules) )
			{
				return redirect()->back()->withInput();
			}

			$dataSesi = ['idEvent' => $idEvent, 'hari' => trim($this->request->getPost('hari')), 'tgl' => $this->request->getPost('tgl')];
			$this->SesiModel->save($dataSesi);
			return redirect()->back()->with('info', 'Data Sesi sudah diupdate!');
		}

		echo $html;
	}

	/**
	 * [data_registrasi description]
	 * @return [type] [description]
	 */
	public function dataRegistrasi()
	{
		$event = $this->EventModel->where('aktif', '1')->first();

		$this->data['title'] 		= 'Data Registrasi Peserta';
		$this->data['dataPeserta']	= $this->EventModel->dataRegistrasi([
										'event.idEvent'							=> $event->idEvent,
										'DATE_FORMAT(tglAbsensi, "%Y-%m-%d")'	=> date('Y-m-d')])->get()->getResult();

		if ( $this->request->getPost() )
		{
			$RegistrasiModel	= new \App\Models\RegistrasiModel();

			$kodeRegistrasi		= str_replace('E-Tiket : ', '', $this->request->getPost('kodeRegistrasi'));
			// $sesiKegiatan	= $this->SesiModel->where('tgl', date('Y-m-d'))->first();
			$peserta			= $this->PesertaModel->detailPeserta(['kodeRegistrasi' => trim($kodeRegistrasi)])->get()->getRow();
			$registrasi			= $peserta ? $RegistrasiModel->where(['idPeserta' => $peserta->idPeserta])->first() : null; // , 'idSesi' => $sesiKegiatan->idSesi

			// cek jika peserta terdaftar dan sudah divalidasi
			if ( $peserta )
			{
				// cek jika peserta sudah melakukan registrasi sesuai jenis tiket
				if ( $registrasi )
				{
					return redirect()->back()->with('info', ($peserta->jenisKelamin === 'l' ? 'Bapak' : 'Ibu').' '.$peserta->nama.', sudah melakukan registrasi sebelumnya!');
				}

				$RegistrasiModel->save([
					'idPeserta'		=> intval($peserta->idPeserta),
					'idEvent'		=> $event->idEvent,
					'tglAbsensi'	=> date('Y-m-d H:i:s'),
				]);

				return redirect()->back()->with('info', 'Terima kasih, '.($peserta->jenisKelamin === 'l' ? 'Bapak' : 'Ibu').' '.$peserta->nama.', Registrasi berhasil. Selamat bergabung dikegiatan ini!');
			}
			else
			{
				return redirect()->back()->with('info', 'Data Peserta tidak ditemukan. Silahkan melakukan konfirmasi ke Bagian Pendaftaran!');
			}
		}

		return view('admin/data_registrasi', $this->data);
	}

	/**
	 * Update registrasi scan qrcode
	 * @param string $noRegistrasi
	 * @return void
	 */
	public function registrasi()
	{}

	/**
	 * [data_peserta description]
	 * @return [type] [description]
	 */
	public function dataPeserta()
	{
		// $sesiKegiatan	= $this->SesiModel->where('DATE_FORMAT(createdAt, "%Y-%m-%d")', date('Y-m-d'))->first();
		$dataRegistrasi	= $this->PesertaModel->detailPeserta(['validasi' => '1'])->get()->getResult(); // , 'id_sesi' => $sesiKegiatan->id_sesi

		$html = '
			<div class="table-responsive">
				<table class="table table-striped table-sm registrasi_peserta datatable w-100" data-ordering="false" data-page-length="10">
					<thead>
						<tr>
							<th class="p-2">NO</th>
							<th class="p-2">NAMA</th>
							<th class="p-2">KELAMIN</th>
							<th class="p-2">BIDANG USAHA</th>
							<th class="p-2">NAMA USAHA</th>
							<th class="p-2">NO. TELP</th>
							<th class="p-2">QRCODE</th>
						</tr>
					</thead>
					<tbody>';

		if ( $dataRegistrasi )
		{
			$no = 1;
			foreach ( $dataRegistrasi as $peserta )
			{
				$html .= '<tr>
						<td class="p-2">'.$no++.'</td>
						<td class="p-2">
							<a href="javascript:void(0)" class="link data_peserta" data-bs-toggle="modal" data-bs-target="#modal-data-registrasi" data-url="/admin/event/info_registrasi/'.$peserta->idPeserta.'">'.$peserta->nama.'
							</a>
						</td>
						<td class="p-2">'.kelamin($peserta->jenisKelamin).'</td>
						<td class="p-2">'.$peserta->jenis_kegiatan.'</td>
						<td class="p-2">'.$peserta->no_telp.'</td>
						<td class="p-2 text-center" data-search="'.$peserta->no_registrasi.'">
							<img src="/img/admin/qrcode/'.$peserta->no_registrasi.'.png'.'" alt="" width="55">
						</td>
					</tr>';
			}
		}

		$html .=	'</tbody>
				</table>
			</div>';

		echo $html;
	}

	/**
	 * [kirimNotifikasi description]
	 * @param  int    $idPeserta [description]
	 * @return [type]            [description]
	 */
	public function kirimNotifikasi(int $idPeserta)
	{
		$peserta	= $this->PesertaModel->dataPeserta(['peserta.idPeserta' => $idPeserta])->getRow();
		$eventAktif	= $this->EventModel->where('aktif', '1')->first();

		$sapaan = ['l' => 'Bapak', 'p' => 'Ibu'];

		$dataPeserta['peserta'] = [
			'nama' 				=> $sapaan[$peserta->gender].' '.trim($peserta->nama),
			'nama_event'		=> $eventAktif->nama_event,
			'tgl_mulai_event'	=> $eventAktif->tgl_mulai,
			'tgl_event'			=> tanggal($eventAktif->tgl_mulai, true).' s/d '.tanggal($eventAktif->tgl_selesai, true),
			'lokasi' 			=> $eventAktif->lokasi,
			'tgl_registrasi'	=> $peserta->tgl_registrasi,
			'waktu' 			=> $eventAktif->waktu,
			'htm' 				=> angka($eventAktif->htm)
		];

		$notifikasi			= notifPembayaran($dataPeserta);
		$sendWAToRegistrant	= $this->WAapi->postMessageText($notifikasi, $peserta->no_telp);

		if ( $sendWAToRegistrant ) // = json_decode($sendWAToYani, true);
		{
			$sendWAToYani = $this->WAapi->postMessageText($notifikasi, '081341902177');
		}

		session()->setFlashdata('info', 'Pesan sudah terkirim!');

		return redirect()->to('/admin/event/followup');
	}

	/**
	 * Export Data Peserta Event
	 * @return mixed
	 */
	public function exportDataPeserta()
	{
		$reader 		= IOFactory::createReader('Xlsx');
		$spreadsheet	= $reader->load('template-data-peserta.xlsx');

		// Data nota penjualan member dan non member
		$dataPeserta = $this->PesertaModel->detailPeserta()->get()->getResult();

		// Set active Sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Set default font and font size
		$spreadsheet->getDefaultStyle()->getFont()->setName('Calibri');
		$spreadsheet->getDefaultStyle()->getFont()->setSize(11);

		// set auto height for all rows
		$spreadsheet->getActiveSheet()->getDefaultRowDimension()->setRowHeight(22, 'px');

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Celebes Solusi Digital Makassar')
											->setLastModifiedBy('Exclusively for Celebes Solusi Digital')
											->setTitle('Data Peserta Event')
											->setSubject('Registrasi Event Seminar HSN')
											->setDescription('Registrasi Event Seminar HSN')
											->setKeywords('Registrasi Event Seminar HSN')
											->setCategory('Registrasi Event Seminar HSN');

		$no = 1;
		$contentStart = 5;
		$currentContentRow = 5;

		foreach ( $dataPeserta as $peserta )
		{
			$spreadsheet->getActiveSheet()->insertNewRowBefore($currentContentRow + 1, 1);

			// Set cell format to NUMBER FORMAT
// 			$spreadsheet->getActiveSheet()->getStyle('F'.$currentContentRow)
// 							->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER);

			$spreadsheet->setActiveSheetIndex(0)
							->setCellValue('A' . $currentContentRow, $no)
							->setCellValue('B' . $currentContentRow, $peserta->nama)
							->setCellValue('C' . $currentContentRow, $peserta->noTelp)
							->setCellValue('D' . $currentContentRow, $peserta->asalInstansi)
							->setCellValue('E' . $currentContentRow, $peserta->jabatan)
							->setCellValue('F' . $currentContentRow, $peserta->tglRegistrasi);
							// ->setCellValue('D' . $currentContentRow, kelamin($peserta->jenisKelamin))
							// ->setCellValue('H' . $currentContentRow, $peserta->validasi);
							// ->setCellValue('F' . $currentContentRow, $peserta->namaUsaha)
							// ->setCellValue('G' . $currentContentRow, $peserta->kategoriUsaha)
							// ->setCellValue('H' . $currentContentRow, $peserta->omsetUsaha)
							// ->setCellValue('I' . $currentContentRow, $peserta->kodeRegistrasi)

			$no++;
			$currentContentRow++;
		}

		// remove last row
		$spreadsheet->getActiveSheet()->removeRow($currentContentRow, 1);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Daftar-Peserta-Event.xlsx"');
		header('Cache-Control: max-age=0');
		// If serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	/**
	 * Export data to csv format
	 * @return mixed
	 */
	public function exportCSV()
	{
		$sapaan = ['l' => 'Bapak', 'p' => 'Ibu'];
		$spreadsheet	= new Spreadsheet();
		$fileName		= 'dataPeserta.csv';
		// Set active Sheet
		$sheet 			= $spreadsheet->getActiveSheet();

		// Data peserta yang belum divalidasi
		$dataPeserta	= $this->PesertaModel->dataPeserta(['validasi' => null])->getResult();

		// Set default font and font size
		$spreadsheet->getDefaultStyle()->getFont()->setName('Calibri');
		$spreadsheet->getDefaultStyle()->getFont()->setSize(11);

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Celebes Solusi Digital Makassar')
											->setLastModifiedBy('Exclusively for SBC')
											->setTitle('Data Peserta Event')
											->setSubject('Gebyar Wira Usaha 9th The Power Of Synergi')
											->setDescription('Daftar Peserta Event SBC')
											->setKeywords('Gebyar Wira Usaha 9th The Power Of Synergi')
											->setCategory('Gebyar Wira Usaha 9th The Power Of Synergi');

		$sheet->setCellValue('A1', 'Name');
		$sheet->setCellValue('B1', 'Number');

		$no = 2;

		foreach ( $dataPeserta as $peserta )
		{
			// Set vertical top for wrapping cell
			$spreadsheet->getActiveSheet()->getStyle('B'.$no)
							->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER);

			$spreadsheet->setActiveSheetIndex(0)
							->setCellValue('A' . $no, $sapaan[$peserta->gender].' '.$peserta->nama)
							->setCellValue('B' . $no, $peserta->no_telp);

			$no++;
		}

		// Redirect output to a client’s web browser (Xlsx)
		$this->response->setHeader('Content-Type', 'application/csv');
		$this->response->setHeader('Content-Type', 'text/plain');
		$this->response->setHeader('Content-Disposition', 'attachment;filename="'.$fileName.'"');
		$this->response->setHeader('Cache-Control', 'max-age=0');
		// If serving to IE 9, then the following may be needed
		$this->response->setHeader('Cache-Control', 'max-age=1');

		$writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);
		$writer->setDelimiter(',');
		$writer->setEnclosure('');
		$writer->setLineEnding("\r\n");
		$writer->setSheetIndex(0);
		ob_end_clean();
		$writer->save(FCPATH . $fileName);
		return $this->response->download(FCPATH . $fileName, null)->setFilename($fileName);
	}

	/**
	 * Update status event aktif / non aktif
	 * @param Int $idEvent
	 * @param String $status
	 * @return mixed
	 */
	public function updateStatus(Int $idEvent, String $status)
	{
		$statusEvent = ['nonAktif' => '0', 'aktif' => '1'];
		$this->EventModel->save(['id_event' => $idEvent, 'aktif' => $statusEvent[$status]]);
		session()->setFlashdata('info', "Status Event sudah diupdate!");
		return redirect()->back();
	}
}