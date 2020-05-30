<?php namespace App\Controllers;

use App\Models\DetailKonsultasiModel;
use App\Models\KonsultasiModel;

class DetailKonsultasiController extends BaseController
{
	public function __construct()
  {
    $this->konsultasi = new KonsultasiModel();
    $this->detailKonsultasi = new DetailKonsultasiModel();
    $this->session = session();
  }

	public function index()
	{
    $data['title'] = 'Daftar Detail Konsultasi';
    $data['detail'] = $this->detailKonsultasi->withRelations()->getResult();
		return view('pages/detail-konsultasi/index', $data);
  }
  
  public function create()
  {
    $data['title'] = 'Buat Detail Konsultasi';
    return view('pages/detail-konsultasi/create', $data);
  }

  public function store()
  {
    if (!$this->validate($this->auth->getValidationRules())) {
      return redirect()->to(base_url('detail-konsultasi/create'));
    } else {
      $this->detailKonsultasi->insert($this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" role="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('detail-konsultasi/create'));
    }
  }

  public function show($id)
  {
    $data['title'] = 'Detail Detail Konsultasi';
    $data['detail'] = $this->detailKonsultasi->withRelations($id)->getRow();
    return view('pages/detail-konsultasi/detail', $data);
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Detail Konsultasi';
    $data['detail'] = $this->detailKonsultasi->find($id);
    return view('pages/detail-konsultasi/edit', $data);
  }

  public function update($id)
  {
    if (!$this->validate($this->auth->getValidationRules())) {
      return redirect()->to(base_url('detail-konsultasi/'. $id .'/edit'));
    } else {
      $this->detailKonsultasi->update($id, $this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" role="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('detail-konsultasi/'. $id .'/edit'));
    }
  }

  public function destroy($id)
  {
    $this->detailKonsultasi->delete($id);
    $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" role="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil dihapus!</div></div>');
    return redirect()->to(base_url('detail-konsultasi'));
  }
}