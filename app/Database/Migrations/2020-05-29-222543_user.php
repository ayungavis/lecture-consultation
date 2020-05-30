<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	protected $tableName = 'users';

	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'nim' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => true,
				'null' => true
			],
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => true
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			],
			'alamat' => [
				'type' => 'TEXT',
				'null' => true
			],
			'nomor_telepon' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => true
			],
			'tahun_masuk' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => true
			],
			'role_id' => [
				'type' => 'INT',
				'unsigned' => true
			],
			'prodi_id' => [
				'type' => 'INT',
				'unsigned' => true,
				'null' => true
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
		$this->forge->addUniqueKey('email');
		$this->forge->addForeignKey('role_id', 'roles', 'id');
		$this->forge->addForeignKey('prodi_id', 'program_studi', 'id');
		$this->forge->createTable($this->tableName, true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->db->disableForeignKeyChecks();
		$this->forge->dropTable($this->tableName);
	}
}
