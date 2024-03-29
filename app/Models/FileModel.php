<?php namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model
{
  protected $table      = 'file';
  protected $primaryKey = 'id';

  protected $returnType     = 'array';
  protected $useSoftDeletes = false;

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $skipValidation = false;

  protected $allowedFields = [
    'name',
    'size',
    'type',
    'user_id'
  ];

  protected $validationRules = [
    'name' => 'required|is_unique[file.name]',
    'size' => 'required|numeric',
    'type' => 'reqired|string',
    'user_id' => 'required|numeric',
  ];

  public function store($data)
  {
    $db = db_connect('default');
    $builder = $db->table($this->table);
    $builder->insert($data);
    return $db->insertID();
  }
}