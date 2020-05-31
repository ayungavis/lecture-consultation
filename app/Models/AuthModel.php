<?php namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
  protected $table = 'users';
  protected $skipValidation = false;

  protected $validationRules = [
    'email' => 'required|valid_email',
    'password' => 'required|min_length[3]'
  ];

  public function check($email)
  {
    $builder = $this->db->table($this->table);
    $builder->select($this->table.'.*, roles.nama as role_nama, roles.code as role_code, roles.level as role_level');
    $builder->join('roles', $this->table.'.role_id = roles.id');
    $builder->where($this->table .'.email', $email);
    return $builder->get();
  }
}