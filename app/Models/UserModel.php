<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table      = 'users';
  protected $primaryKey = 'id';

  protected $returnType     = 'array';
  protected $useSoftDeletes = true;

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $skipValidation = false;

  protected $allowedFields = [
    'nim', 
    'nama',
    'email',
    'password',
    'alamat',
    'nomor_telepon',
    'tahun_masuk',
    'role_id',
    'prodi_id'
  ];

  protected $validationRules = [
    'nim' => 'unique|numeric', 
    'nama' => 'required|alpha_numeric_space',
    'email' => 'required|valid_email|is_unique[users.email]',
    'password' => 'required|min_length[3]',
    'alamat' => 'permit_empty|string',
    'nomor_telepon' => 'permit_empty|numeric|min_length[8]',
    'tahun_masuk' => 'permit_empty|numeric|min_length[4]',
    'role_id' => 'required|numeric',
    'prodi_id' => 'permit_empty|numeric'
  ];

  public function withRelations($id = null)
  {
    $builder = $this->db->table($this->table);
    $builder->select($this->table.'*, roles.nama as role_nama, program_studi.nama as prodi_nama, fakultas.nama as fakultas_nama');
    $builder->join('roles', $this->table.'.role_id = roles.id');
    $builder->join('program_studi', $this->table.'.prodi_id = program_studi.id');
    $builder->join('fakultas', 'program_studi.fakultas_id = fakultas.id');
    if ($id)
      $builder->where('id', $id);
    return $builder->get();
  }
}