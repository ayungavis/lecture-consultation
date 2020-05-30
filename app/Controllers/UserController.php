<?php namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
  public function __construct()
  {
    $this->user = new UserModel();
    $this->session = session();
  }

	public function index()
	{
    $data['title'] = 'Daftar Pengguna';
    $data['user'] = $this->user->withRelations()->getResult();
		return view('pages/users/index', $data);
  }
  
  public function create()
  {
    $data['title'] = 'Buat Pengguna';
    return view('pages/users/create', $data);
  }

  public function store()
  {
    if (!$this->validate($this->auth->getValidationRules())) {
      return redirect()->to(base_url('users/create'));
    } else {
      $this->user->insert($this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" role="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('users/create'));
    }
  }

  public function show($id)
  {
    $data['title'] = 'Detail Pengguna';
    $data['user'] = $this->user->withRelations($id)->getRow();
    return view('pages/users/detail', $data);
  }

  public function edit($id)
  {
    $data['title'] = 'Edit Pengguna';
    $data['user'] = $this->user->find($id);
    return view('pages/users/edit', $data);
  }

  public function update($id)
  {
    if (!$this->validate($this->auth->getValidationRules())) {
      return redirect()->to(base_url('users/'. $id .'/edit'));
    } else {
      $this->user->update($id, $this->request->getPost());
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" role="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('users/'. $id .'/edit'));
    }
  }

  public function destroy($id)
  {
    $this->user->delete($id);
    $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" role="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil dihapus!</div></div>');
    return redirect()->to(base_url('users'));
  }
}