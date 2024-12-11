<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Peserta extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'idPeserta' => [
				'type'				=> 'INT',
				'constraint'		=> 11,
				'unsigned'			=> true,
				'auto_increment'	=> true,
			],
			'idEvent' => [
				'type'				=> 'TINYINT',
				'constraint'		=> 3,
				'unsigned'			=> true
			],
			'idDpd' => [
				'type'				=> 'SMALLINT',
				'constraint'		=> 5,
				'default'			=> 0,
				'unsigned'			=> true
			],
			'orderId' => [
				'type'				=> 'INT',
				'constraint'		=> 10,
				'null'				=> true
			],
			'nama' => [
				'type'       => 'VARCHAR',
				'constraint' => 100,
			],
			'jenisKelamin' => [
				'type'       => 'ENUM',
				'constraint' => ['l', 'p'],
				'default'    => 'l',
			],
			'noTelp' => [
				'type'       => 'VARCHAR',
				'constraint' => 16,
			],
			'alamat' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
			],
			'pendidikan' => [
				'type'       => 'VARCHAR',
				'constraint' => 100,
			],
			'sekolah' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
			],
			'kelas_sekolah' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
			],
			'informasi' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
			],
			'tgl_lahir' => [
				'type' => 'DATE',
			],
			'foto' => [
				'type'       => 'VARCHAR',
				'constraint' => 255,
			],
			'kelas' => [
				'type'       => 'ENUM',
				'constraint' => ['junior', 'senior', 'beginner'],
			],
			'tglRegistrasi' => [
				'type' => 'DATETIME',
			],
		]);

		$this->forge->addPrimaryKey('idPeserta');
		$this->forge->addKey(['idEvent', 'idDpd']);
		$this->forge->createTable('peserta', true, ['Engine' => 'InnoDB']);
	}

	public function down()
	{
		$this->forge->dropTable('peserta', true);
	}
}