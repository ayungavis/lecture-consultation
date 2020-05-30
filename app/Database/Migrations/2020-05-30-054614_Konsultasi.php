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
		$this->forge->addUniqueKey('qr_code');
		$this->forge->addForeignKey('periode_id', 'periode', 'id');
		$this->forge->addForeignKey('user_id', 'users', 'id');
		$this->forge->addForeignKey('dosen_id', 'users', 'id');
		$this->forge->createTable($this->tableName, true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->dropTable($this->tableName);
	}
}
