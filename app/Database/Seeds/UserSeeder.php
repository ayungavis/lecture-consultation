<?php namespace App\Database\Seeds;

use App\Libraries\Utils;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder 
{
  protected $tableName = 'users';

  public function run()
  {
    $data = [
      'nama' => 'Super Admin',
      'email' => env('user.email'),
      'password' => password_hash(env('user.password'), PASSWORD_DEFAULT),
      'role_id' => 3,
      'created_at' => Utils::now()
    ];

    // Using Query Builder
    $this->db->table($this->tableName)->insert($data);
  }
}