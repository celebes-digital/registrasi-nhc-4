<?php

namespace App\Models;
use CodeIgniter\Model;

class PesertaModel extends Model
{
	protected $table					= 'peserta';
	protected $primaryKey				= 'idPeserta';
	protected $useAutoIncrement			= true;
	protected $returnType				= 'object';
	protected $useSoftDelete			= false;
	protected $protectFields			= true;
	protected $allowedFields = [
		'idEvent',
		'idDpd',
		'orderId',
		'nama',
		'jenisKelamin',
		'noTelp',
		'alamat',
		'pendidikan',
		'tgl_lahir',
		'foto',
		'tglRegistrasi',
	];

	protected bool $allowEmptyInserts	= false;
	protected bool $updateOnlyChanged	= true;
	protected array $casts 				= [];
	protected array $castHandlers		= [];

	// Dates
	protected $useTimestamps			= false;
	protected $dateFormat				= 'datetime';
	protected $createdField				= 'createdAt';
	protected $updatedField				= 'updatedAt';
	protected $deletedField				= 'deleted_at';

	// Validation
	protected $validationRules			= [];
	protected $validationMessages		= [];
	protected $skipValidation			= false;
	protected $cleanValidationRules		= true;

	// Callbacks
	protected $allowCallbacks			= true;
	protected $beforeInsert				= [];
	protected $afterInsert				= [];
	protected $beforeUpdate				= [];
	protected $afterUpdate				= [];
	protected $beforeFind				= [];
	protected $afterFind				= [];
	protected $beforeDelete				= ['delete_registrasi_peserta'];
	protected $afterDelete				= [];

	public function statistikKomunitas(?Array $where = null)
	{
		! $where || $this->builder()->where($where);

		return $this->builder()
					->select('komunitas,COUNT(idPeserta) as Jumlah')
					->groupBy('idPeserta');
	}

	/**
	 * Detail Data untuk peserta keseluruhan
	 * @param Array|null $where
	 * @return void
	 */
	public function pesertaKomunitas(Array $where = null)
	{
		! $where || $this->builder()->where($where);

		return $this->builder()
					->select('peserta.idPeserta, nama, jenisKelamin, namaUsaha,
							tglRegistrasi, kodeRegistrasi, noTelp, email, tglValidasi, validasi, foto')
					->join('detail_peserta', 'peserta.idPeserta = detail_peserta.idPeserta', 'left');
	}

	/**
	 * Detail Data untuk peserta keseluruhan
	 * @param Array|null $where
	 * @return void
	 */
	public function detailPeserta(Array $where = null)
	{
		! $where || $this->builder()->where($where);

		return $this->builder()
					->select('peserta.idPeserta, nama, jenisKelamin, namaUsaha,
							tglRegistrasi, kodeRegistrasi, noTelp, tglValidasi, validasi, peserta.foto,')
					->join('detail_peserta', 'peserta.idPeserta = detail_peserta.idPeserta', 'left');
	}

	/**
	 * Hapus data peserta kegiatan
	 * @param array $data
	 * @return void
	 */
	public function delete_registrasi_peserta(array $data)
	{
		$registrasiModel = new RegistrasiModel();
		$registrasiModel->delete(['idPeserta' => $data['id']['idPeserta']]);
		return $data;
	}

	/**
	 * Cek Data Peserta for welcome display
	 * @param array|null $where
	 * @return object
	 */
	public function cekDataPeserta(array $where = null)
	{
		! $where || $this->builder()->where($where);

		return $this->builder()
					->select('nama, jenisKelamin, validasi, kodeRegistrasi, createdAt as tglRegistrasi')
					->join('detail_peserta', 'peserta.idPeserta = detail_peserta.idPeserta', 'left')
					// ->join('registrasi as reg', 'peserta.idPeserta = reg.idPeserta', 'left')
					// ->join('event as e', 'peserta.idEvent = e.idEvent', 'left')
					->orderBy('createdAt', 'DESC');
	}
}
