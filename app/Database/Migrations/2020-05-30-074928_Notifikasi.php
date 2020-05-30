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
				'unsigned' => true
			],
			'to' => [
				'type' => 'INT',
				'unsigned' => true
			],
			'pesan' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			],
			'sudah_dibaca' => [
				'type' => 'BOOLEAN',
				'default' => false
			],
			'konsultasi_id' => [
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
		$this->forge->addForeignKey('from', 'users', 'id');
		$this->forge->addForeignKey('to', 'users', 'id');
		$this->forge->addForeignKey('konsultasi_id', 'konsultasi', 'id');
		$this->forge->createTable($this->tableName, true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->dropTable($this->tableName);
	}
}
