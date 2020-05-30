<?php namespace App\Models;

use CodeIgniter\Model;

class PeriodeModel extends Model
{
  protected $table      = 'periode';
  protected $primaryKey = 'id';

  protected $returnType     = 'array';
  protected $useSoftDeletes = true;

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $skipValidation = false;

  protected $allowedFields = [
    'tahun_awal',
    'tahun_akhir'
  ];

  protected $validationRules = [
    'tahun_awal' => 'required|numeric',
    'tahun_akhir' => 'required|numeric'
  ];
}