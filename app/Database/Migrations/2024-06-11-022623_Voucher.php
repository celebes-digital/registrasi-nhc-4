<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Voucher extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idVoucher' => [
				'type'				=> 'SMALLINT',
				'constraint'		=> 5,
				'unsigned'			=> true,
				'auto_increment'	=> true,
			],
			'kodeVoucher' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 10,
			],
			'potongan' => [
				'type'				=> 'DECIMAL',
				'constraint'		=> '4,2',
			],
			'terpakai' => [
				'type'				=> 'ENUM',
				'constraint'		=> ['0', '1'],
				'default'			=> '0'
			],
		]);

		$this->forge->addPrimaryKey('idVoucher');
		$this->forge->createTable('voucher', true, ['Engine' => 'InnoDB']);
	}

	public function down()
	{
		$this->forge->dropTable('voucher', true);
	}
}
