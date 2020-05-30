<?php namespace App\Controllers;

class HomeController extends BaseController
{
	public function index()
	{
		$data['title'] = 'Beranda';
		return view('pages/dashboard/index', $data);
	}
}