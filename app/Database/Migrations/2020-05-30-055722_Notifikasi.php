<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Notifikasi extends Migration
{
	protected $tableName = 'notifikasi';

	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'from' => [
				'type' => 'INT',
				'unsigned' => true,
				'comment' => 'Ambil dari table user'
			],
			'to' => [
				'type' => 'INT',
				'unsigned' => true,
				'comment' => 'Ambil dari table user'
			],
			'pesan' => [
				'type' => 'VARCHAR'
			],
			'sudah_dibaca' => [
				'type' => 'BOOL',
				'default' => false
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
		$this->forge->addForeignKey('from', 'users', 'id');
		$this->forge->addForeignKey('to', 'users', 'id');
		$this->forge->createTable($this->tableName, true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->dropTable($this->tableName);
	}
}
