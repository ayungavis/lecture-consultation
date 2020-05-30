<?php namespace App\Controllers;

use App\Models\KonsultasiModel;

class KonsultasiController extends BaseController
{
	public function __construct()
  {
    $this->konsultasi = new KonsultasiModel();
    $this->session = session();
  }

	public function index()
	{
    $data['title'] = 'Daftar Konsultasi';
    $data['konsultasi'] = $this->konsultasi->withRelations()->getResult();
		return view('pages/konsultasi/index', $data);
  }
  
  public function create()
  {
    $data['title'] = 'Buat Konsultasi';
    return view('pages/konsultasi/create', $data);
  }

  public function store()
  {
    if (!$this->validate($this->auth->getValidationRules())) {
      return redirect()->to(base_url('konsultasi/create'));
    } else {
      $this->konsultasi->insert($this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" konsultasi="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('konsultasi/create'));
    }
  }

  public function show($id)
  {
    $data['title'] = 'Detail Konsultasi';
    $data['konsultasi'] = $this->konsultasi->withRelations($id)->getRow();
    return view('pages/konsultasi/detail', $data);
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Konsultasi';
    $data['konsultasi'] = $this->konsultasi->find($id);
    return view('pages/konsultasi/edit', $data);
  }

  public function update($id)
  {
    if (!$this->validate($this->auth->getValidationRules())) {
      return redirect()->to(base_url('konsultasi/'. $id .'/edit'));
    } else {
      $this->konsultasi->update($id, $this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" konsultasi="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('konsultasi/'. $id .'/edit'));
    }
  }

  public function destroy($id)
  {
    $this->konsultasi->delete($id);
    $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" konsultasi="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil dihapus!</div></div>');
    return redirect()->to(base_url('konsultasi'));
  }
}