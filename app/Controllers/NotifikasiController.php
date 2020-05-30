<?php namespace App\Controllers;

use App\Models\NotifikasiModel;

class NotifikasiController extends BaseController
{
	public function __construct()
  {
    $this->notifikasi = new NotifikasiModel();
    $this->session = session();
  }

	public function index()
	{
    $data['title'] = 'Daftar Notifikasi';
    $data['notifikasi'] = $this->notifikasi->withRelations()->getResult();
		return view('pages/notifikasi/index', $data);
  }
  
  public function create()
  {
    $data['title'] = 'Buat Notifikasi';
    return view('pages/notifikasi/create', $data);
  }

  public function store()
  {
    if (!$this->validate($this->auth->getValidationRules())) {
      return redirect()->to(base_url('notifikasi/create'));
    } else {
      $this->notifikasi->insert($this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" notifikasi="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('notifikasi/create'));
    }
  }

  public function show($id)
  {
    $data['title'] = 'Detail Notifikasi';
    $data['notifikasi'] = $this->notifikasi->withRelations($id)->getRow();
    return view('pages/notifikasi/detail', $data);
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Notifikasi';
    $data['notifikasi'] = $this->notifikasi->find($id);
    return view('pages/notifikasi/edit', $data);
  }

  public function update($id)
  {
    if (!$this->validate($this->auth->getValidationRules())) {
      return redirect()->to(base_url('notifikasi/'. $id .'/edit'));
    } else {
      $this->notifikasi->update($id, $this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" notifikasi="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('notifikasi/'. $id .'/edit'));
    }
  }

  public function destroy($id)
  {
    $this->notifikasi->delete($id);
    $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" notifikasi="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil dihapus!</div></div>');
    return redirect()->to(base_url('notifikasi'));
  }
}