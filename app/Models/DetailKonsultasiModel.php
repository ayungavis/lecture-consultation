<?php namespace App\Models;

use CodeIgniter\Model;

class DetailKonsultasiModel extends Model
{
  protected $table      = 'detail_konsultasi';
  protected $primaryKey = 'id';

  protected $returnType     = 'array';
  protected $useSoftDeletes = true;

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $skipValidation = false;

  protected $allowedFields = [
    'konsultasi_id',
    'topik_id',
    'topik_bahasan',
    'rencana_tindak_lanjut',
    'tanggal_dibuat',
    'tanggal_dibalas'
  ];

  protected $validationRules = [
    'konsultasi_id' => 'required|numeric',
    'topik_id' => 'required|numeric',
    'topik_bahasan' => 'required|string',
    'rencana_tindak_lanjut' => 'permit_empty|string',
    'tanggal_dibuat' => 'required',
    'tanggal_dibalas' => 'permit_empty'
  ];
}