<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class File extends Migration
{
	protected $tableName = 'file';

	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'name' => [
				'type' => 'VARCHAR'
			],
			'size' => [
				'type' => 'VARCHAR',
			],
			'type' => [
				'type' => 'VARCHAR',
			],
			'user_id' => [
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
		$this->forge->addUniqueKey('name');
		$this->forge->addForeignKey('user_id', 'users', 'id');
		$this->forge->createTable($this->tableName, true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->dropTable($this->tableName);
	}
}
