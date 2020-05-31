<?php namespace App\Controllers;

use App\Models\TopikKonsultasiModel;

class TopikKonsultasiController extends BaseController
{
	public function __construct()
  {
    $this->topik = new TopikKonsultasiModel();
    $this->session = session();
  }

	public function index()
	{
    $data['title'] = 'Daftar Topik Konsultasi';
    $data['topik'] = $this->topik->asObject()->findAll();
		return view('pages/topik-konsultasi/index', $data);
  }
  
  public function create()
  {
    $data['title'] = 'Buat Topik Konsultasi';
    return view('pages/topik-konsultasi/create', $data);
  }

  public function store()
  {
    $data['title'] = 'Daftar Topik Konsultasi';
    $data['topik'] = $this->topik->asObject()->findAll();
    if (!$this->validate($this->topik->getValidationRules())) {
      $data['errors'] = $this->validator->getErrors();
      return view('pages/topik-konsultasi/index', $data);
    } else {
      $this->topik->insert($this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" topik="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('topik-konsultasi'));
    }
  }

  public function show($id)
  {
    $data['title'] = 'Detail Topik Konsultasi';
    $data['topik'] = $this->topik->asObject()->find($id);
    return view('pages/topik-konsultasi/detail', $data);
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Topik Konsultasi';
    $data['topik'] = $this->topik->asObject()->find($id);
    return view('pages/topik-konsultasi/edit', $data);
  }

  public function update($id)
  {
    $data['title'] = 'Daftar Topik Konsultasi';
    $data['topik'] = $this->topik->asObject()->findAll();
    if (!$this->validate($this->topik->getValidationRules())) {
      $data['errors'] = $this->validator->getErrors();
      return view('pages/topik-konsultasi/index', $data);
    } else {
      $this->topik->update($id, $this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" topik="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('topik-konsultasi'));
    }
  }

  public function destroy($id)
  {
    $this->topik->delete($id);
    $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" topik="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil dihapus!</div></div>');
    return redirect()->to(base_url('topik-konsultasi'));
  }
}