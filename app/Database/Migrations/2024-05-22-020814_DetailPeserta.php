<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class DetailPeserta extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'idPeserta' => [
				'type'				=> 'INT',
				'constraint'		=> 11,
				'unsigned'			=> true,
			],
			'bidangUsaha' => [
				'type'				=> 'ENUM',
				'constraint'		=> ['jasa_laundry', 'peralatan_laundry', 'f_b', 'lainnya'],
				'default'			=> 'jasa_laundry'
			],
			'bidangLainnya' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 100,
			],
			'namaUsaha' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 100,
			],
			'thnBerdiriUsaha' => [
				'type'				=> 'YEAR',
				'constraint'		=> 4,
			],
			'jenisTiket' => [
				'type'				=> 'ENUM',
				'constraint'		=> ['expo', 'expo_seminar'],
				'default'			=> 'expo'
			],
			'waktuKehadiran' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 100,
				'null'				=> true
			],
			'asosiasiMember' => [
				'type'				=> 'ENUM',
				'constraint'		=> ['UMUM', 'ASLI', 'IKI', 'HIPLI', 'APLI'],
				'default'			=> 'UMUM'
			],
			'tipeHtm' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 50,
			],
			'htm' => [
				'type'				=> 'FLOAT',
				'default'			=> 0,
			],
			'validasi' => [
				'type'				=> 'ENUM',
				'constraint'		=> ['0', '1'],
				// 'default'			=> '1'
			],
			'tglValidasi' => [
				'type'				=> 'DATETIME',
				'null'				=> true
			],
			'kodeRegistrasi' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 8,
				'null'				=> true
			],
			'foto' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 50,
				'null'				=> true
			],
			'kodeVoucher' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 10,
				'default'			=> ''
			],
			'statusTransaksi' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 10,
				'null'				=> true
			],
		]);

		$this->forge->addPrimaryKey('idPeserta');
		$this->forge->createTable('detail_peserta', true, ['Engine' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('detail_peserta', true);
    }
}