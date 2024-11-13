<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\IOFactory;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Data extends BaseController
{
	public function chapter(int $idChapter = null)
	{
		$chapterModel = new \App\Models\ChapterModel();

		$this->data['title']				= 'Update Data Chapter';
		$this->data['validation']		= \Config\Services::validation();
		$this->data['daftarChapter']	= $chapterModel->orderBy('chapter', 'ASC')->findAll();
		$this->data['chapter']			= $idChapter ? $chapterModel->find($idChapter) : $chapterModel->newChapter();

		$rules = [
			'chapter' => [
				'rules'				=> "trim|required|is_unique[chapter.chapter,id_chapter,{$idChapter}]",
				'errors'				=> [
					'required'				=> 'Nama Chapter wajib diisi!',
					'is_unique'				=> 'Nama Chapter sudah terdaftar! Coba isi dengan nama lain'
				]
			],
		];

		if ( $this->request->getPost() )
		{
			if ( ! $this->validate($rules) )
			{
				return redirect()->back()->withInput();
			}
			else
			{
				$dataChapter = [
					'chapter'	=> strtoupper($this->request->getPost('chapter')),
				];

				!$idChapter || $dataChapter['id_chapter'] = $idChapter;

				$chapterModel->save($dataChapter);
				session()->setFlashdata('info', 'Data Chapter sudah diupdate');
				return redirect()->to('/admin/data/chapter');
			}
		}

		return view('admin/data/chapter', $this->data);
	}

	public function kelas_sbc(int $idKelas = null)
	{
		$kelasSbcModel = new \App\Models\KelasSbcModel();

		$this->data['title']			= 'Update Data Kelas SBC';
		$this->data['validation']	= \Config\Services::validation();
		$this->data['daftarKelas']	= $kelasSbcModel->orderBy('nama_kelas', 'ASC')->findAll();
		$this->data['kelas']			= $idKelas ? $kelasSbcModel->find($idKelas) : $kelasSbcModel->newKelas();

		$rules = [
			'kelas' => [
				'rules'		=> "trim|required|is_unique[kelas_sbc.nama_kelas,id_kelas,{$idKelas}]",
				'errors'	=> [
					'required'	=> 'Nama Kelas wajib diisi!',
					'is_unique'	=> 'Nama Kelas sudah terdaftar! Coba isi dengan nama lain'
				]
			],
		];

		if ( $this->request->getPost() )
		{
			if ( ! $this->validate($rules) )
			{
				return redirect()->back()->withInput();
			}
			else
			{
				$dataKelas = ['nama_kelas' => strtoupper($this->request->getPost('kelas'))];

				!$idKelas || $dataKelas['id_kelas'] = $idKelas;

				$kelasSbcModel->save($dataKelas);
				session()->setFlashdata('info', 'Data Kelas sudah diupdate');
				return redirect()->to('/admin/data/kelas_sbc');
			}
		}

		return view('admin/data/kelas_sbc', $this->data);
	}

	public function peserta()
	{
		$pesertaModel	= new \App\Models\PesertaModel();
		$dataPeserta	= $pesertaModel->dataPeserta(['validasi' => null])->getResult();

		$this->data['title'] 		= 'Data Peserta yang akan difollowup';
		$this->data['sapaan']		= ['l' => 'Bapak', 'p' => 'Ibu'];
		$this->data['dataPeserta']	= $dataPeserta;

		return view('admin/data/peserta', $this->data);
	}

	public function absensi(Int $idSesi = null)
	{
		// $sesiModel 		= new \App\Models\SesiKegiatanModel();
		$pesertaModel	= new \App\Models\PesertaModel();
		$dataAbsensi	= $idSesi ?
								$pesertaModel->dataAbsensiPeserta(['reg.id_sesi' => $idSesi])->getResult() :
									$pesertaModel->dataAbsensiPeserta()->getResult();

		$this->data['title']			= 'Data Absensi Peserta';
		$this->data['dataAbsensi']	= $dataAbsensi;
		// $this->data['daftarSesi']	= $sesiModel->findAll();

		return view('admin/data/absensi', $this->data);
	}

		/**
	 * Export Data Peserta Event
	 * @return mixed
	 */
	public function exportDataAbsensi(Int $idSesi = null)
	{
		// $sesiModel 		= new \App\Models\SesiKegiatanModel();
		$pesertaModel	= new \App\Models\PesertaModel();

		$reader 			= IOFactory::createReader('Xlsx');
		$spreadsheet	= $reader->load('template-absensi-peserta.xlsx');

		// Data nota penjualan member dan non member
		$dataAbsensi	= $idSesi ?
								$pesertaModel->dataAbsensiPeserta(['reg.id_sesi' => $idSesi])->getResult() :
									$pesertaModel->dataAbsensiPeserta()->getResult();

		// Set active Sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Set default font and font size
		$spreadsheet->getDefaultStyle()->getFont()->setName('Calibri');
		$spreadsheet->getDefaultStyle()->getFont()->setSize(11);

		// set auto height for all rows
		$spreadsheet->getActiveSheet()->getDefaultRowDimension()->setRowHeight(22, 'px');

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Celebes Solusi Digital Makassar')
											->setLastModifiedBy('Exclusively for SBC')
											->setTitle('Data Peserta Event')
											->setSubject('Gebyar Wira Usaha 9th The Power Of Synergi')
											->setDescription('Daftar Peserta Event SBC')
											->setKeywords('Gebyar Wira Usaha 9th The Power Of Synergi')
											->setCategory('Gebyar Wira Usaha 9th The Power Of Synergi');

		$no = 1;
		$contentStart = 5;
		$currentContentRow = 5;

		foreach ( $dataAbsensi as $absen )
		{
			$spreadsheet->getActiveSheet()->insertNewRowBefore($currentContentRow + 1, 1);

			// Set cell format to NUMBER FORMAT
			$spreadsheet->getActiveSheet()->getStyle('L'.$currentContentRow)
							->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER);

			$spreadsheet->setActiveSheetIndex(0)
							->setCellValue('B' . $currentContentRow, $no)
							->setCellValue('C' . $currentContentRow, $absen->tgl_absen)
							->setCellValue('D' . $currentContentRow, 'Sesi ' . $absen->sesi)
							->setCellValue('E' . $currentContentRow, $absen->nama)
							->setCellValue('F' . $currentContentRow, gender($absen->gender))
							->setCellValue('G' . $currentContentRow, $absen->chapter)
							->setCellValue('H' . $currentContentRow, $absen->nama_usaha)
							->setCellValue('I' . $currentContentRow, $absen->kategori_usaha)
							->setCellValue('J' . $currentContentRow, $absen->kelas_sbc)
							->setCellValue('K' . $currentContentRow, $absen->rekomendasi)
							->setCellValue('L' . $currentContentRow, $absen->no_telp);

			$no++;
			$currentContentRow++;
		}

		// remove last row
		$spreadsheet->getActiveSheet()->removeRow($currentContentRow, 1);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Daftar-Absensi-Peserta-Event-Gebyar-Wira-Usaha-9th-SBC.xlsx"');
		header('Cache-Control: max-age=0');
		// If serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function pesertaByKategoriUsaha(String $kategoriUsaha)
	{
		$pesertaModel	= new \App\Models\PesertaModel();
		$kategori 		= strtoupper(str_replace('-', ' ', $kategoriUsaha));

		$listPeserta = $pesertaModel->where('kategori_usaha', $kategori)->orLike('kategori_usaha', $kategori)->findAll();

		$html = '
			<div class="modal-header">
				<h4 class="modal-title">Data Peserta</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>

			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-striped table-sm registrasi_peserta datatable w-100" data-ordering="false" data-page-length="10">
						<thead>
							<tr>
								<th class="p-2">NO</th>
								<th class="p-2">NAMA</th>
								<th class="p-2">KELAMIN</th>
								<th class="p-2">KEGIATAN</th>
								<th class="p-2">NO. TELP</th>
							</tr>
						</thead>
						<tbody>';

		if ( $listPeserta )
		{
			$no = 1;
			foreach ( $listPeserta as $peserta ) {
				$html .= '
					<tr>
						<td class="p-2">'.'erm what the sigma?'. $no .'</td>
						<td class="p-2">
							<a href="#" class="link data_peserta" data-bs-toggle="modal" data-bs-target="#modal-data-registrasi" data-url="/admin/event/info_registrasi/'.$peserta->id_peserta.'">'.$peserta->nama.'
							</a>
						</td>
						<td class="p-2">'.gender($peserta->gender).'</td>
						<td class="p-2">'.$peserta->jenis_kegiatan.'</td>
						<td class="p-2">'.$peserta->no_telp.'</td>
					</tr>';
			}
		}

		$html .=	'</tbody>
					</table>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect text-dark" data-bs-dismiss="modal">Close</button>
			</div>';

		echo $html;
	}
}
