<?php namespace App\Controllers;

use App\Models\RoleModel;

class HomeController extends BaseController
{
	public function __construct()
	{
		$this->role = new RoleModel();
	}

	public function index()
	{
		$data['title'] = 'Beranda';
		return view('pages/dashboard/index', $data);
	}
}