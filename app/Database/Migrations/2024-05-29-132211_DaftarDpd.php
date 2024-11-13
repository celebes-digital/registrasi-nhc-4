<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class DaftarDpd extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'idDpd' => [
				'type'				=> 'SMALLINT',
				'constraint'		=> 5,
				'unsigned'			=> true,
				'auto_increment'	=> true,
			],
			'namaDpd' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 100,
			],
			'slugDpd' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 100,
			],
			'koordinator' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 100,
				'null'				=> true
			],
		]);

		$this->forge->addPrimaryKey('idDpd');
		$this->forge->createTable('daftar_dpd', true, ['Engine' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('daftar_dpd', true);
    }
}
