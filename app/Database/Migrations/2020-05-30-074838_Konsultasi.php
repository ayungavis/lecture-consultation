<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Konsultasi extends Migration
{
	protected $tableName = 'konsultasi';

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
			'dosen_id' => [
				'type' => 'INT',
				'unsigned' => true,
				'comment' => 'Ambil dari tabel users role dosen'
			],
			'qr_code' => [
				'type' => 'TEXT',
				'unique' => true,
				'null' => true
			],
			'file_id' => [
				'type' => 'INT',
				'unsigned' => true
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
		$this->forge->addForeignKey('periode_id', 'periode', 'id');
		$this->forge->addForeignKey('user_id', 'users', 'id');
		$this->forge->addForeignKey('dosen_id', 'users', 'id');
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