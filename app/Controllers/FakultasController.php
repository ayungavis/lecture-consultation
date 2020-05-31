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
    $data['title'] = 'Daftar Fakultas';
    $data['fakultas'] = $this->fakultas->asObject()->findAll();
		return view('pages/fakultas/index', $data);
  }
  
  public function create()
  {
    $data['title'] = 'Buat Fakultas';
    return view('pages/fakultas/create', $data);
  }

  public function store()
  {
    $data['title'] = 'Daftar Fakultas';
    $data['fakultas'] = $this->fakultas->asObject()->findAll();
    if (!$this->validate($this->fakultas->getValidationRules())) {
      $data['errors'] = $this->validator->getErrors();
      return view('pages/fakultas/index', $data);
    } else {
      $this->fakultas->insert($this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" fakultas="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('fakultas'));
    }
  }

  public function show($id)
  {
    $data['title'] = 'Detail Fakultas';
    $data['fakultas'] = $this->fakultas->find($id);
    return view('pages/fakultas/detail', $data);
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Fakultas';
    $data['fakultas'] = $this->fakultas->find($id);
    return view('pages/fakultas/edit', $data);
  }

  public function update($id)
  {
    $data['title'] = 'Daftar Fakultas';
    $data['fakultas'] = $this->fakultas->asObject()->findAll();
    if (!$this->validate($this->fakultas->getValidationRules())) {
      $data['errors'] = $this->validator->getErrors();
      return view('pages/fakultas/index', $data);
    } else {
      $this->fakultas->update($id, $this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" fakultas="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('fakultas'));
    }
  }

  public function destroy($id)
  {
    $this->fakultas->delete($id);
    $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" fakultas="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil dihapus!</div></div>');
    return redirect()->to(base_url('fakultas'));
  }
}