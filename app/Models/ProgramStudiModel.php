<?php namespace App\Models;

use CodeIgniter\Model;

class ProgramStudiModel extends Model
{
  protected $table      = 'program_studi';
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
    'singkatan',
    'fakultas_id'
  ];

  protected $validationRules = [
    'nama' => 'required|alpha_numeric_space',
    'singkatan' => 'required|alpha|is_unique[program_studi.singkatan]',
    'fakultas_id' => 'required|numeric'
  ];
}