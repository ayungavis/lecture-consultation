<?php namespace App\Controllers;

use App\Models\FileModel;

class FileController extends BaseController
{
  public function __construct()
  {
    helper('text');

    $this->file = new FileModel();
    $this->session = session();
  }

	public function index()
	{
		$data['title'] = 'Pengguna';
		return view('pages/dashboard/index', $data);
  }
  
  public function create()
  {

  }

  public function store($file)
  {
    $attributes['name'] = $file->getRandomName();
    $attributes['size'] = $file->getSize();
    $attributes['type'] = $file->getClientMimeType();
    $attributes['user_id'] = $this->session->get('id');
    $file->move(WRITEPATH . 'uploads', $attributes['name']);

    return $this->file->store($attributes);
  }

  public function show($id)
  {
    
  }

  public function edit()
  {

  }

  public function update($id)
  {

  }

  public function destroy($id)
  {

  }
}