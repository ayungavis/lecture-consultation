<?php namespace App\Models;

use CodeIgniter\Model;

class NotifikasiModel extends Model
{
  protected $table      = 'notifikasi';
  protected $primaryKey = 'id';

  protected $returnType     = 'array';
  protected $useSoftDeletes = false;

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

  public function withRelations($id = null)
  {
    $builder = $this->db->table($this->table);
    $builder->select($this->table.'.*, from.nama as from, to.nama as to');
    $builder->join('users as from', $this->table.'.from = from.id');
    $builder->join('users as to', $this->table.'.to = to.id');
    $builder->where('sudah_dibaca', false);
    if ($id)
      $builder->where($this->table .'.to', $id);
    $builder->orderBy('created_at', 'desc');
    return $builder->get();
  }

  public function store($data)
  {
    $db = db_connect('default');
    $builder = $db->table($this->table);
    $builder->insert($data);
    return $db->insertID();
  }

  public function readAll()
  {
    $builder = $this->db->table($this->table);
    $builder->set('sudah_dibaca', true);
    $builder->where('to', session()->get('id'));
    $builder->update();
  }
}