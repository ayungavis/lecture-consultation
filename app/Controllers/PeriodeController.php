<?php namespace App\Controllers;

use App\Models\PeriodeModel;

class PeriodeController extends BaseController
{
	public function __construct()
  {
    $this->periode = new PeriodeModel();
    $this->session = session();
  }

	public function index()
	{
    $data['title'] = 'Daftar Pengguna';
    $data['periode'] = $this->periode->findAll();
		return view('pages/periode/index', $data);
  }
  
  public function create()
  {
    $data['title'] = 'Buat Pengguna';
    return view('pages/periode/create', $data);
  }

  public function store()
  {
    if (!$this->validate($this->auth->getValidationRules())) {
      return redirect()->to(base_url('periode/create'));
    } else {
      $this->periode->insert($this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" periode="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('periode/create'));
    }
  }

  public function show($id)
  {
    $data['title'] = 'Detail Pengguna';
    $data['periode'] = $this->periode->find($id);
    return view('pages/periode/detail', $data);
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Pengguna';
    $data['periode'] = $this->periode->find($id);
    return view('pages/periode/edit', $data);
  }

  public function update($id)
  {
    if (!$this->validate($this->auth->getValidationRules())) {
      return redirect()->to(base_url('periode/'. $id .'/edit'));
    } else {
      $this->periode->update($id, $this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" periode="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('periode/'. $id .'/edit'));
    }
  }

  public function destroy($id)
  {
    $this->periode->delete($id);
    $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" periode="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil dihapus!</div></div>');
    return redirect()->to(base_url('periode'));
  }
}