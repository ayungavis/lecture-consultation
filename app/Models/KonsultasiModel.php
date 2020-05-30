<?php namespace App\Models;

use CodeIgniter\Model;

class KonsultasiModel extends Model
{
  protected $table      = 'konsultasi';
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
    'dosen_id',
    'qr_code'
  ];

  protected $validationRules = [
    'periode_id' => 'required|numeric',
    'user_id' => 'required|numeric',
    'dosen_id' => 'required|numeric',
    'qr_code' => 'required|is_unique[konsultasi.qr_code]'
  ];
}