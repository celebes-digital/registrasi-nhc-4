<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Registrasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'idRegistrasi' => [
				'type'				=> 'INT',
				'constraint'		=> 11,
				'unsigned'			=> true,
				'auto_increment'	=> true,
			],
			'idPeserta' => [
				'type'				=> 'INT',
				'constraint'		=> 11,
				'unsigned'			=> true
			],
			'idEvent' => [
				'type'				=> 'TINYINT',
				'constraint'		=> 3,
				'unsigned'			=> true
			],
			// 'idSesi' => [
			// 	'type'				=> 'TINYINT',
			// 	'constraint'		=> 3,
			// 	'unsigned'			=> true
			// ],
			'tglAbsensi' => [
				'type'				=> 'DATETIME',
				'null'				=> true,
			],
			'tipe' => [
				'type'				=> 'ENUM',
				'constraint'		=> ['expo', 'expo_seminar'],
				'default'			=> 'expo'
			],
		]);

		$this->forge->addPrimaryKey('idRegistrasi');
		$this->forge->createTable('registrasi', true, ['Engine' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('registrasi', true);
    }
}
