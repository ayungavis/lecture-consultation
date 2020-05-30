<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KHS extends Migration
{
	protected $tableName = 'khs';

	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'periode_id' => [
				'type' => 'INT',
				'unsigned' => true
			],
			'user_id' => [
				'type' => 'INT',
				'unsigned' => true
			],
			'semester' => [
				'type' => 'ENUM',
				'constraint' => ['ganjil', 'genap']
			],
			'file_id' => [
				'type' => 'INT',
				'unsigned' => true
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
		$this->forge->addForeignKey('periode_id', 'periode', 'id');
		$this->forge->addForeignKey('user_id', 'users', 'id');
		$this->forge->addForeignKey('file_id', 'file', 'id');
		$this->forge->createTable($this->tableName, true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->dropTable($this->tableName);
	}
}
