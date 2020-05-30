<?php namespace App\Controllers;

use App\Models\TopikKonsultasiModel;

class TopikKonsultasiKontroller extends BaseController
{
	public function __construct()
  {
    $this->topik = new TopikKonsultasiModel();
    $this->session = session();
  }

	public function index()
	{
    $data['title'] = 'Daftar Topik Konsultasi';
    $data['topik'] = $this->topik->findAll();
		return view('pages/topik-konsultasi/index', $data);
  }
  
  public function create()
  {
    $data['title'] = 'Buat Topik Konsultasi';
    return view('pages/topik-konsultasi/create', $data);
  }

  public function store()
  {
    if (!$this->validate($this->auth->getValidationRules())) {
      return redirect()->to(base_url('topik-konsultasi/create'));
    } else {
      $this->topik->insert($this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" topik="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('topik-konsultasi/create'));
    }
  }

  public function show($id)
  {
    $data['title'] = 'Detail Topik Konsultasi';
    $data['topik'] = $this->topik->find($id);
    return view('pages/topik-konsultasi/detail', $data);
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Topik Konsultasi';
    $data['topik'] = $this->topik->find($id);
    return view('pages/topik-konsultasi/edit', $data);
  }

  public function update($id)
  {
    if (!$this->validate($this->auth->getValidationRules())) {
      return redirect()->to(base_url('topik-konsultasi/'. $id .'/edit'));
    } else {
      $this->topik->update($id, $this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" topik="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('topik-konsultasi/'. $id .'/edit'));
    }
  }

  public function destroy($id)
  {
    $this->topik->delete($id);
    $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" topik="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil dihapus!</div></div>');
    return redirect()->to(base_url('topik-konsultasi'));
  }
}