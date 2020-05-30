<?php namespace App\Models;

use CodeIgniter\Model;

class TopikKonsultasiModel extends Model
{
  protected $table      = 'topik_konsultasi';
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
    'code'
  ];

  protected $validationRules = [
    'nama' => 'required|alpha_numeric_space',
    'code' => 'required|alpha_numeric|is_unique[topik_konsultasi.code]'
  ];
}