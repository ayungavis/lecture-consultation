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

  public function withRelations($id = null)
  {
    $builder = $this->db->table($this->table);
    $builder->select($this->table.'.*, mahasiswa.nama as mahasiswa, dosen.nama as dosen, periode.tahun_awal as tahun_awal, periode.tahun_akhir as tahun_akhir');
    $builder->join('users as mahasiswa', $this->table.'.user_id = users.id');
    $builder->join('users as dosen', $this->table.'.dosen_id = users.id');
    $builder->join('periode', $this->table.'.periode_id = periode.id');
    if ($id)
      $builder->where('id', $id);
    return $builder->get();
  }
}