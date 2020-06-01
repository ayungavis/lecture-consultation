<?php namespace App\Controllers;

use App\Models\KonsultasiModel;
use App\Models\UserModel;

class HomeController extends BaseController
{
	public function __construct()
	{
		$this->konsultasi = new KonsultasiModel();
		$this->user = new UserModel();
	}

	public function index()
	{
		$data['title'] = 'Beranda';
		
		if (session()->get('role_code') == 'administrator') {
			$data['konsultasi'] = $this->konsultasi->withRelations(null, 5)->getResult();
			$data['mahasiswa'] = $this->user->withRelations(null, 5, 'mahasiswa')->getResult();
			$data['dosen'] = $this->user->withRelations(null, 5, 'dosen')->getResult();
			$data['grafik'] = $this->konsultasi->getGraphicData();
			return view('pages/dashboard/admin', $data);
		}
		else 
			return view('pages/dashboard/user', $data);
	}
}