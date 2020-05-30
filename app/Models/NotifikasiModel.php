<?php namespace App\Models;

use CodeIgniter\Model;

class NotifikasiModel extends Model
{
  protected $table      = 'notifikasi';
  protected $primaryKey = 'id';

  protected $returnType     = 'array';
  protected $useSoftDeletes = true;

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $skipValidation = false;

  protected $allowedFields = [
    'from',
    'to',
    'pesan',
    'sudah_dibaca',
    'konsultasi_id'
  ];

  protected $validationRules = [
    'from' => 'required|numeric',
    'to' => 'required|numeric',
    'pesan' => 'required',
    'sudah_dibaca' => 'required',
    'konsultasi_id' => 'required|numeric'
  ];
}