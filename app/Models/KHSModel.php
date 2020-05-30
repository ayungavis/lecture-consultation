<?php namespace App\Models;

use CodeIgniter\Model;

class KHSModel extends Model
{
  protected $table      = 'khs';
  protected $primaryKey = 'id';

  protected $returnType     = 'array';
  protected $useSoftDeletes = true;

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $skipValidation = false;

  protected $allowedFields = [
    'periode_id',
    'user_id',
    'semester',
    'file_id'
  ];

  protected $validationRules = [
    'periode_id' => 'required|numeric',
    'user_id' => 'required|numeric',
    'semester' => 'required|string',
    'file_id' => 'required|numeric'
  ];
}