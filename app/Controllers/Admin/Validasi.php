<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\KirimWA;

class Validasi extends BaseController
{
	protected $WAapi;
	protected $QRCode;

	public function __construct()
	{
		$this->WAapi	= new KirimWA();
		$this->QRCode	= new \App\Libraries\GenerateQrCode();
	}

	public function index()
	{
		#your code here...
	}

	/**
	 * [peserta description]
	 * @param  int    $idPeserta [description]
	 * @return [type]            [description]
	 */
	public function peserta(int $idPeserta = null)
	{
		$peserta	= $this->PesertaModel->detailPeserta(['peserta.idPeserta' => $idPeserta])->get()->getRow();
		$code		= generateCode();
		$this->QRCode::generate($code);

		if ( $this->request->getPost('validasi') !== '' )
		{
			$dataEvent['event'] = [
				'nama_peserta'	=> '' . trim($peserta->nama),
			];

			$this->DetailPesertaModel->save(['idPeserta' => $idPeserta, 'validasi' => '1', 'kodeRegistrasi' => $code]);

			$notifikasi = notifValidasi($dataEvent);
			$imgUrl		= base_url('img/admin/qrcode/'.$code.'.png');
			$sendWA		= $this->WAapi->postMsgImg($notifikasi, $peserta->noTelp, $imgUrl);
			return redirect()->to('/admin/peserta/followup')->with('info',	'Peserta sudah divalidasi!');
		}
	}

	/**
	 * [data_peserta description]
	 * @param  int    $idPeserta [description]
	 * @return [type]            [description]
	 */
	public function dataPeserta(int $idPeserta)
	{
		// if ( $this->request->isAJAX() )
		// {
			$peserta	= $this->PesertaModel->detailPeserta(['peserta.idPeserta' => $idPeserta])->get()->getRow();
			$form		= $peserta->validasi ? '#' : '/admin/validasi/peserta/'.$idPeserta;
			$QrCode		= $peserta->validasi ? '<img src="/img/admin/qrcode/'.$peserta->kodeRegistrasi.'.png" class="img-fluid img-thumbnail" width="200">' : null;

			$html = '
				<div class="modal-header">
					<h4 class="modal-title" id="vcenter">Detail Data Peserta</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
				</div>'.

				form_open($form, 'role="form"').
					'<div class="modal-body">
						<div class="row justify-content-center">
							<div class="col-md-9">
								<div class="row mb-1">
									<label class="col-sm-3 col-form-label">Tgl. Registrasi</label>
									<div class="col-sm-9">
										<input type="text" name="tglRegistrasi" value="'.date('j F, Y', strtotime($peserta->tglRegistrasi)).'" class="form-control-plaintext" disabled>
									</div>
								</div>

								<div class="row mb-1">
									<label class="col-sm-3 col-form-label">Nama</label>
									<div class="col-sm-9">
										<input type="text" name="nama" value="'.trim($peserta->nama).'" class="form-control-plaintext" disabled>
									</div>
								</div>

								<div class="row mb-1">
									<label class="col-sm-3 col-form-label">Kelamin</label>
									<div class="col-sm-9">
										<input type="text" name="gender" value="'.kelamin($peserta->jenisKelamin).'" class="form-control-plaintext" disabled>
									</div>
								</div>

								<div class="row mb-1">
									<label class="col-sm-3 col-form-label">Nama Usaha</label>
									<div class="col-sm-9">
										<input type="text" name="namaUsaha" value="'.strtoupper($peserta->namaUsaha).'" class="form-control-plaintext" disabled>
									</div>
								</div>

								<div class="row mb-1">
									<label class="col-sm-3 col-form-label">No. Telp (WA)</label>
									<div class="col-sm-9">
										<input type="text" name="no_telp" value="'.$peserta->noTelp.'" class="form-control-plaintext" disabled>
									</div>
								</div>

								<div class="row mb-2">
									<label class="col-sm-3 col-form-label">Sudah Bayar ?</label>
									<div class="col-sm-9">
										<label for="validasi" class="col-form-label">
											<span class="me-2">Belum</span>'.
											form_checkbox('validasi', '1', presetCheckbox('validasi', '1', $peserta->validasi), 'class="js-switch" id="validasi" data-size="small" data-color="#1fb920" '.( ! $peserta->validasi ?: 'disabled')).'
											<span class="ms-2">Sudah</span>
										</label>
									</div>
								</div>

								<div class="row">
									<label class="col-sm-3 col-form-label">Dokumen</label>
									<div class="col-sm-9">
										<img src="/img/admin/dokumen/'.$peserta->foto.'" class="img-fluid img-thumbnail" />
									</div>
								</div>
							</div>

							<div class="col-md-3 text-center">
								<div>E-Tiket :</div>'.
									$QrCode
									.'<h5 class="text-center mt-2">Kode Registrasi : <span class="fw-bold">'.$peserta->kodeRegistrasi.'</span></h5>
								</div>
							</div>
						</div>
					</div>

					<div class="modal-footer justify-content-center">'.
						csrf_field();

						if ( $peserta->validasi !== '1' )
						{
							$html .= '<button type="submit" class="btn btn-info btn-lg waves-effect text-white me-3">Submit</button>';
						}

						$html .= '<button type="button" class="btn btn-secondary waves-effect text-dark btn-lg" data-bs-dismiss="modal">Close</button>
					</div>'.
				form_close();

			echo $html;
		// }
	}

	/**
	 * Undocumented function
	 * @param integer|null $idPeserta
	 * @return void
	 */
	public function kirimEtiket(int $idPeserta = null)
	{
		$peserta = $this->PesertaModel->detailPeserta(['peserta.idPeserta' => $idPeserta])->get()->getRow();

		$dataEvent['event'] = [
			'nama_peserta'	=> '' . trim($peserta->nama),
		];

		$notifikasi = notifValidasi($dataEvent);
		$imgUrl		= base_url('img/admin/qrcode/'.$peserta->kodeRegistrasi.'.png');
		// dd($imgUrl);
		$sendWA		= $this->WAapi->postMsgImg($notifikasi, $peserta->noTelp, $imgUrl);

		return redirect()->back()->with('info',	'Pesan sudah terkirim!');
	}

	/**
	 * Display Welcome Screen
	 * @return void
	 */
	public function cekDataPeserta()
	{
		$absenModel		= new \App\Models\PesertaModel();
		$dataPeserta	= $absenModel->cekDataPeserta(['registrasi' => '1', 'tgl_absen <>' => null])->getResult();

		if ( $dataPeserta )
		{
			foreach ( $dataPeserta as $peserta )
			{
				if ( hitungSelisihWaktu($peserta->tgl_absen, date('Y-m-d H:i:s'), 'detik') < 15 )
				{
					echo '<h2 class="text-white namaPeserta fw-light">'.$peserta->nama.'</h2>'."\r\n";
				}
			}

			// echo json_encode($listNama);
		}
	}
}