<?php namespace App\Controllers;

class FileController extends BaseController
{
	public function index()
	{
		$data['title'] = 'Pengguna';
		return view('pages/dashboard/index', $data);
  }
  
  public function create()
  {

  }

  public function store()
  {

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