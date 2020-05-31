<?php namespace App\Models;

use CodeIgniter\Model;

class DetailKonsultasiModel extends Model
{
  protected $table      = 'detail_konsultasi';
  protected $primaryKey = 'id';

  protected $returnType     = 'array';
  protected $useSoftDeletes = false;

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

  public function store($data)
  {
    $db = db_connect('default');
    $builder = $db->table($this->table);
    $builder->insert($data);
    return $db->insertID();
  }

  public function getByKonsultasiID($konsultasi_id)
  {
    $builder = $this->db->table($this->table);
    $builder->select($this->table.'.*, topik_konsultasi.nama as nama_topik');
    $builder->join('topik_konsultasi', $this->table.'.topik_id = topik_konsultasi.id');
    $builder->where('konsultasi_id', $konsultasi_id);
    $builder->orderBy('tanggal_dibuat', 'desc');
    return $builder->get();
  }
}