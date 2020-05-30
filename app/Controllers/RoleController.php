<?php namespace App\Controllers;

use App\Models\RoleModel;

class RoleController extends BaseController
{
	public function __construct()
  {
    $this->role = new RoleModel();
    $this->session = session();
  }

	public function index()
	{
    $data['title'] = 'Daftar Role';
    $data['role'] = $this->role->findAll();
		return view('pages/roles/index', $data);
  }
  
  public function create()
  {
    $data['title'] = 'Buat Role';
    return view('pages/roles/create', $data);
  }

  public function store()
  {
    if (!$this->validate($this->auth->getValidationRules())) {
      return redirect()->to(base_url('roles/create'));
    } else {
      $this->role->insert($this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" role="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('roles/create'));
    }
  }

  public function show($id)
  {
    $data['title'] = 'Detail Role';
    $data['role'] = $this->role->find($id);
    return view('pages/roles/detail', $data);
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Role';
    $data['role'] = $this->role->find($id);
    return view('pages/roles/edit', $data);
  }

  public function update($id)
  {
    if (!$this->validate($this->auth->getValidationRules())) {
      return redirect()->to(base_url('roles/'. $id .'/edit'));
    } else {
      $this->role->update($id, $this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" role="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('roles/'. $id .'/edit'));
    }
  }

  public function destroy($id)
  {
    $this->role->delete($id);
    $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" role="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil dihapus!</div></div>');
    return redirect()->to(base_url('roles'));
  }
}