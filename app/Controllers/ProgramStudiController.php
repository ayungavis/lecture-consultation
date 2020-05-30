<?php namespace App\Controllers;

use App\Models\ProgramStudiModel;

class ProgramStudiController extends BaseController
{
	public function __construct()
  {
    $this->prodi = new ProgramStudiModel();
    $this->session = session();
  }

	public function index()
	{
    $data['title'] = 'Daftar Program Studi';
    $data['prodi'] = $this->prodi->withRelations()->getResult();
		return view('pages/program-studi/index', $data);
  }
  
  public function create()
  {
    $data['title'] = 'Buat Program Studi';
    return view('pages/program-studi/create', $data);
  }

  public function store()
  {
    if (!$this->validate($this->auth->getValidationRules())) {
      return redirect()->to(base_url('program-studi/create'));
    } else {
      $this->prodi->insert($this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" role="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('program-studi/create'));
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
    if (!$this->validate($this->auth->getValidationRules())) {
      return redirect()->to(base_url('program-studi/'. $id .'/edit'));
    } else {
      $this->prodi->update($id, $this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" role="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('program-studi/'. $id .'/edit'));
    }
  }

  public function destroy($id)
  {
    $this->prodi->delete($id);
    $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" role="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil dihapus!</div></div>');
    return redirect()->to(base_url('program-studi'));
  }
}