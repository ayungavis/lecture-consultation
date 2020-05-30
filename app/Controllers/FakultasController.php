<?php namespace App\Controllers;

use App\Models\FakultasModel;

class FakultasController extends BaseController
{
	public function __construct()
  {
    $this->fakultas = new FakultasModel();
    $this->session = session();
  }

	public function index()
	{
    $data['title'] = 'Daftar Pengguna';
    $data['fakultas'] = $this->fakultas->findAll();
		return view('pages/dashboard/index', $data);
  }
  
  public function create()
  {
    $data['title'] = 'Buat Pengguna';
    return view('pages/fakultas/create', $data);
  }

  public function store()
  {
    if (!$this->validate($this->auth->getValidationRules())) {
      return redirect()->to(base_url('fakultas/create'));
    } else {
      $this->fakultas->insert($this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" fakultas="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('fakultas/create'));
    }
  }

  public function show($id)
  {
    $data['title'] = 'Detail Pengguna';
    $data['fakultas'] = $this->fakultas->find($id);
    return view('pages/fakultas/detail', $data);
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Pengguna';
    $data['fakultas'] = $this->fakultas->find($id);
    return view('pages/fakultas/edit', $data);
  }

  public function update($id)
  {
    if (!$this->validate($this->auth->getValidationRules())) {
      return redirect()->to(base_url('fakultas/'. $id .'/edit'));
    } else {
      $this->fakultas->update($id, $this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" fakultas="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('fakultas/'. $id .'/edit'));
    }
  }

  public function destroy($id)
  {
    $this->fakultas->delete($id);
    $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" fakultas="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil dihapus!</div></div>');
    return redirect()->to(base_url('fakultas'));
  }
}