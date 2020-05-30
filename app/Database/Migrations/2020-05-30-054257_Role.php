<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Role extends Migration
{
	protected $tableName = 'roles';

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
			'code' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => true
			],
			'level' => [
				'type' => 'INT'
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => true
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true
			],
			'deleted_at' => [
				'type' => 'DATETIME',
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
