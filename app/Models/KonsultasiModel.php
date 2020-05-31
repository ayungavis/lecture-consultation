<?php namespace App\Models;

use CodeIgniter\Model;

class KonsultasiModel extends Model
{
  protected $table      = 'konsultasi';
  protected $primaryKey = 'id';

  protected $returnType     = 'array';
  protected $useSoftDeletes = false;

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $skipValidation = false;

  protected $allowedFields = [
    'periode_id',
    'user_id',
    'dosen_id',
    'qr_code',
    'file_id'
  ];

  protected $validationRules = [
    'periode_id' => 'required|numeric',
    'user_id' => 'required|numeric',
    'dosen_id' => 'required|numeric',
    'qr_code' => 'is_unique[konsultasi.qr_code]',
    'file_id' => 'required|numeric'
  ];

  public function withRelations($id = null, $limit = null)
  {
    $builder = $this->db->table($this->table);
    $builder->select($this->table.'.*, mahasiswa.nim as nim_mahasiswa, mahasiswa.nama as mahasiswa, mahasiswa.prodi_id as prodi_mahasiswa, mahasiswa.tahun_masuk as tahun_masuk, mahasiswa.nomor_telepon as nomor_mahasiswa, mahasiswa.alamat as alamat_mahasiswa, dosen.nama as dosen, periode.tahun_awal as tahun_awal, periode.tahun_akhir as tahun_akhir, file.name as file_name');
    $builder->join('users as mahasiswa', $this->table.'.user_id = mahasiswa.id');
    $builder->join('users as dosen', $this->table.'.dosen_id = dosen.id');
    $builder->join('periode', $this->table.'.periode_id = periode.id');
    $builder->join('file', $this->table.'.file_id = file.id');
    if ($id)
      $builder->where($this->table .'.id', $id);
    if ($limit)
      $builder->limit($limit);
    $builder->orderBy($this->table .'.created_at', 'desc');
    return $builder->get();
  }

  public function store($data)
  {
    $db = db_connect('default');
    $builder = $db->table($this->table);
    $builder->insert($data);
    return $db->insertID();
  }
}