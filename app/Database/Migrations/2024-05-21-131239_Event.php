<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Event extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'idEvent' => [
				'type'				=> 'TINYINT',
				'constraint'		=> 3,
				'unsigned'			=> true,
				'auto_increment'	=> true,
			],
			'namaEvent' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 100,
			],
			'penyelenggara' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 100,
			],
			'tglMulai' => [
				'type'				=> 'DATE',
			],
			'hariMulai' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 50,
			],
			'jamMulai' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 5,
			],
			'tglSelesai' => [
				'type'				=> 'DATE',
			],
			'hariSelesai' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 50,
			],
			'jamSelesai' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 5,
			],
			'lokasi' => [
				'type'				=> 'TINYTEXT'
			],
			'alamat' => [
				'type'				=> 'TINYTEXT'
			],
			'aktif' => [
				'type'				=> 'ENUM',
				'constraint'		=> ['0', '1'],
				'default'			=> '1'
			],
			'catatan' => [
				'type'				=> 'TINYTEXT',
				'null'				=> true,
			],
		]);

		$this->forge->addPrimaryKey('idEvent');
		$this->forge->createTable('event', true, ['Engine' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('event', true);
    }
}
