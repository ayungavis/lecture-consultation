<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Periode extends Migration
{
	protected $tableName = 'periode';

	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'tahun_awal' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'tahun_akhir' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => true
			],
			'updated_at' => [
				'type' => 'TIMESTAMP',
				'null' => true
			],
			'deleted_at' => [
				'type' => 'TIMESTAMP',
				'null' => true
			]
		]);
		
		$this->forge->addKey('id', true, true);		
		$this->forge->createTable($this->tableName, true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->dropTable($this->tableName);
	}
}
