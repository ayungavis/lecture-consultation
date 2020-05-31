<?php namespace App\Controllers;

use App\Models\FakultasModel;
use App\Models\ProgramStudiModel;

class ProgramStudiController extends BaseController
{
	public function __construct()
  {
    $this->prodi = new ProgramStudiModel();
    $this->fakultas = new FakultasModel();
    $this->session = session();
  }

	public function index()
	{
    $data['title'] = 'Daftar Program Studi';
    $data['prodi'] = $this->prodi->withRelations()->getResult();
    $data['fakultas'] = $this->fakultas->asObject()->findAll();
		return view('pages/program-studi/index', $data);
  }
  
  public function create()
  {
    $data['title'] = 'Buat Program Studi';
    return view('pages/program-studi/create', $data);
  }

  public function store()
  {
    $data['title'] = 'Daftar Program Studi';
    $data['prodi'] = $this->prodi->withRelations()->getResult();
    $data['fakultas'] = $this->fakultas->asObject()->findAll();
    if (!$this->validate($this->prodi->getValidationRules())) {
      $data['errors'] = $this->validator->getErrors();
      return view('pages/program-studi/index', $data);
    } else {
      $this->prodi->insert($this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" role="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('program-studi'));
    }
  }

  public function show($id)
  {
    $data['title'] = 'Detail Program Studi';
    $data['prodi'] = $this->prodi->withRelations($id)->getRow();
    return view('pages/program-studi/detail', $data);
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Program Studi';
    $data['prodi'] = $this->prodi->find($id);
    return view('pages/program-studi/edit', $data);
  }

  public function update($id)
  {
    $data['title'] = 'Daftar Program Studi';
    $data['prodi'] = $this->prodi->withRelations()->getResult();
    $data['fakultas'] = $this->fakultas->asObject()->findAll();
    if (!$this->validate($this->prodi->getValidationRules())) {
      $data['errors'] = $this->validator->getErrors();
      return view('pages/program-studi/index', $data);
    } else {
      $this->prodi->update($id, $this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" role="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('program-studi'));
    }
  }

  public function destroy($id)
  {
    $this->prodi->delete($id);
    $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" role="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil dihapus!</div></div>');
    return redirect()->to(base_url('program-studi'));
  }
}