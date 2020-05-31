<?php namespace App\Controllers;

use App\Models\NotifikasiModel;

class NotifikasiController extends BaseController
{
	public function __construct()
  {
    $this->notifikasi = new NotifikasiModel();
    $this->session = session();
  }

  public function read($id) 
  {
    $attributes['sudah_dibaca'] = true;
    $this->notifikasi->update($id, $attributes);
    return redirect()->to(base_url('konsultasi/'. $this->request->getVar('konsultasi_id')));
  }

  public function readAll()
  {
    $this->notifikasi->readAll();
    return redirect()->to(base_url());
  }
}