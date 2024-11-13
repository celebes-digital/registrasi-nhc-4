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
				'type'				=> 'VARCHAR',
				'constraint'		=> 100,
			],
			'jenisKelamin' => [
				'type'				=> 'ENUM',
				'constraint'		=> ['l', 'p'],
				'default'			=> 'l'
			],
			'noTelp' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 16,
			],
			// 'asalInstansi' => [
			// 	'type'				=> 'VARCHAR',
			// 	'constraint'		=> 255,
			// ],
			// 'jabatan' => [
			// 	'type'				=> 'VARCHAR',
			// 	'constraint'		=> 255,
			// ],
			'email' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 16,
			],
			'propinsi' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 100,
			],
			'kabupaten' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 100,
			],
			'tglRegistrasi' => [
				'type'				=> 'DATETIME'
			]
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