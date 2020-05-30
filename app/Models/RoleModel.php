<?php namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
  protected $table      = 'roles';
  protected $primaryKey = 'id';

  protected $returnType     = 'array';
  protected $useSoftDeletes = true;

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $skipValidation = false;

  protected $allowedFields = [
    'nama',
    'code',
    'level'
  ];

  protected $validationRules = [
    'nama' => 'required|alpha_numeric_space',
    'code' => 'required|alpha_numeric|is_unique[roles.code]',
    'level' => 'required|numeric'
  ];
}