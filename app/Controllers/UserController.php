<?php namespace App\Controllers;

use App\Models\ProgramStudiModel;
use App\Models\RoleModel;
use App\Models\UserModel;

class UserController extends BaseController
{
  public function __construct()
  {
    $this->user = new UserModel();
    $this->role = new RoleModel();
    $this->prodi = new ProgramStudiModel();
    $this->session = session();
  }

	public function index()
	{
    $data['title'] = 'Daftar Pengguna';
    $data['user'] = $this->user->withRelations()->getResult();
    $data['role'] = $this->role->asObject()->findAll();
    $data['prodi'] = $this->prodi->asObject()->findAll();
		return view('pages/users/index', $data);
  }
  
  public function create()
  {
    $data['title'] = 'Buat Pengguna';
    return view('pages/users/create', $data);
  }

  public function store()
  {
    $data['title'] = 'Daftar Pengguna';
    $data['user'] = $this->user->withRelations()->getResult();
    $data['role'] = $this->role->asObject()->findAll();
    $data['prodi'] = $this->prodi->asObject()->findAll();
    if (!$this->validate($this->user->getValidationRules())) {
      $data['errors'] = $this->validator->getErrors();
      view('pages/users/index', $data);
    } else {
      $attributes = $this->request->getPost();
      $attributes['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
      $this->user->insert($attributes);
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" role="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('users'));
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
    $data['title'] = 'Daftar Pengguna';
    $data['user'] = $this->user->withRelations()->getResult();
    $data['role'] = $this->role->asObject()->findAll();
    $data['prodi'] = $this->prodi->asObject()->findAll();
    if (!$this->validate($this->user->getValidationRules())) {
      $data['errors'] = $this->validator->getErrors();
      view('pages/users/index', $data);
    } else {
      $attributes = $this->request->getPost();
      
      if ($this->request->getPost('password')) 
        $attributes['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        
      $this->user->update($id, $attributes);
      $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" role="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil disimpan!</div></div>');
      return redirect()->to(base_url('users'));
    }
  }

  public function destroy($id)
  {
    $this->user->delete($id);
    $this->session->setFlashdata('message', '<div class="alert alert-soft-success d-flex" role="alert"><i class="material-icons mr-3">check_circle</i><div class="text-body">Data berhasil dihapus!</div></div>');
    return redirect()->to(base_url('users'));
  }
}