<?php

namespace App\Models;
use CodeIgniter\Model;

class EventModel extends Model
{
	protected $table                = 'event';
	protected $primaryKey           = 'idEvent';
	protected $useAutoIncrement     = true;
	protected $returnType           = 'object';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['namaEvent', 'aktif', 'lokasi', 'tglMulai', 'tglSelesai', 'hariMulai', 'hariSelesai',
										'jamMulai', 'jamSelesai', 'alamat', 'catatan', 'penyelenggara'];

	protected bool $allowEmptyInserts	= false;
	protected bool $updateOnlyChanged	= true;
	protected array $casts 				= [];
	protected array $castHandlers		= [];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function newEvent()
	{
		$row = (object) [
			'namaEvent'		=> '',
			'penyelenggara'	=> '',
			'lokasi'		=> '',
			'alamat'		=> '',
			'tglMulai'		=> '',
			'hariMulai'		=> '',
			'jamMulai'		=> '',
			'tglSelesai'	=> '',
			'hariSelesai'	=> '',
			'jamSelesai'	=> '',
			'aktif'			=> '',
			'catatan'		=> '',
		];

		return $row;
	}

	/**
	 * Detail Data Event
	 * @param Array|null $where
	 * @return void
	 */
	public function detailEvent(Array $where = null)
	{
		! $where || $this->builder()->where($where);

		return $this->builder()
					->select('event.idEvent, namaEvent, Sesi.Jumlah as TotalSesi, tglMulai, tglSelesai, hariMulai, hariSelesai, jamMulai, jamSelesai, lokasi, aktif')
					->join('(SELECT idEvent, COUNT(idSesi) as Jumlah FROM sesi GROUP BY idEvent) as Sesi', 'event.idEvent = sesi.idEvent', 'left');
	}

	public function dataRegistrasi(?Array $where = null)
	{
		! $where || $this->builder()->where($where);

		return $this->builder()
					->select('peserta.tglRegistrasi, nama, jenisKelamin, sekolah,kelas_sekolah,peserta.alamat,informasi,kelas, noTelp, tglAbsensi, kodeRegistrasi')
					// ->join('sesi', 'event.idEvent = sesi.idEvent', 'left')
					// ->join('registrasi', 'sesi.idSesi = registrasi.idSesi', 'left')
					->join('registrasi', 'event.idEvent = registrasi.idEvent', 'left')
					->join('peserta', 'registrasi.idPeserta = peserta.idPeserta', 'left')
					->join('detail_peserta', 'peserta.idPeserta = detail_peserta.idPeserta', 'left');
	}

	protected function update_event_aktif(array $data)
	{
		$builder = new EventModel();
		$event = $builder->where('aktif', '1')->findAll();

		if ( $event )
		{
			$builder->set('aktif', '0')->where('aktif', '1')->update();
		}

		return $data;
	}
}
