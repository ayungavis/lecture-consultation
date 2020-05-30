<?php namespace App\Database\Seeds;

use App\Libraries\Utils;
use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder 
{
  protected $tableName = 'roles';

  public function run()
  {
    $data = [
      'nama' => 'Mahasiswa',
      'code' => 'mahasiswa',
      'level' => 1,
      'created_at' => Utils::now()
    ];

    // Using Query Builder
    $this->db->table($this->tableName)->insert($data);

    $data = [
      'nama' => 'Dosen',
      'code' => 'dosen',
      'level' => 2,
      'created_at' => Utils::now()
    ];

    // Using Query Builder
    $this->db->table($this->tableName)->insert($data);

    $data = [
      'nama' => 'Administrator',
      'code' => 'administrator',
      'level' => 10,
      'created_at' => Utils::now()
    ];

    // Using Query Builder
    $this->db->table($this->tableName)->insert($data);
  }
}