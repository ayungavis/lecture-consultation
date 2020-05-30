<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Fakultas extends Migration
{
	protected $tableName = 'fakultas';

	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'singkatan' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => true
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
		$this->forge->addUniqueKey('singkatan');
		$this->forge->createTable($this->tableName, true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->dropTable($this->tableName);
	}
}
