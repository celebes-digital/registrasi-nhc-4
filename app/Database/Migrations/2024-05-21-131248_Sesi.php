<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Sesi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idSesi' => [
				'type'				=> 'TINYINT',
				'constraint'		=> 3,
				'unsigned'			=> true,
				'auto_increment'	=> true,
			],
			'idEvent' => [
				'type'				=> 'TINYINT',
				'constraint'		=> 3,
				'unsigned'			=> true
			],
			'tgl' => [
				'type'				=> 'DATE'
			],
			'hari' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> '20'
			],
		]);

		$this->forge->addPrimaryKey('idSesi');
		$this->forge->createTable('sesi', true, ['Engine' => 'InnoDB']);
	}

	public function down()
	{
		$this->forge->dropTable('sesi', true);
	}
}