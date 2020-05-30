<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailKonsultasi extends Migration
{
	protected $tableName = 'detail_konsultasi';

	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'konsultasi_id' => [
				'type' => 'INT',
				'unsigned' => true
			],
			'topik_id' => [
				'type' => 'INT',
				'unsigned' => true
			],
			'topik_bahasan' => [
				'type' => 'TEXT',
				'null' => true
			],
			'rencana_tindak_lanjut' => [
				'type' => 'TEXT',
				'null' => true
			],
			'tanggal_dibuat' => [
				'type' => 'DATETIME',
				'null' => true
			],
			'tanggal_dibalas' => [
				'type' => 'DATETIME',
				'null' => true
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
		$this->forge->addForeignKey('konsultasi_id', 'konsultasi', 'id');
		$this->forge->addForeignKey('topik_id', 'topik_konsultasi', 'id');
		$this->forge->createTable($this->tableName, true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->dropTable($this->tableName);
	}
}
